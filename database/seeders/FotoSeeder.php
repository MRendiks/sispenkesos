<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foto')->insert([
            'foto_ppks' => 'foto_ppks2613.jpeg',
            'foto_luar' => 'foto_luar5645.png',
            'foto_dalam' => 'foto_dalam4839.jpg',
        ]);
    }
}
