<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rounds = Round::all();
        return $rounds;
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
            'round_number.required' => 'Round number is required.',
            'round_name.required' => 'Round name is required.',
        ];

        $validator = Validator::make($request->all(), [
            'round_number' => 'required',
            'round_name' => 'required',
        ], $messages);

        if($validator->fails()){
            $messages = $validator->messages();
            return array('errors'=>$messages);
        }

        $current_tournament_id = 0; // probs get this from session

        $round = new Round;
        $round->tournament_id = $current_tournament_id;
        $round->round_number = $request->input('round_number');
        $round->round_name = $request->input('round_name');
        $round->save();

        return $round;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $round = Rounds::find($id)->first();
        return $round;
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
            'round_number.required' => 'Round number is required.',
            'round_name.required' => 'Round name is required.',
        ];

        $validator = Validator::make($request->all(), [
            'round_number' => 'required',
            'round_name' => 'required',
        ], $messages);

        if($validator->fails()){
            $messages = $validator->messages();
            return array('errors'=>$messages);
        }

        $current_tournament_id = 0; // probs get this from session

        $round = Round::find($id)->first();
        $round->tournament_id = $current_tournament_id;
        $round->round_number = $request->input('round_number');
        $round->round_name = $request->input('round_name');
        $round->save();

        return $round;
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
