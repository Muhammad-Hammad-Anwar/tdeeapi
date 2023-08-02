var ions = false;


function chemistry()
{
  // Clear output
  setMessage("");
  var balancedElem = document.getElementById("result");
  var codeOutElem = document.getElementById("codevalid");
  removeAllChildren(balancedElem);
  removeAllChildren(codeOutElem);
  codeOutElem.appendChild(document.createTextNode(NBSP));
  
  // Parse equation
  var eqn;
  try
  {
    eqn = parse(); 
  }
  catch (e)
  {
      if (typeof e == "string")
      {
	$("#result").text("");
	setMessage("Equation error: " + e);
      }
      else if ("start" in e && "end" in e)
      {
	setMessage("Equation error: " + e.message);
	$("#result").text("");
	var input = $("#chemeuqation").val();
	var start = e.start;
	var end = e.end;
	while (start < input.length && start < end && input.charAt(start) == " ") start++;  // Adjust to eliminate white space
	while (end >= 1 && start < end && input.charAt(end - 1) == " ") end--;              // Adjust to eliminate white space
	
	removeAllChildren(codeOutElem);
	codeOutElem.appendChild(document.createTextNode(input.substring(0, start)));
	var highlight = document.createElement("u");
	highlight.appendChild(document.createTextNode(input.substring(start, end)));
	codeOutElem.appendChild(highlight);
	codeOutElem.appendChild(document.createTextNode(input.substring(end, input.length)));
      }
      else if ("start" in e)
      { 
	setMessage("Equation error: " + e.message);
	var input = document.getElementById("chemeuqation").value;
	var start = e.start;
	removeAllChildren(codeOutElem);
	codeOutElem.appendChild(document.createTextNode(input.substring(0, start)));
	var highlight = document.createElement("u");
	if (start != input.length)
	{
	  highlight.appendChild(document.createTextNode(input.substring(start, start + 1)));
	  codeOutElem.appendChild(highlight);
	  codeOutElem.appendChild(document.createTextNode(input.substring(start + 1, input.length)));
	}
	else
	{
	  highlight.appendChild(document.createTextNode(NBSP));
	  codeOutElem.appendChild(highlight);
	}
      }
      else
      {
	setMessage("Assertion error");
      }
      return;
  }
  
  try
  {
      var matrix = buildMatrix(eqn);                // Set up matrix
      solve(matrix);                                // Solve linear system
      var coefs = extractCoefficients(matrix);      // Get coefficients
      checkAnswer(eqn, coefs);     	            // Self-test, should not fail
    //   balancedElem.appendChild(eqn.toHtml(coefs));  // Display balanced equation
    $('#result').append(eqn.toHtml(coefs));
    $('#equation-input').text($('#chemeuqation').val());
    scrollToResult();

  }
  catch (e)
  {
      setMessage(e.toString());
  }
}

function show(str)
{
  $("#chemeuqation").val(str);
  chemistry();
}

/* Main processing fuctions */

function parse()
{
  var input = $("#chemeuqation").val();
  var tokenizer = new Tokenizer(input);
  return parseEquation(tokenizer);
}

function buildMatrix(eqn)
{
  var elems = eqn.getElements(); 
  var rows = elems.length + 1;
  var cols = eqn.getLeftSide().length + eqn.getRightSide().length + 1;
  var matrix = new Matrix(rows, cols);
  for (var i = 0; i < elems.length; i++)
  {
    var j = 0;
    for (var k = 0, lhs = eqn.getLeftSide() ; k < lhs.length; j++, k++)
    {
      matrix.set(i, j,  lhs[k].countElement(elems[i]));
    }
    for (var k = 0, rhs = eqn.getRightSide(); k < rhs.length; j++, k++)
    {
      matrix.set(i, j, -rhs[k].countElement(elems[i]));
    }
  }
  return matrix;
}

