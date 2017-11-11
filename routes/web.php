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

Route::get('/admin', function () {
    return redirect('admin/score');
});

Route::get('/admin/score', function () {
   return view('admin/scoresheet', [
       'scoresheet' => new \App\HydroDynamics\HydroDynamicsScoresheet(),
       'teams' => \App\Team::all()->sort(function($a,$b){
           return strnatcmp($a->team_number,$b->team_number);
       }),
       'rounds' => \App\Round::orderBy('round_number')->get(),
   ]);
});
Route::post('/admin/score', 'ScoreController@store');
Route::get('/admin/results', 'TeamController@results');

Route::get('/admin/timer', function() {
    return view('admin/timer', [
        'tournament' => \App\Tournament::first()
    ]);
});
Route::put('/admin/tournaments/{id}', 'TournamentController@update');
