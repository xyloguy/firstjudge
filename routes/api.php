<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::resource('tournament', 'TournamentController');
Route::resource('team', 'TeamController');
Route::resource('score', 'ScoreController');
Route::get('score/byteamround/{team]/{round}', 'ScoreController@ShowByTeamRound');
Route::resource('sponsor', 'SponsorController');

