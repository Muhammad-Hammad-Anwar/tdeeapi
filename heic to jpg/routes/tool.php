<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tools API Route
|--------------------------------------------------------------------------
*/
Route::controller(ToolSetupController::class)->prefix('tool')->group(function(){
	/*
	|--------------------------------------------------------------------------
	| Wolframalpha API Route
	|--------------------------------------------------------------------------
	*/
	Route::post('equation-balancer', 	'equationBalancer'	)->name('equation-balancer'	 );
	Route::post('oxidation-number', 	'oxidationNumber'	)->name('oxidation-number'	 );
	Route::post('percent-composition',	'percentComposition')->name('percent-composition');
	Route::post('redox-reaction', 		'redoxReaction'		)->name('redox-reaction'	 );
	Route::post('percent-yield',	 	'percentYield'		)->name('percent-yield'		 );
	Route::post('theoretical-yield', 	'theoreticalYield'	)->name('theoretical-yield'	 );
	Route::post('molecular-weight', 	'molecularWeight'	)->name('molecular-weight'	 );
	Route::post('titration', 			'titration'			)->name('titration'			 );
	Route::post('atomic-mass',  		'atomicMass' 		)->name('atomic-mass'	 	 );
    Route::post('index',  		'index' 		)->name('calculate'	 	 );
});