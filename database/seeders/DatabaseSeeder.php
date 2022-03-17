<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            'name' => 'room 1',
        ]);
        DB::table('rooms')->insert([
            'name' => 'room 2',
        ]);
        DB::table('rooms')->insert([
            'name' => 'room 3',
        ]);
        DB::table('rooms')->insert([
            'name' => 'room 4',
        ]);
        DB::table('rooms')->insert([
            'name' => 'room 5 LUX',
        ]);
        DB::table('rooms')->insert([
            'name' => 'room 6 Sauna',
        ]);
    }
}