function solve(matrix)
{
  matrix.gaussJordanEliminate();
  
  // Find row with more than one non-zero coefficient
  var i;
  for (i = 0; i < matrix.rowCount() - 1; i++)
  {
    if (countNonzeroCoeffs(matrix, i) > 1)
    {
      break;
    }
  }
  if (i == matrix.rowCount() - 1)
  {
    throw "Element combination incorrect";  // Unique solution with all coefficients zero
  }
  
  // Add an inhomogeneous equation
  matrix.set(matrix.rowCount() - 1, i, 1);
  matrix.set(matrix.rowCount() - 1, matrix.columnCount() - 1, 1);    
  matrix.gaussJordanEliminate();
}

function countNonzeroCoeffs(matrix, row)
{
  var count = 0;
  for (var i = 0; i < matrix.columnCount(); i++)
  {
    if (matrix.get(row, i) != 0)
    {
      count++;
    }
  }
  return count;
}

function extractCoefficients(matrix)
{
  var rows = matrix.rowCount();
  var cols = matrix.columnCount();
  
  if (cols - 1 > rows || matrix.get(cols - 2, cols - 2) == 0)
  {
    throw "No unique solution";
  }
  
  var lcm = 1;
  for (var i = 0; i < cols - 1; i++)
  {
    lcm = checkedMultiply(lcm / gcd(lcm, matrix.get(i, i)), matrix.get(i, i));
  }
  
  var coefs = [];
  var allzero = true;
  for (var i = 0; i < cols - 1; i++)
  {
    var coef = checkedMultiply(lcm / matrix.get(i, i), matrix.get(i, cols - 1));
    coefs.push(coef);
    allzero &= coef == 0;
  }
  if (allzero)
  {
    throw "Assertion error: All zero solution";
  }
  return coefs;
}


// Throws an exception if theres a problem, otherwise returns silently.
function checkAnswer(eqn, coefs)
{
  if (coefs.length != eqn.getLeftSide().length + eqn.getRightSide().length)
  {
    throw "Assertion error: Mismatched length";
  }
  
  var allzero = true;
  for (var i = 0; i < coefs.length; i++)
  {
    var coef = coefs[i];
    if (typeof coef != "number" || isNaN(coef) || Math.floor(coef) != coef)
    {
      throw "Assertion error: Not an integer";
    }
    allzero &= coef == 0;
  }
  
  if (allzero)
  {
    throw "Assertion error: Solution of all zeros";
  }
  
  var elems = eqn.getElements();
  for (var i = 0; i < elems.length; i++)
  {
    var sum = 0;
    var j = 0;
    for (var k = 0, lhs = eqn.getLeftSide() ; k < lhs.length; j++, k++)
    {
      sum = checkedAdd(sum, checkedMultiply(lhs[k].countElement(elems[i]),  coefs[j]));
    }
    
    for (var k = 0, rhs = eqn.getRightSide(); k < rhs.length; j++, k++)
    {
      sum = checkedAdd(sum, checkedMultiply(rhs[k].countElement(elems[i]), -coefs[j]));
    }
    
    if (sum != 0)
    {
      throw "Assertion error: Balance failed";
    }
  }
}

/* Chemical equation representation */
// A complete chemical equation. It has a left-hand side list of terms, and a right-hand side list of terms.
// For example: H2 + O2 -> H2O.

