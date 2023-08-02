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
        // dd($request['goal']);
        // dd($goals);
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
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

        if ($request['gender'] == 'Male') {
            $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']);
            $LeanBodyMass = (0.105 * $request['weight']) + (0.248 * $request['height']) - 4.31;
        } else {
            $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);
            $LeanBodyMass = (0.089 * $request['weight']) + (0.245 * $request['height']) - 2.67;
        }

        $BMR += 370 + (21.6 * $LeanBodyMass);

        $levels   = calculate_levels($BMR);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

        $katch_mcardle = ['levels' => $levels, 'goals' => $goals, 'calories' => $calories];

        /**
        * cunningham.
        */
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);
        if ($request['gender'] == 'Male') {
            $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']);
            $LeanBodyMass = (1.10 * $request['weight']) - (128 * pow(($request['weight'] / $request['height']), 2));
        } else {
            $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);
            $LeanBodyMass = (1.07 * $request['weight']) - (148 * pow(($request['weight'] / $request['height']), 2));
        }

        $BMR += 500 + (22 * $LeanBodyMass);


        $levels   = calculate_levels($BMR);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

        $cunningham = ['levels' => $levels, 'goals' => $goals, 'calories' => $calories];

        /**
        * oxford.
        */
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

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
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

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
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

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
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

        $weightInKg = $request['weight'];
        $height = $request['height'] / 100; // Convert height from cm to meters

        $BMI = $weightInKg / ($height * $height);


        $levels   = calculate_levels($BMI);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

       $quetelet = ['calories' => $calories];


        /**
        * Metric.
        */
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

        $weightInKg = $request['weight'];
        $heightInCm = $request['height'];

        $BMI = $weightInKg / (($heightInCm / 100) * ($heightInCm / 100));


        $levels   = calculate_levels($BMI);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

       $Metric = ['calories' => $calories];


        /**
        * English.
        */
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

        $weightInLb = $request['weight'];
        $heightInInches = $request['height'];

        $BMI = (703 * $weightInLb) / ($heightInInches * $heightInInches);


        $levels   = calculate_levels($BMI);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

       $English = ['calories' => $calories];

        /**
        * WHO.
        */
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

        $weightInKg = $request['weight'];
        $heightInMeters = $request['height'] / 100; // Convert height from cm to meters

        $BMI = $weightInKg / ($heightInMeters * $heightInMeters);


        $levels   = calculate_levels($BMI);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

       $WHO = ['calories' => $calories];

        /**
        * NIH.
        */
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

        $weightInLb = $request['weight'];
        $heightInInches = $request['height'];

        $BMI = ($weightInLb / ($heightInInches * $heightInInches)) * 703;


        $levels   = calculate_levels($BMI);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

       $NIH = ['calories' => $calories];

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
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

        $heightInInches = $request['height'];
        $isMale = $request['gender'] == 'Male';

        $IBW = $isMale ? (48 + (2.7 * $heightInInches - 60)) : (45.5 + (2.2 * $heightInInches - 60));


        $levels   = calculate_levels($IBW);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

        $GJ_Hamwi = ['calories' => $calories];

         /**
        * BJ_Devine.
        */
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

        $heightInInches = $request['height'];
        $isMale = $request['gender'] == 'Male';

        $IBW = $isMale ? (50 + (2.3 * $heightInInches - 60)) : (45.5 + (2.3 * $heightInInches - 60));


        $levels   = calculate_levels($IBW);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

        $BJ_Devine = ['calories' => $calories];

        /**
        * JD_Robinson.
        */
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

        $heightInCm = $request['height'];
        $isMale = $request['gender'] == 'Male';

        $IBW = $isMale ? (52 + (1.9 * $heightInCm - 152.4)) : (49 + (1.7 * $heightInCm - 152.4));


        $levels   = calculate_levels($IBW);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

       $JD_Robinson = ['calories' => $calories];

         /**
        * DR_Miller.
        */
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

        $heightInCm = $request['height'];
        $isMale = $request['gender'] == 'Male';

        $IBW = $isMale ? (56.2 + (1.41 * $heightInCm - 152.4)) : (53.1 + (1.36 * $heightInCm - 152.4));


        $levels   = calculate_levels($IBW);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

       $DR_Miller = ['calories' => $calories];

          /**
        * BMI_based.
        */
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

        $heightInMeters = $request['height'] / 100; // Convert height from centimeters to meters
        $BMI = $request['weight'] / ($heightInMeters * $heightInMeters);
        $IBW = $BMI * ($heightInMeters * $heightInMeters);


        $levels   = calculate_levels($IBW);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

       $BMI_based = ['calories' => $calories];

         /**
        * Broca.
        */
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

        if ($request['gender'] == 'Male') {
            $IBW = ($request['height'] - 100) - (($request['height'] - 100) * 0.1);
        } else {
            $IBW = ($request['height'] - 100) + (($request['height'] - 100) * 0.15);
        }


        $levels   = calculate_levels($IBW);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

       $Broca = ['calories' => $calories];

        /**
        * Harry.
        */
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

        $heightInMeters = $request['height'] / 100; // Convert height from centimeters to meters
        $IBW = 22 * pow($heightInMeters, 2);


        $levels   = calculate_levels($IBW);
         $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

        $Harry = ['calories' => $calories];
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

        $genderFactor = $request['gender'] == 'Male' ? 1 : 0; // Assign 1 for male, 0 for female
        $BMI = $request['weight'] / pow(($request['height'] / 100), 2); // Calculate BMI using weight in kg and height in meters

        $bodyFatPercentage = (1.20 * $BMI) + (0.23 * $request['age']) - (10.8 * $genderFactor) - 5.4;

        $levels = calculate_levels($bodyFatPercentage);
        $goals = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

        $Deurenberg = ['calories' => $calories];


              /**
        * Deurenberg2.
        */
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

        $genderFactor = $request['gender'] == 'Male' ? 1 : 0; // Assign 1 for male, 0 for female
        $BMI = $request['weight'] / pow(($request['height'] / 100), 2); // Calculate BMI using weight in kg and height in meters

        $bodyFatPercentage = (1.29 * $BMI) + (0.20 * $request['age']) - (11.4 * $genderFactor) - 8.0;


        $levels   = calculate_levels($bodyFatPercentage);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

       $Deurenberg2 = ['calories' => $calories];

        /**
        * Gallagher.
        */
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

        $genderFactor = $request['gender'] == 'Male' ? 1 : 0; // Assign 1 for male, 0 for female
        $BMI = $request['weight'] / pow(($request['height'] / 100), 2); // Calculate BMI using weight in kg and height in meters

        $bodyFatPercentage = (1.46 * $BMI) + (0.14 * $request['age']) - (11.6 * $genderFactor) - 10;


        $levels   = calculate_levels($bodyFatPercentage);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

       $Gallagher = ['calories' => $calories];

        /**
        * Jackson_Pollock.
        */
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

        $genderFactor = $request['gender'] == 'Male' ? 1 : 0; // Assign 1 for male, 0 for female
        $BMI = $request['weight'] / pow(($request['height'] / 100), 2); // Calculate BMI using weight in kg and height in meters

        $bodyFatPercentage = (1.61 * $BMI) + (0.13 * $request['age']) - (12.1 * $genderFactor) - 13.9;


        $levels   = calculate_levels($bodyFatPercentage);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

       $Jackson_Pollock = ['calories' => $calories];

        /**
        * Jackson.
        */
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

        $genderFactor = $request['gender'] == 'Male' ? 1 : 0; // Assign 1 for male, 0 for female
        $BMI = $request['weight'] / pow(($request['height'] / 100), 2); // Calculate BMI using weight in kg and height in meters

        $bodyFatPercentage = (1.39 * $BMI) + (0.16 * $request['age']) - (10.34 * $genderFactor) - 9;


        $levels   = calculate_levels($bodyFatPercentage);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

       $Jackson = ['calories' => $calories];


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
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

        $gender = $request['gender'];
        $weight = $request['weight'];
        $height = $request['height'];

        if ($gender == 'Male') {
            $LBW = 0.407 * $weight + 0.267 * $height - 19.2;
        } else {
            $LBW = 0.252 * $weight + 0.473 * $height - 48.3;
        }


        $levels   = calculate_levels($LBW);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

       $Boer = ['calories' => $calories];

        /**
        * James.
        */
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

        $gender = $request['gender'];
        $weight = $request['weight'];
        $height = $request['height'];

        if ($gender == 'Male') {
        $BMR = 1.10 * $weight - 128 * pow($weight / $height, 2);
        } else {
        $BMR = 1.07 * $weight - 148 * pow($weight / $height, 2);
        }


        $levels   = calculate_levels($BMR);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

       $James = ['calories' => $calories];

        /**
        * Hume.
        */
        // $request['gender'] == 'Male' ? $BMR = 66.5 + (13.75 * $request['weight']) + (5.003 * $request['height']) - (6.75 * $request['age']) : $BMR = 655 + (4.35 * $request['weight']) + (4.7 * $request['height']) - (4.7 * $request['age']);

        $gender = $request['gender'];
        $weight = $request['weight'];
        $height = $request['height'];

        if ($gender == 'Male') {
        $LBM = (0.32810 * $weight) + (0.33929 * $height) - 29.5336;
        } else {
        $LBM = (0.29569 * $weight) + (0.41813 * $height) - 43.2933;
        }

        $levels   = calculate_levels($LBM);
        $goals    = calculate_goals($levels[$request['activity-level']]);
        $calories = calculate_calories($goals[$request['goal']]);

        $Hume = ['calories' => $calories];
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
