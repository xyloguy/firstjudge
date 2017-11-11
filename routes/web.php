<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/timer', function () {
    return view('common-timer');
});

Route::get('/admin/score', function () {
   return view('admin/scoresheet', [
       'scoresheet' => new \App\HydroDynamics\HydroDynamicsScoresheet()
   ]);
});
Route::get('/admin/results', 'TeamController@results');
