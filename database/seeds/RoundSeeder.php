<?php

use Illuminate\Database\Seeder;

class RoundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rounds')->insert([
            'tournament_id' => 1,
            'round_number' => 1,
            'round_name' => 'Round 1',
        ]);
        DB::table('rounds')->insert([
            'tournament_id' => 1,
            'round_number' => 2,
            'round_name' => 'Round 2',
        ]);
        DB::table('rounds')->insert([
            'tournament_id' => 1,
            'round_number' => 3,
            'round_name' => 'Round 3',
        ]);
        DB::table('rounds')->insert([
            'tournament_id' => 1,
            'round_number' => 4,
            'round_name' => 'Round 4',
        ]);
    }
}
