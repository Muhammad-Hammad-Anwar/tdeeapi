@if ($pods = Session::get('data'))
    <div class="row">
        <div class="col-lg-12">
            <div class="result-area accordion mt-5" id="accordion">
                @foreach($pods as $key => $pod)
                <div class="card">
                    <div class="card-header" id="heading_{{ $key }}">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_{{ $key }}" aria-expanded="true" aria-controls="collapse_{{ $key }}">
                            {{ $pod['title'] }}
                            </button>
                            <i class="fa-solid fa-arrow-down"></i>
                        </h5>
                    </div>
                    <div id="collapse_{{ $key }}" class="collapse {{ $key == 0 ? 'show' : ''}}" aria-labelledby="heading_{{ $key }}" data-parent="#accordion">
                        <div class="card-body">
                            @foreach($pod['subpods'] as $subpod)
                                <div class="row">
                                    <div class="col-md-4"> 
                                        <img src="{{ $subpod['img']['src'] }}" class="img-responsive thumbnail m-r-15"> 
                                    </div>
                                    <!-- <div class="col-md-8">
                                        {{ $subpod['plaintext'] }}
                                    </div> -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        document.documentElement.scrollTop = 1000; 
    </script>
@endif
@if ($pods = Session::get('result'))
<div class="row">
    <div class="col-lg-12">
        <div class="accordion result-area mt-5" class="resultbox" id="accordion">
            <!-- <div class="card">
                <div class="card-header" id="input">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_input" aria-expanded="true" aria-controls="collapse_input">
                            Input
                        </button>
                    </h5>
                </div>
                <div id="collapse_input" class="collapse show" aria-labelledby="input" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4"> 
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="card">
                <div class="card-header" id="answers">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_answers" aria-expanded="true" aria-controls="collapse_answers">
                            Answers
                        </button>
                    </h5>
                </div>
                <div id="collapse_answers" class="collapse show" aria-labelledby="answers" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                {!! $pods['answer'] !!} 
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="card">
                <div class="card-header" id="flow_steps">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_steps" aria-expanded="true" aria-controls="collapse_steps">
                            Solution
                        </button>
                    </h5>
                </div>
                <div id="collapse_steps" class="collapse show" aria-labelledby="flow_steps" data-parent="#accordion">
                    <div class="card-body" id="steps">
                        @foreach($pods['steps'] as $step)
                            {!! $step !!}
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- <div class="card">
                <div class="card-header" id="parsing_tree">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_parsetree" aria-expanded="true" aria-controls="collapse_parsetree">
                            Parsing Tree
                        </button>
                    </h5>
                </div>
                <div id="collapse_parsetree" class="collapse show" aria-labelledby="parsing_tree" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4"> 
                            </div>
                            <div class="col-md-8">
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<script>
    document.documentElement.scrollTop = 1000; 
</script>
@endif
<!--Percentage yield Calculator-->
@if($pods = Session::get('peryield'))
<div class="row percent-yield mt-5">
    <h3 class="text-center">{{ __(dynamicString('result',$language->id)) }}</h3>
    <div class="card col-lg-6 mt-3 pe-2 text-center">
        <h5 class="card-header">{{ __(dynamicString('theoretical_yield',$language->id)) }}</h5>
        <div class="card-body">
            <h5 class="card-title">{{ $pods['theoreticalyield'] }}</h5>
            <div></div>
        </div>
    </div>
    <div class="card col-lg-6 mt-3 text-center">
        <h5 class="card-header">{{ __(dynamicString('actual_yield',$language->id)) }}</h5>
        <div class="card-body">
            <h5 class="card-title">{{ $pods['actualyield'] }}</h5>
        </div>
    </div>
    <div class="card col-lg-12 mt-5 text-center">
        <h5 class="card-header">{{ __(dynamicString('percentage_yield',$language->id)) }}</h5>
        <div class="card-body">
            <h5 class="card-title">{{ $pods['percentyield'] }}</h5>
        </div>
    </div>
</div>
<script>
        document.documentElement.scrollTop = 1000; 
</script>
@endif
<!--Percent Composition Calculator-->
@if($pods = Session::get('percentcomposition'))
<div class="row justify-content-center mol-weight">
    <h3 class="text-center">{{ __(dynamicString('result',$language->id)) }}</h3>
    <table class="table mt-3">
        <thead>
            <tr>
                <th class="table-heading">{{ __(dynamicString('count',$language->id)) }}</th>
                <th class="table-heading">{{ __(dynamicString('element',$language->id)) }}</th>
                <th class="table-heading">{{ __(dynamicString('molar_mass',$language->id)) }}</th>
                <th class="table-heading">{{ __(dynamicString('per_composition',$language->id)) }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pods['tableData'] as $row)
            <tr>
                <th scope="rows">{{ $row['count'] }}</th>
                <td>{{ $row['symbol'] }}</td>
                <td>{{ $row['molarMass'] }}</td>
                <td>{{ $row['subtotalMass'] }}%</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script>
        document.documentElement.scrollTop = 1000; 
