<?php

use Illuminate\Database\Seeder;

class TournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tournaments')->insert([
            'id' => 1,
            'title' => 'Hydro Dynamics',
            'tournament_date' => '2017-11-11 07:00:00',
            'scoresheet' => 'HydroDynamics',
            'timer_duration' => 180,
            'timer_pre_duration' => 60,
            'timer_post_duration' => 0
        ]);
    }
}
