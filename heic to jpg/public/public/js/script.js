var ftInput = document.getElementById("ft-input");
var inInput = document.getElementById("in-input");
var cmInput = document.getElementById("cm-input");
ftInput.style.display = "block";
inInput.style.display = "block";
cmInput.style.display = "none";


function toggleHeightFields(selectElement) {
  var ftInput = document.getElementById("ft-input");
  var inInput = document.getElementById("in-input");
  var cmInput = document.getElementById("cm-input");

  if (selectElement.value === "1") {
    ftInput.style.display = "block";
    inInput.style.display = "none";
    cmInput.style.display = "none";
  } else if (selectElement.value === "2") {
    ftInput.style.display = "none";
    inInput.style.display = "block";
    cmInput.style.display = "none";
  } else if (selectElement.value === "3") {
    ftInput.style.display = "none";
    inInput.style.display = "none";
    cmInput.style.display = "block";
  } else {
    ftInput.style.display = "block";
    inInput.style.display = "block";
    cmInput.style.display = "none";
  }
}

function showInput(unit) {
  var weightInputKg = document.getElementById("weight-input-kg");
  var weightInputLbs = document.getElementById("weight-input-lbs");

  if (unit === "kg") {
    weightInputKg.style.display = "block";
    weightInputLbs.style.display = "none";
  } else if (unit === "lbs") {
    weightInputKg.style.display = "none";
    weightInputLbs.style.display = "block";
  }
}

function updateDropdown(unit) {
  var dropdownButton = document.querySelector(".dropdown-button");
  dropdownButton.innerText = unit;
}



    document.addEventListener("DOMContentLoaded", function() {
        // Get all the tab buttons
        const tabButtons = document.querySelectorAll(".nav-link");

        // Attach click event listener to each tab button
        tabButtons.forEach(function(tabButton) {
            tabButton.addEventListener("click", function() {
                // Get the target tab pane
                const targetPaneId = this.getAttribute("data-bs-target");
                const targetPane = document.querySelector(targetPaneId);

                // Remove the 'show active' class from all tab panes
                const tabPanes = document.querySelectorAll(".tab-pane");
                tabPanes.forEach(function(tabPane) {
                    tabPane.classList.remove("show", "active");
                });

                // Add the 'show active' class to the target tab pane
                targetPane.classList.add("show", "active");
            });
        });
    });