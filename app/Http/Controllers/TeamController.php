<?php

namespace App\Http\Controllers;

use App\Team;
use Auth;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tournaments = Team::all();
        return $tournaments;
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
        // Validate the submission
        $messages = [
            'team_number.required' => 'Team number is required.',
            'team_name.required' => 'Team name is required.',
        ];

        $validator = Validator::make($request->all(), [
            'team_number' => 'required',
            'team_name' => 'required',
        ], $messages);

        if($validator->fails()){
            $messages = $validator->messages();
            return array('errors'=>$messages);
        }

        $current_tournament_id = 1; // probs get this from session

        $team = new Team;
        $team->tournament_id = $current_tournament_id;
        $team->team_number = $request->input('team_number');
        $team->team_name = $request->input('team_name');
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
        $team = Team::find($id)->first();
        if(!$team){
            abort(404,'Team not found');
        }
        return $team;
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
        // Validate the submission
        $messages = [
            'team_number.required' => 'Team number is required.',
            'team_name.required' => 'Team name is required.',
        ];

        $validator = Validator::make($request->all(), [
            'team_number' => 'required',
            'team_name' => 'required',
        ], $messages);

        if($validator->fails()){
            $messages = $validator->messages();
            return array('errors'=>$messages);
        }

        $current_tournament_id = 1; // probs get this from session

        $team = Team::find($id)->first();
        $team->tournament_id = $current_tournament_id;
        $team->team_number = $request->input('team_number');
        $team->team_name = $request->input('team_name');
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
        $team = Team::find($id)->first();
        if(!$team){
            abort(404,'Team not found');
        }
        $team->delete();
        return $team;
    }
}
