<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('loot_options')->insert([
            [
                'name' => 'Cherry',
                'initial' => 'C',
                'points' => 10,
            ],
            [
                'name' => 'Lemon',
                'initial' => 'L',
                'points' => 20,
            ],
            [
                'name' => 'Orange',
                'initial' => 'O',
                'points' => 30,
            ],
            [
                'name' => 'Watermelon',
                'initial' => 'W',
                'points' => 40,
            ],
        ]);
    }
}
