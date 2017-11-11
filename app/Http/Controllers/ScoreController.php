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
        if(!$score){
            abort(404,'Score entry not found');
        }
        return $score;
    }

    public function showByTeamRound($team_id,$round_id)
    {
        $score = Score::where('team_id',$team_id)->where('round_id',$round_id)->first();
        if(!$score){
            abort(404,'Score entry not found');
        }
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

        $score = Score::find($id)->first();
        if(!$score){
            abort(404,'Score entry not found');
        }
        $score->team_id = $request->input('team_id');
        $score->round_id = $request->input('round_id');
        $score->scoresheet = $request->input('scoresheet');
        $score->round_total = $round_total;
        $score->save();

        return $score;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $score = Score::find($id)->first();
        if(!$score){
            abort(404,'Score entry not found');
        }
        $score->delete();
        return $score;
    }
}
