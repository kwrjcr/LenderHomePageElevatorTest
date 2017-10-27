<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FloorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('floor')->delete();

        DB::table('floor')->insert(
            [
                [
                    'floor' => 1,
                    'status' => 'working',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'floor' => 2,
                    'status' => 'maintenance',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'floor' => 3,
                    'status' => 'working',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'floor' => 4,
                    'status' => 'maintenance',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'floor' => 5,
                    'status' => 'working',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'floor' => 6,
                    'status' => 'working',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'floor' => 7,
                    'status' => 'working',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            ]
        );
    }
}