function Equation(lhs, rhs)
{
  // Make defensive copies
  lhs = cloneArray(lhs);
  rhs = cloneArray(rhs);
  
  this.getLeftSide  = function() { return cloneArray(lhs); }
  this.getRightSide = function() { return cloneArray(rhs); }
  
  // Returns an array of the names all of the elements used in this equation.
  // The array represents a set, so the items are in an arbitrary order and no item is repeated.
  this.getElements = function()
  {
    var result = new Set();
    for (var i = 0; i < lhs.length; i++)
    {
      lhs[i].getElements(result);
    }
    
    for (var i = 0; i < rhs.length; i++)
    {
      rhs[i].getElements(result);
    }
    return result.toArray();
  }
  
  // Returns an HTML element representing this equation.
  // coefs is an optional argument, which is a list of coefficients to match with the terms.
  this.toHtml = function(coefs)
  {
    if (coefs !== undefined && coefs.length != lhs.length + rhs.length)
    {
      throw "Mismatched number of coefficients";
    }
    
    var node = document.createElement("span");
    var initial = true;
    for (var i = 0; i < lhs.length; i++)
    {
      var coef = coefs !== undefined ? coefs[i] : 1;
      if (coef != 0)
      {
	if (initial)
	{
	  initial = false;
	}
	else
	{
	  node.appendChild(document.createTextNode(" + "));
	}
	
	if (coef != 1)
	{
	  var disp = document.createElement("span");
	  disp.setAttribute("style","font-weight:bold;color:blue;display:inline-table;");	 // Display the balancing value color blue edited by francis
	  disp.appendChild(document.createTextNode(coef.toString().replace(/-/, MINUS)));
	  node.appendChild(disp);
	}
	node.appendChild(document.createTextNode(" "));
	node.appendChild(lhs[i].toHtml());
      }
    }
    
    var disp = document.createElement("span");
    disp.setAttribute("style","font-weight:bold;color:#000;font-size:30px;vertical-align: -6px;display:inline-table;");  // Display the balancing symbol color black edited by francis
    disp.appendChild(document.createTextNode(" \u2192 "));
    node.appendChild(disp);
    
    initial = true;
    for (var i = 0; i < rhs.length; i++)
    {
      var coef = coefs !== undefined ? coefs[lhs.length + i] : 1;
      if (coef != 0)
      {
	  if (initial)
	  {
	    initial = false;
	  }
	  else
	  {
	    node.appendChild(document.createTextNode(" + "));
	  }
	  
	  if (coef != 1)
	  {
	    var disp = document.createElement("span");
	    disp.setAttribute("style","font-weight:bold;color:blue;display:inline-table;");  // Display the balancing value color blue edited by francis
	    disp.appendChild(document.createTextNode(coef.toString().replace(/-/, MINUS)));
	    node.appendChild(disp);
	  }
	  node.appendChild(document.createTextNode(" "));
	  node.appendChild(rhs[i].toHtml());
      }
    }
    return node;
  }
}

// A term in a chemical equation. It has a list of groups or elements, and a charge.
// For example: H3O^+, or e^-.
function Term(items, charge)
{
  /* Ions Only allowed starts here edited by Francis */
  if(charge!=0)
  {
    ions = true;
  }

  if(ions==false && charge==0)
  {
    throw "Invalid term, Elements must be with Ions";
  }
  /* Ions Only allowed ends here edited by Francis */
  
  if (items.length == 0 && charge != -1)
  {
    throw "Invalid term ";
  }
  items = cloneArray(items);
  
  this.getItems = function() { return cloneArray(items); }
  
  this.getElements = function(result)
  {
    result.add("e");
    for (var i = 0; i < items.length; i++)
    {
      items[i].getElements(result);
    }
  }
  
  this.countElement = function(name)
  {
    if (name == "e")
    {
      return -charge;
    }
    else
    {
      var sum = 0;
      for (var i = 0; i < items.length; i++)
      {
	sum = checkedAdd(sum, items[i].countElement(name));
      }
      return sum;
    } 
  }
  
  this.toHtml = function()
  {
    var node = document.createElement("span");
    node.setAttribute("style","font-weight:bold;color:#39b4bd;display:inline-table;"); // Ions e Color Blue Edited by Francis
    if (items.length == 0 && charge == -1)
    {
      node.appendChild(document.createTextNode("e"));
      var sup = document.createElement("sup");
      sup.setAttribute("style","font-weight:bold;color:#FC5F61;display:inline-table;"); // Ions Color red Edited by Francis
      sup.appendChild(document.createTextNode(" "));
      sup.appendChild(document.createTextNode(MINUS));
      node.appendChild(sup);
    }
    else
    {
      for (var i = 0; i < items.length; i++)
      {
	node.appendChild(items[i].toHtml());
      }
      if (charge != 0)
      {
	var sup = document.createElement("sup");
	sup.setAttribute("style","font-weight:bold;color:#FC5F61;display:inline-table;"); // Ions Color red Edited by Francis
	var s;
	if (Math.abs(charge) == 1) s = "";
	else s = Math.abs(charge).toString();
	if (charge > 0) s += "+";
	else s += MINUS;
	sup.appendChild(document.createTextNode(" "));
	sup.appendChild(document.createTextNode(s));
	node.appendChild(sup);
      }
    } 
    return node;
  }
}

