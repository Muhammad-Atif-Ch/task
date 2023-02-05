<?php

namespace Database\Seeders;

use App\Models\Meeting;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::insert([
            [
                'name' => 'a',
            ],
            [
                'name' => 'b',
            ],
            [
                'name' => 'c',
            ]
        ]);

        Meeting::insert([
            [
                'user_id' => 1,
                'start_time' => '09:00',
                'end_time' => '11:30',
            ],
            [
                'user_id' => 1,
                'start_time' => '13:30',
                'end_time' => '16:00',
            ],
            [
                'user_id' => 1,
                'start_time' => '16:00',
                'end_time' => '17:30',
            ],
            [
                'user_id' => 1,
                'start_time' => '17:45',
                'end_time' => '19:00',
            ],




            [
                'user_id' => 2,
                'start_time' => '09:15',
                'end_time' => '12:00',
            ],
            [
                'user_id' => 2,
                'start_time' => '14:00',
                'end_time' => '16:30',
            ],
            [
                'user_id' => 2,
                'start_time' => '17:00',
                'end_time' => '17:30',
            ],


            [
                'user_id' => 3,
                'start_time' => '11:30',
                'end_time' => '12:15',
            ],
            [
                'user_id' => 3,
                'start_time' => '15:00',
                'end_time' => '16:30',
            ],
            [
                'user_id' => 3,
                'start_time' => '17:45',
                'end_time' => '19:00',
            ],
        ]);
    }
}