</script>
@endif
<!--Atomic Mass Calculator-->
@if($pods = Session::get('atomicmass'))
<div class="row justify-content-center mol-weight">
    <h3 class="text-center">{{ __(dynamicString('result',$language->id)) }}</h3>
    <table class="table mt-3">
        <thead>
            <tr>
                <th class="table-heading">{{ __(dynamicString('count',$language->id)) }}</th>
                <th class="table-heading">{{ __(dynamicString('atom',$language->id)) }}</th>
                <th class="table-heading">{{ __(dynamicString('molar_mass',$language->id)) }}</th>
                <th class="table-heading">{{ __(dynamicString('subtotal_mass',$language->id)) }}</th>
                <th class="table-heading">{{ __(dynamicString('atomic_mass',$language->id)) }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pods['tableData'] as $row)
            <tr>
                <th scope="rows">{{ $row['count'] }}</th>
                <td>{{ $row['symbol'] }}</td>
                <td>{{ $row['molarMass'] }}</td>
                <td>{{ $row['subtotalMass'] }}</td>
                <td>{{ $row['atomicMass'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script>
        document.documentElement.scrollTop = 1000; 
</script>
@endif
<!--Molecular Weight Calculator-->
@if($pods = Session::get('resultant'))
<div class="row justify-content-center mol-weight">
    <h3 class="text-center">{{ __(dynamicString('result',$language->id)) }}</h3>
    <table class="table mt-3">
        <thead>
            <tr>
                <th class="table-heading">{{ __(dynamicString('count',$language->id)) }}</th>
                <th class="table-heading">{{ __(dynamicString('atom',$language->id)) }}</th>
                <th class="table-heading">{{ __(dynamicString('molar_mass',$language->id)) }}</th>
                <th class="table-heading">{{ __(dynamicString('subtotal_mass',$language->id)) }}</th>
                <th class="table-heading">{{ __(dynamicString('atomic_mass',$language->id)) }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pods['tableData'] as $row)
            <tr>
                <th scope="rows">{{ $row['count'] }}</th>
                <td>{{ $row['symbol'] }}</td>
                <td>{{ $row['molarMass'] }}</td>
                <td>{{ $row['subtotalMass'] }}</td>
                <td>{{ $row['atomicMass'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card col-lg-6 mt-5 text-center">
        <h5 class="card-header">{{ __(dynamicString('molecular_weight',$language->id)) }}</h5>
        <div class="card-body">
            <h5 class="card-title">{{ $pods['molecularweight'] }}</h5>
        </div>
    </div>
</div>
<script>
        document.documentElement.scrollTop = 1000; 
</script>
@endif
<!--Theoretical Yield Calculator-->
@if($pods = Session::get('theoreticalyield'))
<div class="row percent-yield justify-content-center mt-5">
    <h3 class="text-center">{{ __(dynamicString('result',$language->id)) }}</h3>
    <div class="card col-lg-4 mt-5 text-center">
        <h5 class="card-header">{{ __(dynamicString('mass',$language->id)) }}</h5>
        <div class="card-body">
            <h5 class="card-title">{{ $pods['resultmass'] }}</h5>
        </div>
    </div>
    <div class="card col-lg-4 mt-5 text-center">
        <h5 class="card-header">{{ __(dynamicString('molecular_weight',$language->id)) }}</h5>
        <div class="card-body">
            <h5 class="card-title">{{ $pods['weight'] }}</h5>
        </div>
    </div>
    <div class="card col-lg-4 mt-5 text-center">
        <h5 class="card-header">{{ __(dynamicString('moles',$language->id)) }}</h5>
        <div class="card-body">
            <h5 class="card-title">{{ $pods['resultmoles'] }}</h5>
        </div>
    </div>
    <div class="card col-lg-6 mt-5 text-center">
        <h5 class="card-header">{{ __(dynamicString('theoretical_yield',$language->id)) }}</h5>
        <div class="card-body">
            <h5 class="card-title">{{ $pods['yield'] }}</h5>
        </div>
    </div>
</div>
<script>
        document.documentElement.scrollTop = 1000; 
</script>
@endif
<!--Titration Calculator-->
@if($pods = Session::get('amolarity'))
<div class="row percent-yield justify-content-center mt-5">
    <h3 class="text-center">{{ __(dynamicString('result',$language->id)) }}</h3>
    <h4 class="text-center mt-3">{{ __(dynamicString('acid_molarity',$language->id)) }}</h4>
    <div class="form-group col-lg-6 pe-1 mt-3">
        <input class="form-control" id="macid_res" type="text" value="{{ $pods }}" disabled/>
    </div>
    <div class="form-group col-lg-6 mt-3">
        <select class="form-select" name="macidunit" id="macid_u_result">
            <option value="molar" selected>{{ __(dynamicString('molar',$language->id)) }}</option>
            <option value="picomolar">{{ __(dynamicString('picomolar',$language->id)) }}</option>
            <option value="nanomolar">{{ __(dynamicString('nanomolar',$language->id)) }}</option>
            <option value="micromolar">{{ __(dynamicString('micromolar',$language->id)) }}</option>
            <option value="millimolar">{{ __(dynamicString('millimolar',$language->id)) }}</option>
        </select>
    </div>
</div>
<script>
    document.documentElement.scrollTop = 1000;
    document.getElementById('macid_u_result').addEventListener('change', function () {
    var resultOrig = parseFloat(document.getElementById('macid_res').value);
    var resultUnit = document.getElementById('macid_u_result').value;
    if (resultUnit === "molar") {
        resultOrig = resultOrig; 
    } else if (resultUnit === "picomolar") {
        resultOrig = resultOrig * 0.000000000001;
    } else if (resultUnit === "nanomolar") {
        resultOrig = resultOrig * 0.000000001;
    } else if (resultUnit === "micromolar") {
        resultOrig = resultOrig * 0.000001;
    } else if (resultUnit === "millimolar") {
        resultOrig = resultOrig * 0.001;
    }

    document.getElementById('macid_res').value = resultOrig;
    });
</script>
@endif
@if($pods = Session::get('avolume'))
<div class="row percent-yield justify-content-center mt-5">
    <h3 class="text-center">{{ __(dynamicString('result',$language->id)) }}</h3>
    <h4 class="text-center mt-3">{{ __(dynamicString('acid_volume',$language->id)) }}</h4>
    <div class="form-group col-lg-6 pe-1 mt-3">
        <input class="form-control" type="number" id="vacid_res" value="{{ $pods }}" disabled/>
    </div>
    <div class="form-group col-lg-6 mt-3">
        <select class="form-select" id="vacid_u_result" name="unit">
            <option value="liter" selected>{{ __(dynamicString('liter',$language->id)) }}</option>
            <option value="nanoliter">{{ __(dynamicString('nanoliter_unit',$language->id)) }}</option>
            <option value="microliter">{{ __(dynamicString('microliter_unit',$language->id)) }}</option>
            <option value="mililiter">{{ __(dynamicString('milliliter',$language->id)) }}</option>
        </select>
    </div>
</div>
<script>
    document.documentElement.scrollTop = 1000; 
    document.getElementById('vacid_u_result').addEventListener('change', function () {
    var resultOrig = parseFloat(document.getElementById('vacid_res').value);
    var resultUnit = document.getElementById('vacid_u_result').value;

    if (resultUnit === "liter") {
        resultOrig = resultOrig;
    } else if (resultUnit === "nanoliter") {
        resultOrig = resultOrig * 0.000000001;
    } else if (resultUnit === "microliter") {
        resultOrig = resultOrig * 0.000001;
    }else if (resultUnit === "mililiter") {
        resultOrig = resultOrig * 0.001;
    }

    document.getElementById('vacid_res').value = resultOrig;
    });
</script>
@endif
@if($pods = Session::get('contributedmoles'))
<div class="row percent-yield justify-content-center">
    <h3 class="text-center">{{ __(dynamicString('result',$language->id)) }}</h3>
    <h4 class="text-center mt-3">{{ __(dynamicString('contributed_moles',$language->id)) }}</h4>
    <div class="form-group col-lg-12 pe-1 mt-3">
        <input class="form-control" type="number" value="{{ $pods }}" disabled/>
    </div>
</div>
<script>
        document.documentElement.scrollTop = 1000; 
</script>
@endif
@if($pods = Session::get('bmolarity'))
<div class="row percent-yield justify-content-center">
    <h3 class="text-center">{{ __(dynamicString('result',$language->id)) }}</h3>
    <h4 class="text-center mt-3">{{ __(dynamicString('base_molarity',$language->id)) }}</h4>
    <div class="form-group col-lg-6 pe-1 mt-3">
        <input class="form-control" type="number" value="{{ $pods }}" id="mbase_res" disabled/>
    </div>
    <div class="form-group col-lg-6 mt-3">
        <select class="form-select" name="macidunit" id="mbase_u_result">
            <option value="molar" selected>{{ __(dynamicString('molar',$language->id)) }}</option>
            <option value="picomolar">{{ __(dynamicString('picomolar',$language->id)) }}</option>
            <option value="nanomolar">{{ __(dynamicString('nanomolar',$language->id)) }}</option>
            <option value="micromolar">{{ __(dynamicString('micromolar',$language->id)) }}</option>
            <option value="millimolar">{{ __(dynamicString('millimolar',$language->id)) }}</option>
        </select>
    </div>
</div>
<script>
    document.documentElement.scrollTop = 1000; 
    document.getElementById('mbase_u_result').addEventListener('change', function () {
    var resultOrig = parseFloat(document.getElementById('mbase_res').value);
    var resultUnit = document.getElementById('mbase_u_result').value;

    if (resultUnit === "picomolar") {
        resultOrig = resultOrig * 0.000000000001;
    } else if (resultUnit === "nanomolar") {
        resultOrig = resultOrig * 0.000000001;
    } else if (resultUnit === "micromolar") {
        resultOrig = resultOrig * 0.000001;
    } else if (resultUnit === "millimolar") {
        resultOrig = resultOrig * 0.001;
    } else if (resultUnit === "molar") {
        resultOrig = resultOrig;
    }

    document.getElementById('mbase_res').value = resultOrig;
    });
</script>
@endif
@if($pods = Session::get('bvolume'))
<div class="row percent-yield justify-content-center mt-5">
    <h3 class="text-center">{{ __(dynamicString('result',$language->id)) }}</h3>
    <h4 class="text-center mt-3">{{ __(dynamicString('base_volume',$language->id)) }}</h4>
    <div class="form-group col-lg-6 pe-1 mt-3">
        <input class="form-control" type="number" id="vbase_res" value="{{ $pods }}" disabled/>
    </div>
    <div class="form-group col-lg-6 mt-3">
        <select class="form-select" name="unit" id="vbase_u_result">
            <option value="liter" selected>{{ __(dynamicString('liter',$language->id)) }}</option>
            <option value="nanoliter">{{ __(dynamicString('nanoliter_unit',$language->id)) }}</option>
            <option value="microliter">{{ __(dynamicString('microliter_unit',$language->id)) }}</option>
            <option value="mililiter">{{ __(dynamicString('milliliter',$language->id)) }}</option>
        </select>
    </div>
</div>
<script>
    document.documentElement.scrollTop = 1000; 
    document.getElementById('vbase_u_result').addEventListener('change', function () {
    var resultOrig = parseFloat(document.getElementById('vbase_res').value);
    var resultUnit = document.getElementById('vbase_u_result').value;

    if (resultUnit === "liter") {
        resultOrig = resultOrig;
    } else if (resultUnit === "nanoliter") {
        resultOrig = resultOrig * 0.000000001;
    } else if (resultUnit === "microliter") {
        resultOrig = resultOrig * 0.000001;
    }else if (resultUnit === "mililiter") {
        resultOrig = resultOrig * 0.001;
    }

    document.getElementById('vbase_res').value = resultOrig;
    });
</script>
@endif
@if($pods = Session::get('COHmoles'))
<div class="row percent-yield justify-content-center">
    <h3 class="text-center">{{ __(dynamicString('result',$language->id)) }}</h3>
    <h4 class="text-center mt-3">{{ __(dynamicString('oh-_contributed_moles',$language->id)) }}</h4>
    <div class="form-group col-lg-12 pe-1 mt-3">
        <input class="form-control" type="number" value="{{ $pods }}" aria-label="readonly input example" readonly/>
    </div>
</div>
<script>
        document.documentElement.scrollTop = 1000; 
</script>
@endif
<!--Oxidation Number Calculator-->
@if($pods = Session::get('oxidationnumber'))
<div class="row justify-content-center mol-weight">
    <h3 class="text-center">{{ __(dynamicString('result',$language->id)) }}</h3>
    <table class="table mt-3">
        <thead>
            <tr>
                <th class="table-heading">{{ __(dynamicString('count',$language->id)) }}</th>
                <th class="table-heading">{{ __(dynamicString('element',$language->id)) }}</th>
                <th class="table-heading">{{ __(dynamicString('oxidation_number',$language->id)) }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pods['tableData'] as $row)
            <tr>
                <th scope="rows">{{ $row['count'] }}</th>
                <td>{{ $row['symbol'] }}</td>
                <td>{{ $row['molarMass'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
        document.documentElement.scrollTop = 1000; 
</script>
@endif