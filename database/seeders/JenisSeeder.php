<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_ppks')->insert([
            
            'nama_jenis' => 'Anak Balita Terlantar'
        ]);
        DB::table('jenis_ppks')->insert([
            
            'nama_jenis' => 'Anak Terlantar'
        ]);
        DB::table('jenis_ppks')->insert([
            
            'nama_jenis' => 'Anak Jalanan'
        ]);
        DB::table('jenis_ppks')->insert([
            
            'nama_jenis' => 'Anak Dengan Kedisabilitasan'
        ]);
        DB::table('jenis_ppks')->insert([
            
            'nama_jenis' => 'Lanjut Usia Terlantar'
        ]);
        DB::table('jenis_ppks')->insert([
            
            'nama_jenis' => 'Penyandang Disabilitas'
        ]);
        DB::table('jenis_ppks')->insert([
            
            'nama_jenis' => 'Tuna Susila'
        ]);
        DB::table('jenis_ppks')->insert([
            
            'nama_jenis' => 'Gelandangan'
        ]);
        DB::table('jenis_ppks')->insert([
            
            'nama_jenis' => 'Pemulung'
        ]);
        DB::table('jenis_ppks')->insert([
            
            'nama_jenis' => 'Korban Penyalahgunaan'
        ]);
        DB::table('jenis_ppks')->insert([
            
            'nama_jenis' => 'Korban Tindak Kekerasan'
        ]);
        DB::table('jenis_ppks')->insert([
            
            'nama_jenis' => 'Pekerja Migran Bermasalah Sosial'
        ]);
        DB::table('jenis_ppks')->insert([
            
            'nama_jenis' => 'Keluarga Bermasalah Sosial Psikologis'
        ]);
        DB::table('jenis_ppks')->insert([
            
            'nama_jenis' => 'Perempuan Rawan Sosial Ekonomi'
        ]);
        DB::table('jenis_ppks')->insert([
            
            'nama_jenis' => 'Anak Korban Tindak Kekerasan'
        ]);
        DB::table('jenis_ppks')->insert([
            
            'nama_jenis' => 'Bekas Warga Binaan Lembaga Pemasyarakatan'
        ]);
    }
}
