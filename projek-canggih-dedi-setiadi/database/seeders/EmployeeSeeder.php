<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            [
                'firstname' => 'Canggih',
                'lastname' => 'Dedi',
                'email' => 'canggih.dedi@gmail.com',
                'age' => 19,
                'position_id' => 1
            ],
            [
                'firstname' => 'Shaquile',
                'lastname' => 'Rayhan',
                'email' => 'shaquile.rayhan@gmail.com',
                'age' => 20,
                'position_id' => 2
            ],
            [
                'firstname' => 'Firman',
                'lastname' => 'Bayu',
                'email' => 'firman.bayu@gmail.com',
                'age' => 21,
                'position_id' => 3
            ],
        ]);
    }
}
