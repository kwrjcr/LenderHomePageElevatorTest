<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ElevatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('elevators')->delete();

        DB::table('elevators')->insert(
            [
                [
                    'signal' => 'door close',
                    'direction' => 'stand',
                    'currentFloor' => '1',
                    'destination' => '0',
                    'active' => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'signal' => 'door close',
                    'direction' => 'down',
                    'currentFloor' => '6',
                    'destination' => '3',
                    'active' => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            ]
        );
    }
}
