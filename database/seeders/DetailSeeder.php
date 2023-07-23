<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_jenis')->insert([
            'nama_detail_jenis' => 'Tumbuh Tangan',
        ]);
        DB::table('detail_jenis')->insert([
            'nama_detail_jenis' => 'Tumbuh Kaki',
        ]);
        DB::table('detail_jenis')->insert([
            'nama_detail_jenis' => 'Tumbuh Punggung',
        ]);
        DB::table('detail_jenis')->insert([
            'nama_detail_jenis' => 'Tubuh Kerdil',
        ]);
        DB::table('detail_jenis')->insert([
            'nama_detail_jenis' => 'Lumpuh Layu',
        ]);
        DB::table('detail_jenis')->insert([
            'nama_detail_jenis' => 'Paraplegi',
        ]);
        DB::table('detail_jenis')->insert([
            'nama_detail_jenis' => 'Cerebal Palsy',
        ]);
        DB::table('detail_jenis')->insert([
            'nama_detail_jenis' => 'Eks Kronis',
        ]);
        DB::table('detail_jenis')->insert([
            'nama_detail_jenis' => 'Lambar Belajar',
        ]);
        DB::table('detail_jenis')->insert([
            'nama_detail_jenis' => 'Disabilitas Grahita',
        ]);
        DB::table('detail_jenis')->insert([
            'nama_detail_jenis' => 'Down Sysdrom',
        ]);
        DB::table('detail_jenis')->insert([
            'nama_detail_jenis' => 'Psikososial',
        ]);
        DB::table('detail_jenis')->insert([
            'nama_detail_jenis' => 'Autis',
        ]);
        DB::table('detail_jenis')->insert([
            'nama_detail_jenis' => 'Hiperaktif',
        ]);
        DB::table('detail_jenis')->insert([
            'nama_detail_jenis' => 'Netral',
        ]);
        DB::table('detail_jenis')->insert([
            'nama_detail_jenis' => 'Tuna Rungu',
        ]);
        DB::table('detail_jenis')->insert([
            'nama_detail_jenis' => 'Tuna Wicara',
        ]);
    }
}
