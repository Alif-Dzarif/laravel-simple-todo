<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void;
     */
    public function run(): void
    {
        $tasks = [
            ['name' => 'Eat'],
            ['name' => 'Sleep'],
            ['name' => 'Code'],
        ];

        DB::table('todo')->insert($tasks);
    }
}
