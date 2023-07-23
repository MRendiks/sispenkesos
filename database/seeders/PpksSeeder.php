<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PpksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ppks')->insert([
            'id' => '1',
            'nama' => 'TSeto Widodo',
            'nik' => '404137020092001',
            'jenis_kelamin' => 'L',
            'tanggal_lahir' => '2001/10/06',
            'pendidikan' => 'SMA',
            'id_kecamatan' => 2,
            'id_kelurahan' => 11,
            'alamat' => 'sleman',
            'id_jenis_ppks' => 1,
            'id_detail_ppks' => 2,
            'jaminan_kesehatan' =>'JAMKESOS',
            'pekerjaan' => 'guru',
            'keterangann' => 'tidak ada',
            'id_foto' => 1
        ]);
    }
}