// A group in a term. It has a list of groups or elements.
// For example: (OH)3
function Group(items, count)
{
  if (count < 1)
  {
    throw "Count must be a positive integer";
  }
  items = cloneArray(items);
  
  this.getItems = function() { return cloneArray(items); }
  
  this.getCount = function() { return count; }
  
  this.getElements = function(result)
  {
    for (var i = 0; i < items.length; i++)
    {
      items[i].getElements(result);
    }
  }
  
  this.countElement = function(name)
  {
    var sum = 0;
    for (var i = 0; i < items.length; i++)
    {
      sum = checkedAdd(sum, checkedMultiply(items[i].countElement(name), count));
    }
    return sum;
  }
  
  this.toHtml = function()
  {
    var node = document.createElement("span");
    node.setAttribute("style","font-weight:bold;color:#39b4bd;display:inline-table;"); // Elements Color Orange Edited by Francis
    node.appendChild(document.createTextNode("("));
    
    for (var i = 0; i < items.length; i++)
    {
      node.appendChild(items[i].toHtml());
    }
    node.appendChild(document.createTextNode(")"));
    if (count != 1)
    {
      var sub = document.createElement("sub");
      sub.setAttribute("style","font-weight:bold;color:#7E178C;display:inline-table;"); // Element Sub Color light #39b4bd Edited by Francis
      sub.appendChild(document.createTextNode(count.toString()));
      node.appendChild(sub);
    }
    return node;
  }
}

// A chemical element.
// For example: N2, Uuq6, Ace
function Element(name, count)
{
  if (count < 1)
  {
    throw "Count must be a positive integer";
  }
  
  this.getName = function() { return name; }
  
  this.getCount = function() { return count; }
  
  this.getElements = function(result) { result.add(name); }
  
  this.countElement = function(n) { return n == name ? count : 0; }
  
  this.toHtml = function()
  {
    var node = document.createElement("span");
    node.setAttribute("style","font-weight:bold;color:#39b4bd;display:inline-table;"); // Elements Color orange Edited by Francis
    node.appendChild(document.createTextNode(name));
    if (count != 1)
    {
      var sub = document.createElement("sub");
      sub.setAttribute("style","font-weight:bold;color:#346EE2;display:inline-table;"); // Elements Sub Color Orange Edited by Francis
      sub.appendChild(document.createTextNode(count.toString()));
      node.appendChild(sub);
    }
    return node;
  }
}

/* Parser functions */

function parseEquation(tok)
{
  var lhs = [];
  var rhs = [];
  
  lhs.push(parseTerm(tok));
  while (true)
  {
    var next = tok.peek();
    if (next == "=")
    {
      break;
    }
    if (next == null)
    {
      throw {message: "Plus or equal sign expected", start: tok.position()};
    }
    if (next != "+")
    {
      throw {message: "Plus expected", start: tok.position()};
    }
    tok.take();  // Consume "+"
    lhs.push(parseTerm(tok));
  }
  
  if (tok.take() != "=")
  {
    throw "Assertion error";
  }
  
  rhs.push(parseTerm(tok));
  while (true)
  {
    var next = tok.peek();
    if (next == null)
    {
      break;
    }
    if (next != "+")
    {
      throw {message: "Plus expected", start: tok.position()};
    }
    tok.take();  // Consume "+"
    rhs.push(parseTerm(tok));
  }
  
  return new Equation(lhs, rhs);
}

