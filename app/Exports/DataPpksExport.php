<?php

namespace App\Exports;

use App\Models\Ppks;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataPpksExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {        
        $ppks = Ppks::select('ppks.id', 'ppks.nama', 'ppks.nik', 'ppks.jenis_kelamin' ,'ppks.tanggal_lahir', 'ppks.pendidikan' ,'kecamatan.nama_kecamatan', 'kelurahan.nama_kelurahan','ppks.alamat','jenis_ppks.nama_jenis', DB::raw('IF(ppks.id_jenis_ppks IN (4, 6), detail_jenis.nama_detail_jenis, "-") AS nama_detail_jenis'),'ppks.jaminan_kesehatan', 'ppks.pekerjaan')
        ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
        ->join('kelurahan', 'ppks.id_kelurahan', '=', 'kelurahan.id_kelurahan')
        ->join('detail_jenis', 'ppks.id_detail_ppks', '=', 'detail_jenis.id_detail_ppks')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->get();

        return $ppks;
    }

    public function headings():array{
        return [
            'id',
            'Nama',
            'NIK',
            'Jenis Kelamin',
            'Tanggal Lahir',
            'Pendidikan',
            'Kecamatan',
            'Kelurahan', 
            'Alamat',
            'Jenis PPKS',
            'Detail PPKS',
            'Jaminan Kesehatan',
            'Pekerjaan'
        ];
    }
}
