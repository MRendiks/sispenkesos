<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelurahan')->insert([
            'id_kelurahan' => '11',
            'nama_kelurahan' => 'Ambarketawang',
        ]);
        DB::table('kelurahan')->insert([
            'id_kelurahan' => '12',
            'nama_kelurahan' => 'Balecatur',
        ]);
        DB::table('kelurahan')->insert([
            'id_kelurahan' => '13',
            'nama_kelurahan' => 'Bayuraden',
        ]);
        DB::table('kelurahan')->insert([
            'id_kelurahan' => '14',
            'nama_kelurahan' => 'Nogotirto',
        ]);
        DB::table('kelurahan')->insert([
            'id_kelurahan' => '15',
            'nama_kelurahan' => 'Trihanggo',
        ]);
        DB::table('kelurahan')->insert([
            'id_kelurahan' => '16',
            'nama_kelurahan' => 'Sidoagung',
        ]);
        DB::table('kelurahan')->insert([
            'id_kelurahan' => '17',
            'nama_kelurahan' => 'Sidoarum',
        ]);
        DB::table('kelurahan')->insert([
            'id_kelurahan' => '18',
            'nama_kelurahan' => 'Sidokarto',
        ]);
        DB::table('kelurahan')->insert([
            'id_kelurahan' => '19',
            'nama_kelurahan' => 'Sidoluhur',
        ]);
        DB::table('kelurahan')->insert([
            'id_kelurahan' => '20',
            'nama_kelurahan' => 'Sidomulyo',
        ]);
        DB::table('kelurahan')->insert([
            'id_kelurahan' => '21',
            'nama_kelurahan' => 'Sidorejo',
        ]);
        DB::table('kelurahan')->insert([
            'id_kelurahan' => '22',
            'nama_kelurahan' => 'Sumberagung',
        ]);
        DB::table('kelurahan')->insert([
            'id_kelurahan' => '23',
            'nama_kelurahan' => 'Sumberarum',
        ]);
        DB::table('kelurahan')->insert([
            'id_kelurahan' => '24',
            'nama_kelurahan' => 'Ambarketawang',
        ]);
    }
}