function parseTerm(tok)
{
  var startPosition = tok.position();
  
  // Parse groups and elements
  var items = []; 
  while (true)
  {
    var next = tok.peek();
    if (next == null)
    {
      break;
    }
    else if (next == "(")
    {
      items.push(parseGroup(tok));
    }
    else if (/^[A-Za-z][a-z]*$/.test(next))
    {
      items.push(parseElement(tok));
    }
    else
    {
      break;
    }
  }
  
  // Parse optional charge
  var charge = 0;
  var next = tok.peek(); 
  if (next != null && next == "^")
  {
    tok.take();  // Consume "^"
    next = tok.peek();
    if (next == null)
    {
      throw {message: "Number or sign expected", start: tok.position()};
    }
    else if (/^[0-9]+$/.test(next))
    {
      charge = checkedParseInt(next, 10);
      tok.take();  // Consume the number
      next = tok.peek();
    }
    else
    {
      charge = 1;
    }
    
    if (next == null)
    {
      throw {message: "Sign expected", start: tok.position()};
    }
    else if (next == "+");  // Charge is positive, do nothing
    else if (next == "-")
    {
      charge = -charge;
    }
    else
    {
      throw {message: "Sign expected", start: tok.position()};
    }
    tok.take();  // Consume the sign
  }
  
  // Check if term is valid
  var elems = new Set();
  for (var i = 0; i < items.length; i++)
  {
    items[i].getElements(elems);
  }
  elems = elems.toArray();  // List of all elements used in this term, with no repeats
  if (items.length == 0)
  {
    throw {message: "Invalid term ", start: startPosition, end: tok.position()};
  }
  else if (indexOf(elems, "e") != -1)  // If its the special electron element
  { 
    if (items.length > 1 || charge != 0 && charge != -1)
    {
      throw {message: "Invalid term ", start: startPosition, end: tok.position()};
    }
    items = [];
    charge = -1;
  }
  else		 // Otherwise, a term must not contain an element that starts with lowercase
  { 
    for (var i = 0; i < elems.length; i++)
    {
      if (/^[a-z]+$/.test(elems[i]))
      {
	throw {message: "Invalid element "+elems[i],start: startPosition, end: tok.position()};
      }
    }
  }
  
  return new Term(items, charge);
}

function parseGroup(tok)
{
  if (tok.take() != "(")
  {
    throw "Assertion error";
  }
  
  var items = [];
  while (true)
  {
    var next = tok.peek();
    if (next == null)
    {
      throw {message: "Element, group, or closing parenthesis expected", start: tok.position()};
    }
    else if (next == "(")
    {
      items.push(parseGroup(tok));
    }
    else if (/^[A-Za-z][a-z]*$/.test(next))
    {
      items.push(parseElement(tok));
    }
    else if (next == ")")
    {
      break;
    }
    else
    {
      throw {message: "Element, group, or closing parenthesis expected", start: tok.position()};
    }
  }
  
  if (tok.take() != ")")
  {
    throw "Assertion error";
  }
  
  return new Group(items, parseCount(tok));
}

function parseElement(tok)
{
  var name = tok.take();
  if (!/^[A-Za-z][a-z]*$/.test(name))
  {
    throw "Assertion error";
  }
  return new Element(name, parseCount(tok));
}

// Parse optional count
function parseCount(tok)
{
  var next = tok.peek();
  if (next != null && /^[0-9]+$/.test(next))
  {
    return checkedParseInt(tok.take(), 10);
  }
  else
  {
    return 1;
  }
}


/* Tokenizer object */

function Tokenizer(str)
{
  var i = 0;
  
  this.position = function()
  {
    return i;
  }
  
  this.peek = function()
  {
    if (i == str.length)
    {
      return null;  // End of stream
    }
    
    var match = /^([A-Za-z][a-z]*|[0-9]+| +|[+\-^=()])/.exec(str.substring(i));
    if (match == null)
    {
      throw {message: "Invalid symbol ", start: i};
    }
    
    var token = match[0];
    if (/^ +$/.test(token))   // Skip whitespace token
    {
      i += token.length;
      token = this.peek();  // Get next token
    }
    return token;
  }
  
  this.take = function()
  {
    var result = this.peek();
    i += result.length;
    return result;
  }
}

/* Matrix object */

