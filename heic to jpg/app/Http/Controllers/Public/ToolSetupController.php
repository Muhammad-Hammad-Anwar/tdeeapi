<?php

namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;

class ToolSetupController extends Controller
{
    public function index(Request $request)
    {
        $formData = $request->all();
        isset($request->weight_lbs) ? $weight = $request->weight_lbs * 0.453592 : $weight = $request->weight_kg;
        if (isset($request->height_cm)) {
            $height = $request->height_cm;
        } else {
            if(isset($request->height_in))
            {
                $height = ($request->height_ft * 12 + $request->height_in) * 2.54;
            }else{
                $height = $request->height_ft * 30.48;
            }
        }
        $formData['weight'] = $weight;
        $formData['height'] = $height;
        $result=[
            'bmr' => $this->bmr($formData),
            'rmr' => $this->rmr($formData),
            'bmi' => $this->bmi($formData),
            'ibw' => $this->ibw($formData),
            'bfp' => $this->bfp($formData),
            'lbw' => $this->lbw($formData),
            'dpn' => $this->dpn($formData),
            'whr' => $this->whr($formData)
        ];
        //  dd($formData);
        return redirect()->back()->withInput()->with(['data' => $result]);
    }
    /**
     * Calculate the result of BMR Calculator from request.
     */
    public function bmr($request)
    {
        /**
        * Haris Benedict.
        */
        $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);
        $levels   = calculate_levels($BMR);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);
        $harris_benedict = ['levels' => $levels, 'goals' => $goals, 'calories' => $calories];
        /**
        * mifflin_st_jeor.
        */
        $request['gender'] == 'Male' ? $BMR =(10 * $request['weight']) + (6.25 * $request['height']) - (5 * $request['age']) + 5 : $BMR = (10 * $request['weight']) + (6.25 * $request['height']) - (5 * $request['age']) - 161;
        $levels   = calculate_levels($BMR);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);
        $mifflin_st_jeor = ['levels' => $levels, 'goals' => $goals, 'calories' => $calories];
        /**
        * katch_mcardle.
        */
        if ($request['gender'] == 'Male') {
            // $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']);
            $BMR = $LeanBodyMass = (0.105 * $request['weight']) + (0.248 * $request['height']) - 4.31;
        } else {
            // $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);
            $BMR = $LeanBodyMass = (0.089 * $request['weight']) + (0.245 * $request['height']) - 2.67;
        }
        $BMR += 370 + (21.6 * $LeanBodyMass);
        $levels   = calculate_levels($BMR);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);
        $katch_mcardle = ['levels' => $levels, 'goals' => $goals, 'calories' => $calories];
        /**
        * cunningham.
        */
        if ($request['gender'] == 'Male') {
            // $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']);
            $BMR = $LeanBodyMass = (1.10 * $request['weight']) - (128 * pow(($request['weight'] / $request['height']), 2));
        } else {
            // $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);
            $BMR =  $LeanBodyMass = (1.07 * $request['weight']) - (148 * pow(($request['weight'] / $request['height']), 2));
        }
        $BMR += 500 + (22 * $LeanBodyMass);
        $levels   = calculate_levels($BMR);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);
        $cunningham = ['levels' => $levels, 'goals' => $goals, 'calories' => $calories];
        /**
        * oxford.
        */
        if ($request['gender'] == 'Male') {
            $BMR = (9.99 * $request['weight']) + (6.25 * $request['height']) - (4.92 * $request['age']) + 5;
        } else {
            $BMR = (9.99 * $request['weight']) + (6.25 * $request['height']) - (4.92 * $request['age']) - 161;
        }
        $levels   = calculate_levels($BMR);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);
        $oxford = ['levels' => $levels, 'goals' => $goals, 'calories' => $calories];
        return ['harris_benedict' => $harris_benedict, 'mifflin_st_jeor' => $mifflin_st_jeor,'katch_mcardle' => $katch_mcardle,'cunningham' => $cunningham, 'oxford' => $oxford];
    }
    /**
      * Calculate the result of RMR Calculator from request.
     */
    public function rmr($request)
    {
        /**
        * Haris Benedict.
        */
        if ($request['gender'] == 'Male') {
            $RMR = 88.362 + (13.397 * $request['weight']) + (4.799 * $request['height']) - (5.677 * $request['age']);
        } else {
            $RMR = 447.593 + (9.247 * $request['weight']) + (3.098 * $request['height']) - (4.330 * $request['age']);
        }
        $levels   = calculate_levels($RMR);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);
        $harris_benedict = ['calories' => $calories];
        /**
        * mifflin_st_jeor.
        */
        if ($request['gender'] == 'Male') {
            $RMR = (10 * $request['weight']) + (6.25 * $request['height']) - (5 * $request['age']) + 5;
        } else {
            $RMR = (10 * $request['weight']) + (6.25 * $request['height']) - (5 * $request['age']) - 161;
        }
        $levels   = calculate_levels($RMR);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);
        $mifflin_st_jeor = ['calories' => $calories];
        return ['harris_benedict' => $harris_benedict, 'mifflin_st_jeor' => $mifflin_st_jeor];
    }
    /**
     * Calculate the result of BMI Calculator from request.
    */
    public function bmi($request)
    {
        /**
        * quetelet.
        */
        $weightInKg = $request['weight'];
        $height = $request['height'] / 100;
        $BMI = $weightInKg / ($height * $height);
        $roundedBMI = round($BMI, 2);
        $quetelet = ['quetelet' => $roundedBMI];
        // dd($quetelet)
        /**
        * Metric.
        */
        $weightInKg = $request['weight'];
        $heightInCm = $request['height'];
        $BMI = $weightInKg / (($heightInCm / 100) * ($heightInCm / 100));
        $roundedBMI = round($BMI, 2); // Round the BMI value to two decimal places
        $Metric = ['Metric' => $roundedBMI];
        /**
        * English.
        */
        $weightInKg = $request['weight'];
        $heightInInches = $request['height'];
        $weightInLb = $weightInKg * 2.20462;
        $BMI = (703 * $weightInLb) / ($heightInInches * $heightInInches);
        $roundedBMI = round($BMI, 2);
        $English = ['English' => $roundedBMI];
        /**
        * WHO.
        */
        $weightInKg = $request['weight'];
        $heightInMeters = $request['height'] / 100;
        $BMI = $weightInKg / ($heightInMeters * $heightInMeters);
        $roundedBMI = round($BMI, 2);
        $WHO = ['WHO' => $roundedBMI];
        /**
        * NIH.
        */
        $weightInKg = $request['weight'];
        $heightInInches = $request['height'];
        $weightInLb = $weightInKg * 2.20462;
        $BMI = ($weightInLb / ($heightInInches * $heightInInches)) * 703;
        $roundedBMI = round($BMI, 2);
        $NIH = ['NIH' => $roundedBMI];
        return [
            'quetelet'=> $quetelet,'Metric'=> $Metric, 'English'=> $English, 'WHO'=> $WHO, 'NIH'=> $NIH
        ];
    }
    /**
     *  * Calculate the result of IBW Calculator from request.
     */
    public function ibw($request)
    {
        /**
        * GJ_Hamwi.
        */
        $heightInCm = $request['height'];
        $heightInInches = $heightInCm / 2.54;
        $isMale = $request['gender'] == 'male';
        if ($isMale) {
            $IBW = 48 + (2.7 * ($heightInInches - 60));
        } else {
            $IBW = 45.5 + (2.2 * ($heightInInches - 60));
        }
        $roundedIBW = round($IBW, 2);
        $GJ_Hamwi = ['GJ_Hamwi' => $roundedIBW];
         /**
        * BJ_Devine.
        */
        $heightInCm = $request['height'];
        $heightInInches = $heightInCm / 2.54;
        $isMale = $request['gender'] == 'male';
        $IBW = $isMale ? (50 + (2.3 * ($heightInInches - 60))) : (45.5 + (2.3 * ($heightInInches - 60)));
        $roundedIBW = round($IBW, 2);
        $BJ_Devine = ['BJ_Devine' => $roundedIBW];
        /**
        * JD_Robinson.
        */
        $heightInCm = $request['height'];
        $heightInInches = $heightInCm / 2.54;
        $isMale = $request['gender'] == 'male';
        $IBW = $isMale ? (52 + (1.9 * ($heightInInches - 60))) : (49 + (1.7 * ($heightInInches - 60)));
        $roundedIBW = round($IBW, 2);
        $JD_Robinson = ['JD_Robinson' => $roundedIBW];
         /**
        * DR_Miller.
        */
        $heightInCm = $request['height'];
        $heightInInches = $heightInCm / 2.54;
        $isMale = $request['gender'] == 'male';
        $IBW = $isMale ? (56.2 + (1.41 * ($heightInInches - 60))) : (53.1 + (1.36 * ($heightInInches - 60)));
        $roundedIBW = round($IBW, 2);
        $DR_Miller = ['DR_Miller' => $roundedIBW];
          /**
        * BMI_based.
        */
        $heightInCm = $request['height'];
        $heightInMeters = $heightInCm / 100;
        $BMI = $request['weight'] / ($heightInMeters * $heightInMeters);
        $IBW = $BMI * ($heightInMeters * $heightInMeters);
        $roundedIBW = round($IBW, 2);
        $BMI_based = ['BMI_based' => $roundedIBW];
         /**
        * Broca.
        */
        if ($request['gender'] == 'male') {
            $IBW = ($request['height'] - 100) - (($request['height'] - 100) * 0.1);
        } else {
            $IBW = ($request['height'] - 100) + (($request['height'] - 100) * 0.15);
        }
        $roundedIBW = round($IBW, 2);
        $Broca = ['Broca' => $roundedIBW];
        /**
        * Harry.
        */
        $heightInCm = $request['height'];
        $heightInMeters = $heightInCm / 100;
        $IBW = 22 * pow($heightInMeters, 2);
        $roundedIBW = round($IBW, 2);
        $Harry = ['Harry' => $roundedIBW];
        return  [
            'GJ_Hamwi'=> $GJ_Hamwi,'BJ_Devine'=> $BJ_Devine,'JD_Robinson'=> $JD_Robinson,'DR_Miller'=> $DR_Miller,'BMI_based'=> $BMI_based,'Broca'=> $Broca,'Harry'=> $Harry
        ];
    }

    /**
     * Calculate the result of BFP Calculator from request.
     */
    public function bfp($request)
    {
        /**
        * Deurenberg.
        */
        //
        $genderFactor = $request['gender'] == 'male' ? 1 : 0;
        $BMI = $request['weight'] / pow(($request['height'] / 100), 2);
        $bodyFatPercentage = (1.20 * $BMI) + (0.23 * $request['age']) - (10.8 * $genderFactor) - 5.4;
        $roundedBodyFatPercentage = round($bodyFatPercentage, 2);
        $Deurenberg = ['Deurenberg' => $roundedBodyFatPercentage];
        // dd($Deurenberg);
              /**
        * Deurenberg2.
        */
        $genderFactor = $request['gender'] == 'male' ? 1 : 0;
        $BMI = $request['weight'] / pow(($request['height'] / 100), 2);
        $bodyFatPercentage = (1.29 * $BMI) + (0.20 * $request['age']) - (11.4 * $genderFactor) - 8.0;
        $roundedBodyFatPercentage = round($bodyFatPercentage, 2);
        $Deurenberg2 = ['Deurenberg2' => $roundedBodyFatPercentage];
        /**
        * Gallagher.
        */
        $genderFactor = $request['gender'] == 'male' ? 1 : 0;
        $BMI = $request['weight'] / pow(($request['height'] / 100), 2);
        $bodyFatPercentage = (1.46 * $BMI) + (0.14 * $request['age']) - (11.6 * $genderFactor) - 10;
        $roundedBodyFatPercentage = round($bodyFatPercentage, 2);
        $Gallagher = ['Gallagher' => $roundedBodyFatPercentage];
        /**
        * Jackson_Pollock.
        */
        $genderFactor = $request['gender'] == 'male' ? 1 : 0;
        $BMI = $request['weight'] / pow(($request['height'] / 100), 2);
        $bodyFatPercentage = (1.61 * $BMI) + (0.13 * $request['age']) - (12.1 * $genderFactor) - 13.9;
        $roundedBodyFatPercentage = round($bodyFatPercentage, 2);
        $Jackson_Pollock = ['Jackson_Pollock' => $roundedBodyFatPercentage];
        /**
        * Jackson.
        */
        $genderFactor = $request['gender'] == 'male' ? 1 : 0;
        $BMI = $request['weight'] / pow(($request['height'] / 100), 2);
        $bodyFatPercentage = (1.39 * $BMI) + (0.16 * $request['age']) - (10.34 * $genderFactor) - 9;
        $roundedBodyFatPercentage = round($bodyFatPercentage, 2);
        $Jackson = ['Jackson' => $roundedBodyFatPercentage];
        return [
            'Deurenberg'=> $Deurenberg,'Deurenberg2'=> $Deurenberg2,'Gallagher'=> $Gallagher,'Jackson_Pollock'=> $Jackson_Pollock,'Jackson'=> $Jackson,
        ];
    }
    /**
     * Calculate the result of LBW Calculator from request.
     */
    public function lbw($request)
    {
        /**
        * Boer.
        */
        $gender = $request['gender'];
        $weight = $request['weight'];
        $height = $request['height'];
        if ($gender == 'male') {
            $LBW = 0.407 * $weight + 0.267 * $height - 19.2;
        } else {
            $LBW = 0.252 * $weight + 0.473 * $height - 48.3;
        }
        $roundedLBW = round($LBW, 2);
        $Boer = ['Boer' => $roundedLBW];
        /**
        * James.
        */
        $gender = $request['gender'];
        $weight = $request['weight'];
        $height = $request['height'];
        if ($gender == 'male') {
            $BMR = 1.10 * $weight - 128 * pow($weight / $height, 2);
        } else {
            $BMR = 1.07 * $weight - 148 * pow($weight / $height, 2);
        }
        $roundedBMR = round($BMR, 2);
        $James = ['James' => $roundedBMR];
        /**
        * Hume.
        */
        $gender = $request['gender'];
        $weight = $request['weight'];
        $height = $request['height'];
        if ($gender == 'male') {
            $LBM = (0.32810 * $weight) + (0.33929 * $height) - 29.5336;
        } else {
            $LBM = (0.29569 * $weight) + (0.41813 * $height) - 43.2933;
        }
        $roundedLBM = round($LBM, 2);
        $Hume = ['Hume' => $roundedLBM];
        return [
            'Boer'=> $Boer,'James'=> $James,'Hume'=> $Hume
        ];
    }
    /**
     * Calculate the result of DPN Calculator from request.
     */
    public function dpn($request)
    {
        /**
        * RDA.
        */
        $weight = $request['weight'];
        $DPN_RDA = $weight * 0.8;
        /**
        * ADA.
        */
        $DPN_ADA = $weight * 1.2;
        /**
        * IOM.
        */
        $DPN_IOM = $weight * 0.35;
        return [
            'RDA' => $DPN_RDA,
            'ADA' => $DPN_ADA,
            'IOM' => $DPN_IOM
        ];
    }
    /**
     * Calculate the result of WHR Calculator from request.
     */
    public function whr($request)
    {
        //
        return "HWR";
    }
}
