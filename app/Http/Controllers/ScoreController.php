<?php

namespace App\Http\Controllers;

use App\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scores = Score::all();
        return $scores;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate or something

        $round_total = 0; // calculate from score sheet - probs in separate class

        $team = new Score;
        $team->team_id = $request->input('team_id');
        $team->round_id = $request->input('round_id');
        $team->scoresheet = $request->input('scoresheet');
        $team->round_total = $round_total;
        $team->save();

        return $team;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $score = Score::find($id)->first();
        return $score;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate or something

        $round_total = 0; // calculate from score sheet - probs in separate class

        $team = Score::find($id)->first();
        $team->team_id = $request->input('team_id');
        $team->round_id = $request->input('round_id');
        $team->scoresheet = $request->input('scoresheet');
        $team->round_total = $round_total;
        $team->save();

        return $team;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