function Matrix(rows, cols)
{
  // Initialize with zeros
  var cells = [];
  for (var i = 0; i < rows; i++)
  {
    var row = [];
    for (var j = 0; j < cols; j++)
    {
      row.push(0);
    }
    cells.push(row);
  }
  
  this.rowCount = function() { return rows; }
  this.columnCount = function() { return cols; }
  
  // Returns the value of the given cell in the matrix, where i is the row and j is the column.
  this.get = function(r, c)
  {
    if (r < 0 || r >= rows || c < 0 || c >= cols)
    {
      throw "Index out of bounds";
    }
    return cells[r][c];
  }
  
  // Sets the given cell in the matrix to the given value, where i is the row and j is the column.
  this.set = function(r, c, val)
  {
    if (r < 0 || r >= rows || c < 0 || c >= cols)
    {
      throw "Index out of bounds";
    }
    cells[r][c] = val;
  }
  
  // Swaps the two rows of the given indices in this matrix. Having i == j is allowed.
  function swapRows(i, j)
  {
    if (i < 0 || i >= rows || j < 0 || j >= rows)
    {
      throw "Index out of bounds";
    }
    var temp = cells[i];
    cells[i] = cells[j];
    cells[j] = temp;
  }
  
  // Returns a new row that is the product of the two given rows.
  // For example, addRow([3, 1, 4], [1, 5, 6]) = [4, 6, 10].
  function addRows(x, y)
  {
    var z = cloneArray(x);
    for (var i = 0; i < z.length; i++)
    {
      z[i] = checkedAdd(x[i], y[i]);
    }
    return z;
  }
  
  // Returns a new row that is the product of the given row with the given scalar.
  // For example, multiplyRow([0, 1, 3], 4) = [0, 4, 12].
  function multiplyRow(x, c)
  {
    var y = cloneArray(x);
    for (var i = 0; i < y.length; i++)
    {
      y[i] = checkedMultiply(x[i], c);
    }
    return y;
  }
  
  // Returns the GCD of all the numbers in the given row.
  // For example, gcdRow([3, 6, 9, 12]) = 3.
  function gcdRow(x)
  {
    var result = 0;
    for (var i = 0; i < x.length; i++)
    {
      result = gcd(x[i], result);
    }
    return result;
  }
  
  // Returns a new row where the leading non-zero number (if any) is positive, and the GCD of the row is 0 or 1.
  // For example, simplifyRow([0, -2, 2, 4]) = [0, 1, -1, -2].
  function simplifyRow(x)
  {
    var sign = 0;
    for (var i = 0; i < x.length; i++)
    {
      if (x[i] > 0)
      {
	sign = 1;
	break;
      }
      else if (x[i] < 0)
      {
	sign = -1;
	break;
      }
    }
    
    var y = cloneArray(x);
    if (sign == 0)
    {
      return y;
    }
    
    var g = gcdRow(x) * sign;
    for (var i = 0; i < y.length; i++)
    {
      y[i] /= g;
    }
    return y;
  }
  
  // Changes this matrix to reduced row echelon form, except that each leading coefficient is not necessarily 1. Each row is simplified.
  this.gaussJordanEliminate = function()
  {
    // Simplify all rows
    for (var i = 0; i < rows; i++)
    {
      cells[i] = simplifyRow(cells[i]);
    }
    
    // Compute row echelon form (REF)
    var numPivots = 0;
    for (var i = 0; i < cols; i++)
    {
      // Find pivot
      var pivotRow = numPivots;
      while (pivotRow < rows && cells[pivotRow][i] == 0)
      {
        pivotRow++;
      }
      if (pivotRow == rows)
      {
        continue;
      }
      var pivot = cells[pivotRow][i];
      swapRows(numPivots, pivotRow);
      numPivots++;
      
      // Eliminate below
      for (var j = numPivots; j < rows; j++)
      {
        var g = gcd(pivot, cells[j][i]);
	cells[j] = simplifyRow(addRows(multiplyRow(cells[j], pivot / g), multiplyRow(cells[i], -cells[j][i] / g)));
      }
    }
    
    // Compute reduced row echelon form (RREF), but the leading coefficient need not be 1
    for (var i = rows - 1; i >= 0; i--)
    {
      // Find pivot
      var pivotCol = 0;
      while (pivotCol < cols && cells[i][pivotCol] == 0)
      {
        pivotCol++;
      }
      if (pivotCol == cols)
      {
        continue;
      }
      var pivot = cells[i][pivotCol];
      
      // Eliminate above
      for (var j = i - 1; j >= 0; j--)
      {
	var g = gcd(pivot, cells[j][pivotCol]);
	cells[j] = simplifyRow(addRows(multiplyRow(cells[j], pivot / g), multiplyRow(cells[i], -cells[j][pivotCol] / g)));
      }
    }
  }
  
  // Returns a string representation of this matrix, for debugging purposes.
  this.toString = function()
  {
    var result = "[";
    for (var i = 0; i < rows; i++)
    {
      if (i != 0) result += "],\n";
      result += "[";
      for (var j = 0; j < cols; j++)
      {
	if (j != 0) result += ", ";
	result += cells[i][j];
      }
      result += "]";
    }
    return result + "]";
  }
}

