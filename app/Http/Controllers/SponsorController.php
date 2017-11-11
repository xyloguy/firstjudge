<?php

namespace App\Http\Controllers;

use App\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsors = Sponsor::all();
        return $sponsors;
    }

    public function tournament_sponsors($tournament_id)
    {
        $sponsors = Sponsor::where('tournament_id',$tournament_id)->get();
        return $sponsors;
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
            'rank.required' => 'Please select a sponsor rank.',
            'sponsor_image.required' => 'Please choose a sponsor image.',
            'sponsor_image.file' => 'Sponsor image must be a file.',
            'sponsor_image.mimes' => 'Unsupported image format. Sponsor logo must be a jpg, png, or gif.',
            'duration.required' => 'Please input a duration for the sponsor image to show.',
        ];

        $validator = Validator::make($request->all(), [
            'rank' => 'required',
            'sponsor_image' => 'required|file|mimes:jpeg,jpg,png,gif',
            'duration' => 'required',
        ], $messages);

        if($validator->fails()){
            $messages = $validator->messages();
            return array('errors'=>$messages);
        }

        $current_tournament_id = 1; // probs get this from session

        $sponsor = new Sponsor;
        $sponsor->tournament_id = $current_tournament_id;
        $sponsor->rank = $request->input('rank');
        // sponsor image upload logic
        $filename = 'T'.$current_tournament_id.'-'.bin2hex(openssl_random_pseudo_bytes(2)).'-'.$request->sponsor_image->getClientOriginalName();
        $sponsor->sponsor_image = $filename;
        $request->sponsor_image->storeAs('public/uploads', $filename);
        // end sponsor image upload logic
        $sponsor->duration = $request->input('duration');
        $sponsor->save();

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
        //
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
        //
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
