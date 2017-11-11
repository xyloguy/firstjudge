<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(SponsorSeeder::class);
        $this->call(RoundSeeder::class);
        $this->call(TournamentSeeder::class);
    }
}
