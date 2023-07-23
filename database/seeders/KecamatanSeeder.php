<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kecamatan')->insert([
            'id_kecamatan' => '1',
            'nama_kecamatan' => 'Gamping',
        ]);
        DB::table('kecamatan')->insert([
            'id_kecamatan' => '2',
            'nama_kecamatan' => 'Godean',
        ]);
        DB::table('kecamatan')->insert([
            'id_kecamatan' => '3',
            'nama_kecamatan' => 'Moyudan',
        ]);
        DB::table('kecamatan')->insert([
            'id_kecamatan' => '4',
            'nama_kecamatan' => 'Minggir',
        ]);
        DB::table('kecamatan')->insert([
            'id_kecamatan' => '5',
            'nama_kecamatan' => 'Sayegan',
        ]);
        DB::table('kecamatan')->insert([
            'id_kecamatan' => '6',
            'nama_kecamatan' => 'Mlati',
        ]);
        DB::table('kecamatan')->insert([
            'id_kecamatan' => '7',
            'nama_kecamatan' => 'Depok',
        ]);
        DB::table('kecamatan')->insert([
            'id_kecamatan' => '8',
            'nama_kecamatan' => 'Berbah',
        ]);
        DB::table('kecamatan')->insert([
            'id_kecamatan' => '9',
            'nama_kecamatan' => 'Prambanan',
        ]);
        DB::table('kecamatan')->insert([
            'id_kecamatan' => '10',
            'nama_kecamatan' => 'Kalasan',
        ]);
        DB::table('kecamatan')->insert([
            'id_kecamatan' => '11',
            'nama_kecamatan' => 'Ngemplak',
        ]);
        DB::table('kecamatan')->insert([
            'id_kecamatan' => '12',
            'nama_kecamatan' => 'Ngaglik',
        ]);
        DB::table('kecamatan')->insert([
            'id_kecamatan' => '13',
            'nama_kecamatan' => 'Sleman',
        ]);
        DB::table('kecamatan')->insert([
            'id_kecamatan' => '14',
            'nama_kecamatan' => 'Tempel',
        ]);
        DB::table('kecamatan')->insert([
            'id_kecamatan' => '15',
            'nama_kecamatan' => 'Turi',
        ]);
        DB::table('kecamatan')->insert([
            'id_kecamatan' => '16',
            'nama_kecamatan' => 'Pakem',
        ]);
        DB::table('kecamatan')->insert([
            'id_kecamatan' => '17',
            'nama_kecamatan' => 'Cangkringan',
        ]);
    }
}
