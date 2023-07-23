<?php

namespace App\Http\Controllers;

use App\Models\DetailJenis;
use App\Models\JenisPpk;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $jenis = JenisPpk::all();
        $detail = DetailJenis::all();
        $presentase = DB::table('ppks')
        ->selectRaw('jenis_ppks.nama_jenis, COUNT(ppks.id_jenis_ppks) as banyak_data')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->groupBy('jenis_ppks.nama_jenis')
        ->get();

        $presentase2 = DB::table('ppks')
        ->selectRaw(' kecamatan.nama_kecamatan, COUNT(ppks.id_kecamatan) as banyak_data')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
        ->groupBy('kecamatan.nama_kecamatan')
        ->get();

        return view('dashboard', compact('presentase', 'kecamatan', 'kelurahan', 'jenis', 'detail', 'presentase2'));
    }
}
