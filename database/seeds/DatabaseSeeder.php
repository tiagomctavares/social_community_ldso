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
        factory(App\VotingLocation::class)->create([
            'district' => 'Porto',
            'county' => 'Porto',
            'parish' => 'Paranhos'
        ]);

        factory(App\Municipality::class, 5)->create();

        factory(App\User::class, 1)->create();
    }
}
