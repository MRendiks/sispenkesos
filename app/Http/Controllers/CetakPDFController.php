<?php

namespace App\Http\Controllers;

use App\Models\Ppks;
use Illuminate\Http\Request;

class CetakPDFController extends Controller
{
    public function cetak_laporan()
    {
        $ppks = Ppks::select('ppks.id', 'ppks.nama', 'ppks.nik', 'ppks.jenis_kelamin', 'kecamatan.id_kecamatan', 'kelurahan.id_kelurahan' ,'ppks.tanggal_lahir', 'ppks.pendidikan' ,'kecamatan.nama_kecamatan', 'jenis_ppks.nama_jenis', 'ppks.jaminan_kesehatan', 'ppks.pekerjaan', 'ppks.alamat', 'jenis_ppks.jenis_ppks_id', 'detail_jenis.id_detail_ppks', 'foto.foto_ppks', 'foto.foto_luar', 'detail_jenis.nama_detail_jenis' ,'foto.foto_dalam', 'ppks.keterangann', 'ppks.status')
        ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
        ->join('kelurahan', 'ppks.id_kelurahan', '=', 'kelurahan.id_kelurahan')
        ->join('detail_jenis', 'ppks.id_detail_ppks', '=', 'detail_jenis.id_detail_ppks')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->join('foto', 'ppks.id_foto', '=', 'foto.id_foto')
        ->get();
        return view('ppks/laporan_ppks', compact('ppks'));
    }
}