/* Set object */

function Set()
{
  var items = [];
  this.add = function(obj) { if (indexOf(items, obj) == -1) items.push(obj); }
  this.contains = function(obj) { return items.indexOf(obj) != -1; }
  this.toArray = function() { return cloneArray(items); }
}

/* Math functions, miscellaneous */

var NBSP  = "\u00A0";  // No-break space
var MINUS = "\u2212";  // Minus sign


var INT_MAX = 9007199254740992;  // 2^53

function checkedParseInt(str)
{
  var result = parseInt(str, 10);
  if (isNaN(result))
  {
    throw "Not a number";
  }
  if (result <= -INT_MAX || result >= INT_MAX)
  {
    throw "Arithmetic overflow";
  }
  return result;
}

function checkedAdd(x, y)
{
  var z = x + y;
  if (z <= -INT_MAX || z >= INT_MAX)
  {
    throw "Arithmetic overflow";
  }
  return z;
}

function checkedMultiply(x, y)
{
  var z = x * y;
  if (z <= -INT_MAX || z >= INT_MAX)
  {
    throw "Arithmetic overflow";
  }
  return z;
}


function gcd(x, y)
{
  if (typeof x != "number" || typeof y != "number" || isNaN(x) || isNaN(y))
  {
    throw "Invalid argument ";
  }
  x = Math.abs(x);
  y = Math.abs(y);
  while (y != 0)
  {
    var z = x % y;
    x = y;
    y = z;
  }
  return x;
}

// A JavaScript 1.6 function, which every browser has except Internet Explorer
function indexOf(array, item)
{
  for (var i = 0; i < array.length; i++)
  {
    if (array[i] == item)
    {
      return i;
    }
  }
  return -1;
}

// Sometimes used for making a defensive copy
function cloneArray(array)
{
  return array.slice(0);
}

function setMessage(str)
{
  var messageElem = document.getElementById("message");
  removeAllChildren(messageElem);
  messageElem.appendChild(document.createTextNode(str));
}

function removeAllChildren(node)
{
  while (node.childNodes.length > 0)
  {
    node.removeChild(node.firstChild);
  }
}
$(function(){
    //input on click
    $("#chemeuqation").on('click', function () {
      $('html, body').animate({
          scrollTop: $("#top-input").offset().top
      }, 500);
  });

    //example link click
    $('.example-link').on('click', function () {
      $('#chemeuqation').val($(this).text());
  }); // example link on click
    $('#balanceBtn').on('click', function(){
        chemistry();
    })
})
function showError(error) {
  $('html, body').animate({
      scrollTop: $("#top-input").offset().top
  }, 500);
  $('.res-main').addClass('d-none');
  $('#loading-main').removeClass('d-flex');
  $('#loading-main').addClass('d-none');
  $('#error-main').removeClass('d-none');
  $('#error-main').text(error);
}
function scrollToResult(){
   $('.res-main').removeClass('d-none');
  $('html, body').animate({
      scrollTop: $(".res-main").offset().top
  }, 500);
}