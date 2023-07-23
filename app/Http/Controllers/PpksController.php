<?php

namespace App\Http\Controllers;

use App\Exports\DataPpksExport;
use App\Models\DetailJenis;
use App\Models\Foto;
use App\Models\JenisPpk;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Ppks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

use function PHPUnit\Framework\isNull;

class PpksController extends Controller
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

        $ppks = Ppks::select('ppks.id', 'ppks.nama', 'ppks.nik', 'ppks.jenis_kelamin', 'kecamatan.id_kecamatan', 'kelurahan.id_kelurahan' ,'ppks.tanggal_lahir', 'ppks.pendidikan' ,'kecamatan.nama_kecamatan', 'jenis_ppks.nama_jenis', 'ppks.jaminan_kesehatan', 'ppks.pekerjaan', 'ppks.alamat', 'kelurahan.nama_kelurahan', 'jenis_ppks.nama_jenis', DB::raw('IF(ppks.id_jenis_ppks IN (4, 6), detail_jenis.nama_detail_jenis, "-") AS nama_detail_jenis') ,'jenis_ppks.jenis_ppks_id', 'detail_jenis.id_detail_ppks', 'foto.foto_ppks', 'foto.foto_luar', 'foto.foto_dalam', 'ppks.keterangann', 'ppks.status')
        ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
        ->join('kelurahan', 'ppks.id_kelurahan', '=', 'kelurahan.id_kelurahan')
        ->join('detail_jenis', 'ppks.id_detail_ppks', '=', 'detail_jenis.id_detail_ppks')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->join('foto', 'ppks.id_foto', '=', 'foto.id_foto')
        ->get();

        $presentase2 = DB::table('ppks')
        ->selectRaw(' kecamatan.nama_kecamatan, COUNT(ppks.id_kecamatan) as banyak_data')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
        ->groupBy('kecamatan.nama_kecamatan')
        ->get();

        $page = "Data PPKS";
        $grafik1 = "Grafik Piechart Data PPKS Seluruh Kecamatan";
        $grafik2 = "Grafik Piechart Data PPKS Seluruh Kecamatan";
        $tabel = "Tabel Data PPKS";
        $title = "Data PPKS";
        $title2 = "Data PPKS Per Kacamatan";
        
        $id = 1;
        return view('ppks/data-ppks', compact('ppks', 'kelurahan', 'jenis', 'detail' , 'kecamatan', 'presentase', 'page', 'grafik1', 'grafik2', 'tabel', 'presentase2', 'title', 'id', 'title2'));
    }

    public function data_disabilitas()
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $jenis = JenisPpk::all();
        $detail = DetailJenis::all();
        $ppks = Ppks::select('ppks.id', 'ppks.nama', 'ppks.nik', 'ppks.jenis_kelamin', 'kecamatan.id_kecamatan', 'kelurahan.id_kelurahan' ,'ppks.tanggal_lahir', 'ppks.pendidikan' ,'kecamatan.nama_kecamatan', 'jenis_ppks.nama_jenis', 'ppks.jaminan_kesehatan', 'ppks.pekerjaan', 'ppks.alamat', 'kelurahan.nama_kelurahan' ,'jenis_ppks.jenis_ppks_id', 'detail_jenis.id_detail_ppks', DB::raw('IF(ppks.id_jenis_ppks IN (4, 6), detail_jenis.nama_detail_jenis, "-") AS nama_detail_jenis'),'foto.foto_ppks', 'foto.foto_luar', 'foto.foto_dalam', 'ppks.keterangann', 'ppks.status')
        ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
        ->join('kelurahan', 'ppks.id_kelurahan', '=', 'kelurahan.id_kelurahan')
        ->join('detail_jenis', 'ppks.id_detail_ppks', '=', 'detail_jenis.id_detail_ppks')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->join('foto', 'ppks.id_foto', '=', 'foto.id_foto')
        ->where('ppks.id_jenis_ppks', '=', 6)
        ->get();

        $presentase = DB::table('ppks')
        ->selectRaw('jenis_ppks.nama_jenis, COUNT(ppks.id_jenis_ppks) as banyak_data')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->where('ppks.id_jenis_ppks', '=', 6)
        ->groupBy('jenis_ppks.nama_jenis')
        ->get();

        $presentase2 = DB::table('ppks')
        ->selectRaw(' kecamatan.nama_kecamatan, COUNT(ppks.id_kecamatan) as banyak_data')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
        ->where('ppks.id_jenis_ppks', '=', 6)
        ->groupBy('kecamatan.nama_kecamatan')
        ->get();

        $page = "Data Disabilitas";
        $grafik1 = "Piechart Data Disabilitas Seluruh Kecamatan";
        $grafik2 = "Piechart Data Disabilitas Seluruh Kecamatan";
        $tabel = "Tabel Data Disabilitas";
        $id = 6;
        $title = "Data Disabilitas";
        return view('ppks/data-ppks', compact('ppks', 'kelurahan', 'jenis', 'detail' , 'kecamatan', 'presentase', 'page', 'grafik1', 'grafik2', 'tabel', 'id', 'presentase2', 'title'));
    }


    public function data_kedisabilitas()
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $jenis = JenisPpk::all();
        $detail = DetailJenis::all();
        $ppks = Ppks::select('ppks.id', 'ppks.nama', 'ppks.nik', 'ppks.jenis_kelamin', 'kecamatan.id_kecamatan', 'kelurahan.id_kelurahan' ,'ppks.tanggal_lahir', 'ppks.pendidikan' ,'kecamatan.nama_kecamatan', 'jenis_ppks.nama_jenis', 'ppks.jaminan_kesehatan', 'ppks.pekerjaan', 'ppks.alamat', 'kelurahan.nama_kelurahan','jenis_ppks.jenis_ppks_id', 'detail_jenis.id_detail_ppks', DB::raw('IF(ppks.id_jenis_ppks IN (4, 6), detail_jenis.nama_detail_jenis, "-") AS nama_detail_jenis') , 'foto.foto_ppks', 'foto.foto_luar', 'foto.foto_dalam', 'ppks.keterangann', 'ppks.status')
        ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
        ->join('kelurahan', 'ppks.id_kelurahan', '=', 'kelurahan.id_kelurahan')
        ->join('detail_jenis', 'ppks.id_detail_ppks', '=', 'detail_jenis.id_detail_ppks')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->join('foto', 'ppks.id_foto', '=', 'foto.id_foto')
        ->where('ppks.id_jenis_ppks', '=', 4)
        ->get();

        $presentase = DB::table('ppks')
        ->selectRaw('jenis_ppks.nama_jenis, COUNT(ppks.id_jenis_ppks) as banyak_data')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->where('ppks.id_jenis_ppks', '=', 4)
        ->groupBy('jenis_ppks.nama_jenis')
        ->get();

        $presentase2 = DB::table('ppks')
        ->selectRaw(' kecamatan.nama_kecamatan, COUNT(ppks.id_kecamatan) as banyak_data')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
        ->where('ppks.id_jenis_ppks', '=', 4)
        ->groupBy('kecamatan.nama_kecamatan')
        ->get();

        $page = "Data Kedisabilitasan";
        $grafik1 = "Piechart Data Kedisabilitasan Seluruh Kecamatan";
        $grafik2 = "Piechart Data Kedisabilitasan Seluruh Kecamatan";
        $tabel = "Tabel Data Kedisabilitasan";
        $id = 4;
        $title = "Data Kedisabilitasan";
        return view('ppks/data-ppks', compact('ppks', 'kelurahan', 'jenis', 'detail' , 'kecamatan', 'presentase', 'page', 'grafik1', 'grafik2', 'tabel', 'id', 'presentase2', 'title'));
    }

    public function input_data()
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $jenis = JenisPpk::all();
        $detail = DetailJenis::all();

        return view('forminput', compact('kecamatan', 'kelurahan', 'jenis', 'detail'));
    }
    
    public function store_ppks(Request $request)
    {
        $ppks = new Ppks;
        $foto = new Foto;

        # Validasi Data
        $rules = [
            'nama' => 'required|string|max:255',
            'nik' => 'required|max:16',
            'jk' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan_terakhir' => 'required',
            'kecamatan' => 'required',
        ];

        $pesan = [
            'required' => 'Kolom ini Perlu Diisikan.',
            'string' => 'Kolom :attribute Harus Huruf',
            'max' => 'Kolom :attribute tidak boleh melebihi :max huruf',

        ];

        $validator = Validator::make($request->all(), $rules, $pesan);

        if ($validator->fails()) {
            $massage = "Harap Isi Data dengan Benar";
            return redirect()->back()->withErrors($validator)->withInput()->with('failed', $massage);
        }elseif ($request->hasFile('foto_ppks') && $request->hasFile('foto_luar') && $request->hasFile('foto_dalam')) {

            # proses foto ppks
            $file1= $request->file('foto_ppks');
            $ext = $request->file('foto_ppks')->getClientOriginalExtension();
            $filename1 = $request->nama_pengaju . 'foto_ppks' . rand(1, 10000) . '.' . $ext;
            $file1->move('foto_upload/', $filename1);

            # proses foto Luar
            $file2= $request->file('foto_luar');
            $ext = $request->file('foto_luar')->getClientOriginalExtension();
            $filename2 = $request->nama_pengaju . 'foto_luar' . rand(1, 10000) . '.' . $ext;
            $file2->move('foto_upload/', $filename2);

            #proses foto Dalam
            $file3= $request->file('foto_dalam');
            $ext = $request->file('foto_dalam')->getClientOriginalExtension();
            $filename3 = $request->nama_pengaju . 'foto_dalam' . rand(1, 10000) . '.' . $ext;
            $file3->move('foto_upload/', $filename3);


            # Simpan foto ke databse
            $foto->id_foto = $request->id_foto;
            $foto->foto_ppks = $filename1;
            $foto->foto_luar = $filename2;
            $foto->foto_dalam = $filename3;
            $foto->save();

            # Mencari id foto berdasarkan data foto yang di tambahkan ke table foto

            $record = Foto::where('foto_ppks', $filename1)->first();
            $id_foto = $record ? $record->id_foto : null;


            # Menginputkan data ke table ppks
            $ppks->nama = $request->nama;
            $ppks->nik = $request->nik;
            $ppks->jenis_kelamin = $request->jk;
            $ppks->tanggal_lahir = $request->tanggal_lahir;

            if ($request->pendidikan_terakhir == "Lainnya") {
                $ppks->pendidikan = $request->pendidikan_terakhir_2;
            }else{
                $ppks->pendidikan = $request->pendidikan_terakhir;
            }
            
            $ppks->id_kelurahan = $request->kelurahan;
            $ppks->id_kecamatan = $request->kecamatan;
            $ppks->alamat = $request->alamat;
            $ppks->id_jenis_ppks = $request->jenis_disabilitas;

            if ($request->has('ket_disabilitas')) {
                $ppks->id_detail_ppks = $request->ket_disabilitas;
            }else{
                $ppks->id_detail_ppks = 1;
            }

            if ($request->jamkes == "Jaminan Kesehatan Lainnya") {
                $ppks->jaminan_kesehatan = $request->jamkes2;
            }else{
                $ppks->jaminan_kesehatan = $request->jamkes;
            }

            if ($request->pekerjaan == "Lainnya") {
                $ppks->pekerjaan = $request->pekerjaan2;
            }else{
                $ppks->pekerjaan = $request->pekerjaan;
            }
            
            $ppks->keterangann = $request->keterangan;
            $ppks->id_foto = $id_foto;
            $ppks->save();
            $massage = "Data Berhasil Ditambahkan";
            return redirect()->route('data-ppks')->with('success', $massage);
        }
        else{

            $foto->id_foto = $request->id_foto;
            $foto->foto_ppks = "";
            $foto->foto_luar = "";
            $foto->foto_dalam = "";
            $foto->save();

            $data_foto = Foto::latest()->first();
            $id_foto = $data_foto->id_foto;
            

            # Menginputkan data ke table ppks
            $ppks->nama = $request->nama;
            $ppks->nik = $request->nik;
            $ppks->jenis_kelamin = $request->jk;
            $ppks->tanggal_lahir = $request->tanggal_lahir;

            if ($request->pendidikan_terakhir == "Lainnya") {
                $ppks->pendidikan = $request->pendidikan_terakhir_2;
            }else{
                $ppks->pendidikan = $request->pendidikan_terakhir;
            }

            $ppks->id_kelurahan = $request->kelurahan;
            $ppks->id_kecamatan = $request->kecamatan;
            $ppks->alamat = $request->alamat;
            $ppks->id_jenis_ppks = $request->jenis_disabilitas;

            if ($request->has('ket_disabilitas')) {
                $ppks->id_detail_ppks = $request->ket_disabilitas;
            }else{
                $ppks->id_detail_ppks = 1;
            }

            if ($request->jamkes == "Jaminan Kesehatan Lainnya") {
                $ppks->jaminan_kesehatan = $request->jamkes2;
            }else{
                $ppks->jaminan_kesehatan = $request->jamkes;
            }

            if ($request->pekerjaan == "Lainnya") {
                $ppks->pekerjaan = $request->pekerjaan2;
            }else{
                $ppks->pekerjaan = $request->pekerjaan;
            }

            $ppks->keterangann = $request->keterangan;
            $ppks->id_foto = $id_foto;
            $ppks->save();
            $massage = "Data Berhasil Ditambahkan. Akan tetapi, Harap mengisi Foto PPKS nanti";
            return redirect()->route('data-ppks')->with('success', $massage);
        }
    }

    public function update($id, Request $request)
    {
        $ppks = Ppks::find($id);
        $foto = new Foto;
        if ($request->hasFile('foto_ppks') && $request->hasFile('foto_luar') && $request->hasFile('foto_dalam')) {

            # proses foto ppks
            $file1= $request->file('foto_ppks');
            $ext = $request->file('foto_ppks')->getClientOriginalExtension();
            $filename1 = $request->nama_pengaju . 'foto_ppks' . rand(1, 10000) . '.' . $ext;
            $file1->move('foto_upload/', $filename1);

            # proses foto Luar
            $file2= $request->file('foto_luar');
            $ext = $request->file('foto_luar')->getClientOriginalExtension();
            $filename2 = $request->nama_pengaju . 'foto_luar' . rand(1, 10000) . '.' . $ext;
            $file2->move('foto_upload/', $filename2);

            #proses foto Dalam
            $file3= $request->file('foto_dalam');
            $ext = $request->file('foto_dalam')->getClientOriginalExtension();
            $filename3 = $request->nama_pengaju . 'foto_dalam' . rand(1, 10000) . '.' . $ext;
            $file3->move('foto_upload/', $filename3);


            # Simpan foto ke databse
            $foto->id_foto = $request->id_foto;
            $foto->foto_ppks = $filename1;
            $foto->foto_luar = $filename2;
            $foto->foto_dalam = $filename3;
            $foto->save();

            $record = Foto::where('foto_ppks', $filename1)->first();
            $id_foto = $record ? $record->id_foto : null;

            

            $ppks->nama = $request->nama;
            $ppks->nik = $request->nik;
            $ppks->jenis_kelamin = $request->jk;
            $ppks->tanggal_lahir = $request->tanggal_lahir;
            $ppks->pendidikan = $request->pendidikan_terakhir;
            $ppks->id_kelurahan = $request->kelurahan;
            $ppks->id_kecamatan = $request->kecamatan;
            $ppks->alamat = $request->alamat;
            $ppks->id_jenis_ppks = $request->jenis_disabilitas;

            if ($request->has('ket_disabilitas')) {
                $ppks->id_detail_ppks = $request->ket_disabilitas;
            }else{
                $ppks->id_detail_ppks = 1;
            }
            
            $ppks->jaminan_kesehatan = $request->jamkes;
            $ppks->pekerjaan = $request->pekerjaan;
            $ppks->keterangann = $request->keterangan;
            $ppks->id_foto = $id_foto;
            $ppks->save();
            $massage = "Data Berhasil Diupdate";
            return redirect()->route('data-ppks')->with('success', $massage);
        }
        else{
            $ppks->nama = $request->nama;
            $ppks->nik = $request->nik;
            $ppks->jenis_kelamin = $request->jk;
            $ppks->tanggal_lahir = $request->tanggal_lahir;
            $ppks->pendidikan = $request->pendidikan_terakhir;
            $ppks->id_kelurahan = $request->kelurahan;
            $ppks->id_kecamatan = $request->kecamatan;
            $ppks->alamat = $request->alamat;
            $ppks->id_jenis_ppks = $request->jenis_disabilitas;

            if ($request->has('ket_disabilitas')) {
                $ppks->id_detail_ppks = $request->ket_disabilitas;
            }else{
                $ppks->id_detail_ppks = 1;
            }
            
            $ppks->jaminan_kesehatan = $request->jamkes;
            $ppks->pekerjaan = $request->pekerjaan;
            $ppks->keterangann = $request->keterangan;
            $ppks->save();
            $massage = "Data Berhasil Diupdate Ditambahkan";
            return redirect()->route('data-ppks')->with('success', $massage);
        }
    }

    public function acc($id)
    {
        $ppks = Ppks::find($id);

        $ppks->status = "ACC";
        $ppks->save();

        $massage = "Data Berhasil Di ACC";
        return redirect()->route('data-ppks')->with('success', $massage);
    }

    public function filter_data_ppks($id1)
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $jenis = JenisPpk::all();
        $detail = DetailJenis::all();
        $ppks = Ppks::select('ppks.id', 'ppks.nama', 'ppks.nik', 'ppks.jenis_kelamin', 'kecamatan.id_kecamatan', 'kelurahan.id_kelurahan' ,'ppks.tanggal_lahir', 'ppks.pendidikan' ,'kecamatan.nama_kecamatan', 'jenis_ppks.nama_jenis', 'ppks.jaminan_kesehatan', 'ppks.pekerjaan', 'ppks.alamat', 'kelurahan.nama_kelurahan', 'jenis_ppks.nama_jenis', DB::raw('IF(ppks.id_jenis_ppks IN (4, 6), detail_jenis.nama_detail_jenis, "-") AS nama_detail_jenis') ,'jenis_ppks.jenis_ppks_id', 'detail_jenis.id_detail_ppks', 'foto.foto_ppks', 'foto.foto_luar', 'foto.foto_dalam', 'ppks.keterangann', 'ppks.status')
        ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
        ->join('kelurahan', 'ppks.id_kelurahan', '=', 'kelurahan.id_kelurahan')
        ->join('detail_jenis', 'ppks.id_detail_ppks', '=', 'detail_jenis.id_detail_ppks')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->join('foto', 'ppks.id_foto', '=', 'foto.id_foto')
        ->where('ppks.id_kecamatan', '=', $id1)
        ->get();

        $presentase = DB::table('ppks')
        ->selectRaw('jenis_ppks.nama_jenis, COUNT(ppks.id_jenis_ppks) as banyak_data')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
        ->where('ppks.id_kecamatan', '=', $id1)
        ->groupBy('jenis_ppks.nama_jenis')
        ->get();

        $presentase2 = DB::table('ppks')
        ->selectRaw(' kecamatan.nama_kecamatan, COUNT(ppks.id_kecamatan) as banyak_data')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
        ->groupBy('kecamatan.nama_kecamatan')
        ->get();

        $cek_data = Ppks::select('ppks.id', 'ppks.nama', 'ppks.nik', 'ppks.jenis_kelamin', 'kecamatan.id_kecamatan', 'kelurahan.id_kelurahan' ,'ppks.tanggal_lahir', 'ppks.pendidikan' ,'kecamatan.nama_kecamatan', 'jenis_ppks.nama_jenis', 'ppks.jaminan_kesehatan', 'ppks.pekerjaan', 'ppks.alamat', 'jenis_ppks.jenis_ppks_id', 'detail_jenis.id_detail_ppks', 'foto.foto_ppks', 'foto.foto_luar', 'foto.foto_dalam', 'ppks.keterangann', 'ppks.status')
        ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
        ->join('kelurahan', 'ppks.id_kelurahan', '=', 'kelurahan.id_kelurahan')
        ->join('detail_jenis', 'ppks.id_detail_ppks', '=', 'detail_jenis.id_detail_ppks')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->join('foto', 'ppks.id_foto', '=', 'foto.id_foto')
        ->where('ppks.id_kecamatan', '=', $id1)
        ->first();

        // var_dump($cek_data);

        if (is_null($cek_data)) {
            $page = "Data PPKS";
            $grafik1 = "Grafik Piechart Data PPKS Kecamatan Keseluruhan";
            $grafik2 = "Grafik Piechart Data PPKS Kecamatan Keseluruhan";
            $tabel = "Tabel Data PPKS Keseluruhan";
            $title = "Data PPKS";
        }else{
            $page = "Data PPKS Kecamatan " . $cek_data['nama_kecamatan'];
            $grafik1 = "Grafik Piechart Data PPKS Kecamatan " . $cek_data['nama_kecamatan'];
            $grafik2 = "Grafik Piechart Data PPKS Kecamatan Keseluruhan";
            $tabel = "Tabel Data PPKS " . $cek_data['nama_kecamatan'];
            $title = "Data PPKS";
        }
        
        
        return view('ppks/data-ppks', compact('ppks', 'kelurahan', 'jenis', 'detail' , 'kecamatan', 'presentase', 'page', 'grafik1', 'grafik2', 'tabel', 'presentase2', 'title'));
    }

    

    public function filter_data($id1, $id2)
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $jenis = JenisPpk::all();
        $detail = DetailJenis::all();

        if ($id2 == 0) {
            $ppks = Ppks::select('ppks.id', 'ppks.nama', 'ppks.nik', 'ppks.jenis_kelamin', 'kecamatan.id_kecamatan', 'kelurahan.id_kelurahan' ,'ppks.tanggal_lahir', 'ppks.pendidikan' ,'kecamatan.nama_kecamatan', 'jenis_ppks.nama_jenis', 'ppks.jaminan_kesehatan', 'ppks.pekerjaan', 'ppks.alamat', 'kelurahan.nama_kelurahan', 'jenis_ppks.nama_jenis', DB::raw('IF(ppks.id_jenis_ppks IN (4, 6), detail_jenis.nama_detail_jenis, "-") AS nama_detail_jenis') ,'jenis_ppks.jenis_ppks_id', 'detail_jenis.id_detail_ppks', 'foto.foto_ppks', 'foto.foto_luar', 'foto.foto_dalam', 'ppks.keterangann', 'ppks.status')
            ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
            ->join('kelurahan', 'ppks.id_kelurahan', '=', 'kelurahan.id_kelurahan')
            ->join('detail_jenis', 'ppks.id_detail_ppks', '=', 'detail_jenis.id_detail_ppks')
            ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
            ->join('foto', 'ppks.id_foto', '=', 'foto.id_foto')
            ->where('ppks.id_jenis_ppks', '=', $id1)
            ->get();

            $presentase = DB::table('ppks')
            ->selectRaw('jenis_ppks.nama_jenis, COUNT(ppks.id_jenis_ppks) as banyak_data')
            ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
            ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
            ->where('ppks.id_jenis_ppks', '=', $id1)
            ->groupBy('jenis_ppks.nama_jenis')
            ->get();

            $presentase2 = DB::table('ppks')
            ->selectRaw(' kecamatan.nama_kecamatan, COUNT(ppks.id_kecamatan) as banyak_data')
            ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
            ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
            ->where('ppks.id_jenis_ppks', '=', $id1)
            ->groupBy('kecamatan.nama_kecamatan')
            ->get();
            
            if ($id1 == 6) {
                $title = "Data Disabilitas";
                $id = 6;
                $grafik1 = "Piechart Data Disabilitas Seluruh Kecamatan";
                $grafik2 = "Piechart Data Disabilitas Seluruh Kecamatan";
            }else{
                $title = "Data Kedisabilitasan";
                $id = 4;
                $grafik1 = "Piechart Data Kedisabilitasan Seluruh Kecamatan";
                $grafik2 = "Piechart Data Kedisabilitasan Seluruh Kecamatan";
            }

        }elseif($id2 == 400){

            $cek_data = Ppks::select('ppks.id', 'ppks.nama', 'ppks.nik', 'ppks.jenis_kelamin', 'kecamatan.id_kecamatan', 'kelurahan.id_kelurahan' ,'ppks.tanggal_lahir', 'ppks.pendidikan' ,'kecamatan.nama_kecamatan', 'jenis_ppks.nama_jenis', 'ppks.jaminan_kesehatan', 'ppks.pekerjaan', 'ppks.alamat', 'jenis_ppks.jenis_ppks_id', 'detail_jenis.id_detail_ppks', 'foto.foto_ppks', 'foto.foto_luar', 'foto.foto_dalam', 'ppks.keterangann', 'ppks.status')
            ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
            ->join('kelurahan', 'ppks.id_kelurahan', '=', 'kelurahan.id_kelurahan')
            ->join('detail_jenis', 'ppks.id_detail_ppks', '=', 'detail_jenis.id_detail_ppks')
            ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
            ->join('foto', 'ppks.id_foto', '=', 'foto.id_foto')
            ->where('ppks.id_jenis_ppks', '=', $id1)
            ->first();

            $ppks = Ppks::select('ppks.id', 'ppks.nama', 'ppks.nik', 'ppks.jenis_kelamin', 'kecamatan.id_kecamatan', 'kelurahan.id_kelurahan' ,'ppks.tanggal_lahir', 'ppks.pendidikan' ,'kecamatan.nama_kecamatan', 'jenis_ppks.nama_jenis', 'ppks.jaminan_kesehatan', 'ppks.pekerjaan', 'ppks.alamat', 'kelurahan.nama_kelurahan', 'jenis_ppks.nama_jenis', DB::raw('IF(ppks.id_jenis_ppks IN (4, 6), detail_jenis.nama_detail_jenis, "-") AS nama_detail_jenis') ,'jenis_ppks.jenis_ppks_id', 'detail_jenis.id_detail_ppks', 'foto.foto_ppks', 'foto.foto_luar', 'foto.foto_dalam', 'ppks.keterangann', 'ppks.status')
            ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
            ->join('kelurahan', 'ppks.id_kelurahan', '=', 'kelurahan.id_kelurahan')
            ->join('detail_jenis', 'ppks.id_detail_ppks', '=', 'detail_jenis.id_detail_ppks')
            ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
            ->join('foto', 'ppks.id_foto', '=', 'foto.id_foto')
            ->where('ppks.id_jenis_ppks', '=', $id1)
            ->get();

            $presentase = DB::table('ppks')
            ->selectRaw('jenis_ppks.nama_jenis, COUNT(ppks.id_jenis_ppks) as banyak_data')
            ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
            ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
            ->where('ppks.id_jenis_ppks', '=', $id1)
            ->groupBy('jenis_ppks.nama_jenis')
            ->get();

            $presentase2 = DB::table('ppks')
            ->selectRaw(' kecamatan.nama_kecamatan, COUNT(ppks.id_kecamatan) as banyak_data')
            ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
            ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
            ->where('ppks.id_jenis_ppks', '=', $id1)
            ->groupBy('kecamatan.nama_kecamatan')
            ->get();
            
            $title = "Data " . $cek_data['nama_jenis'];
            $id = $id1;
            $grafik1 = "Piechart Data " . $cek_data['nama_jenis'] . " Seluruh Kecamatan";
            $grafik2 = "Piechart Data " . $cek_data['nama_jenis'] . " Seluruh Kecamatan";
        }
        else{
            $cek_data = Ppks::select('ppks.id', 'ppks.nama', 'ppks.nik', 'ppks.jenis_kelamin', 'kecamatan.id_kecamatan', 'kelurahan.id_kelurahan' ,'ppks.tanggal_lahir', 'ppks.pendidikan' ,'kecamatan.nama_kecamatan', 'jenis_ppks.nama_jenis', 'ppks.jaminan_kesehatan', 'ppks.pekerjaan', 'ppks.alamat', 'jenis_ppks.jenis_ppks_id', 'detail_jenis.id_detail_ppks', 'foto.foto_ppks', 'foto.foto_luar', 'foto.foto_dalam', 'ppks.keterangann', 'ppks.status')
            ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
            ->join('kelurahan', 'ppks.id_kelurahan', '=', 'kelurahan.id_kelurahan')
            ->join('detail_jenis', 'ppks.id_detail_ppks', '=', 'detail_jenis.id_detail_ppks')
            ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
            ->join('foto', 'ppks.id_foto', '=', 'foto.id_foto')
            ->where('ppks.id_kecamatan', '=', $id2)
            ->first();

            $ppks = Ppks::select('ppks.id', 'ppks.nama', 'ppks.nik', 'ppks.jenis_kelamin', 'kecamatan.id_kecamatan', 'kelurahan.id_kelurahan' ,'ppks.tanggal_lahir', 'ppks.pendidikan' ,'kecamatan.nama_kecamatan', 'jenis_ppks.nama_jenis', 'ppks.jaminan_kesehatan', 'ppks.pekerjaan', 'ppks.alamat', 'kelurahan.nama_kelurahan', 'jenis_ppks.nama_jenis', DB::raw('IF(ppks.id_jenis_ppks IN (4, 6), detail_jenis.nama_detail_jenis, "-") AS nama_detail_jenis') ,'jenis_ppks.jenis_ppks_id', 'detail_jenis.id_detail_ppks', 'foto.foto_ppks', 'foto.foto_luar', 'foto.foto_dalam', 'ppks.keterangann', 'ppks.status')
            ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
            ->join('kelurahan', 'ppks.id_kelurahan', '=', 'kelurahan.id_kelurahan')
            ->join('detail_jenis', 'ppks.id_detail_ppks', '=', 'detail_jenis.id_detail_ppks')
            ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
            ->join('foto', 'ppks.id_foto', '=', 'foto.id_foto')
            ->where('ppks.id_jenis_ppks', '=', $id1)
            ->where('ppks.id_kecamatan', '=', $id2)
            ->get();

            $presentase = DB::table('ppks')
            ->selectRaw('jenis_ppks.nama_jenis, COUNT(ppks.id_jenis_ppks) as banyak_data')
            ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
            ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
            ->where('ppks.id_jenis_ppks', '=', $id1)
            ->where('ppks.id_kecamatan', '=', $id2)
            ->groupBy('jenis_ppks.nama_jenis')
            ->get();

            $presentase2 = DB::table('ppks')
            ->selectRaw(' kecamatan.nama_kecamatan, COUNT(ppks.id_kecamatan) as banyak_data')
            ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
            ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
            ->where('ppks.id_jenis_ppks', '=', $id1)
            ->groupBy('kecamatan.nama_kecamatan')
            ->get();

            if (is_null($cek_data)) {
                if ($id1 == 6) {
                    $title = "Data Disabilitas";
                    $id = 6;
                    $grafik1 = "Piechart Data Disabilitas Seluruh Kecamatan";
                    $grafik2 = "Piechart Data Disabilitas Seluruh Kecamatan";
                }else{
                    $title = "Data Kedisabilitasan";
                    $id = 4;
                    $grafik1 = "Piechart Data Kedisabilitasan Seluruh Kecamatan";
                    $grafik2 = "Piechart Data Kedisabilitasan Seluruh Kecamatan";
                }
            }else{
                if ($id1 == 6) {
                    $title = "Data Disabilitas";
                    $id = 6;
                    $grafik1 = "Piechart Data Disabilitas Kecamatan " . $cek_data['nama_kecamatan'];
                    $grafik2 = "Piechart Data Disabilitas Seluruh Kecamatan";
                }else{
                    $title = "Data Kedisabilitasan";
                    $id = 4;
                    $grafik1 = "Piechart Data Kedisabilitasan Kecamatan " . $cek_data['nama_kecamatan'];
                    $grafik2 = "Piechart Data Kedisabilitasan Seluruh Kecamatan";
                }
            }
            
            
        }
        

        $cek_data = Ppks::select('ppks.id', 'ppks.nama', 'ppks.nik', 'ppks.jenis_kelamin', 'kecamatan.id_kecamatan', 'kelurahan.id_kelurahan' ,'ppks.tanggal_lahir', 'ppks.pendidikan' ,'kecamatan.nama_kecamatan', 'jenis_ppks.nama_jenis', 'ppks.jaminan_kesehatan', 'ppks.pekerjaan', 'ppks.alamat', 'jenis_ppks.jenis_ppks_id', 'detail_jenis.id_detail_ppks', 'foto.foto_ppks', 'foto.foto_luar', 'foto.foto_dalam', 'ppks.keterangann', 'ppks.status')
        ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
        ->join('kelurahan', 'ppks.id_kelurahan', '=', 'kelurahan.id_kelurahan')
        ->join('detail_jenis', 'ppks.id_detail_ppks', '=', 'detail_jenis.id_detail_ppks')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->join('foto', 'ppks.id_foto', '=', 'foto.id_foto')
        ->where('ppks.id_jenis_ppks', '=', $id1)
        ->first();

        if (is_null($cek_data)) {
            $page = "Data PPKS";
            $grafik1 = "Piechart Data PPKS Seluruh Kecamatan";
            $grafik2 = "Piechart Data PPKS Seluruh Kecamatan";
            $tabel = "Tabel Data PPKS";
        }else{
            $page = "Data ". $cek_data['nama_jenis'];
            
            $tabel = "Tabel ". $cek_data['nama_jenis'];
            
        }
        
        return view('ppks/data-ppks', compact('ppks', 'kelurahan', 'jenis', 'detail' , 'kecamatan', 'presentase', 'page', 'grafik1', 'grafik2', 'tabel', 'presentase2', 'title', 'id'));
    }

    public function filter_jenis_2($id1)
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $jenis = JenisPpk::all();
        $detail = DetailJenis::all();
        $ppks = Ppks::select('ppks.id', 'ppks.nama', 'ppks.nik', 'ppks.jenis_kelamin', 'kecamatan.id_kecamatan', 'kelurahan.id_kelurahan' ,'ppks.tanggal_lahir', 'ppks.pendidikan' ,'kecamatan.nama_kecamatan', 'jenis_ppks.nama_jenis', 'ppks.jaminan_kesehatan', 'ppks.pekerjaan', 'ppks.alamat', 'kelurahan.nama_kelurahan', 'jenis_ppks.nama_jenis', DB::raw('IF(ppks.id_jenis_ppks IN (4, 6), detail_jenis.nama_detail_jenis, "-") AS nama_detail_jenis') ,'jenis_ppks.jenis_ppks_id', 'detail_jenis.id_detail_ppks', 'foto.foto_ppks', 'foto.foto_luar', 'foto.foto_dalam', 'ppks.keterangann', 'ppks.status')
        ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
        ->join('kelurahan', 'ppks.id_kelurahan', '=', 'kelurahan.id_kelurahan')
        ->join('detail_jenis', 'ppks.id_detail_ppks', '=', 'detail_jenis.id_detail_ppks')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->join('foto', 'ppks.id_foto', '=', 'foto.id_foto')
        ->where('ppks.id_jenis_ppks', '=', $id1)
        ->get();

        $presentase = DB::table('ppks')
        ->selectRaw('jenis_ppks.nama_jenis, COUNT(ppks.id_jenis_ppks) as banyak_data')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->where('ppks.id_jenis_ppks', '=', $id1)
        ->groupBy('jenis_ppks.nama_jenis')
        ->get();

        $presentase2 = DB::table('ppks')
            ->selectRaw(' kecamatan.nama_kecamatan, COUNT(ppks.id_kecamatan) as banyak_data')
            ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
            ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
            ->where('ppks.id_jenis_ppks', '=', $id1)
            ->groupBy('kecamatan.nama_kecamatan')
            ->get();

        $cek_data = Ppks::select('ppks.id', 'ppks.nama', 'ppks.nik', 'ppks.jenis_kelamin', 'kecamatan.id_kecamatan', 'kelurahan.id_kelurahan' ,'ppks.tanggal_lahir', 'ppks.pendidikan' ,'kecamatan.nama_kecamatan', 'jenis_ppks.nama_jenis', 'ppks.jaminan_kesehatan', 'ppks.pekerjaan', 'ppks.alamat', 'jenis_ppks.jenis_ppks_id', 'detail_jenis.id_detail_ppks', 'foto.foto_ppks', 'foto.foto_luar', 'foto.foto_dalam', 'ppks.keterangann', 'ppks.status')
        ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
        ->join('kelurahan', 'ppks.id_kelurahan', '=', 'kelurahan.id_kelurahan')
        ->join('detail_jenis', 'ppks.id_detail_ppks', '=', 'detail_jenis.id_detail_ppks')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->join('foto', 'ppks.id_foto', '=', 'foto.id_foto')
        ->where('ppks.id_jenis_ppks', '=', $id1)
        ->first();

        

        if (is_null($cek_data)) {
            $page = "Data PPKS";
            $grafik1 = "Piechart Data PPKS Seluruh Kecamatan";
            $grafik2 = "Piechart Data PPKS Seluruh Kecamatan";
            $tabel = "Tabel Data PPKS";
            $id = '';
            $title = '';
        }else{
            $page = "Data ". $cek_data['nama_jenis'];
            $grafik1 = "Piechart " . $cek_data['nama_jenis'] . " Seluruh Kecamatan";
            $grafik2 = "Piechart " . $cek_data['nama_jenis'] . " Seluruh Kecamatan";
            $tabel = "Tabel ". $cek_data['nama_jenis'];
            $id = $id1;
            $title = "Data " . $cek_data['nama_jenis'];
        }
        
        return view('ppks/data-ppks', compact('ppks', 'kelurahan', 'jenis', 'detail' , 'kecamatan', 'presentase', 'page', 'grafik1', 'grafik2', 'tabel', 'presentase2', 'title', 'id'));
    }

    public function detail_data($id)
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $jenis = JenisPpk::all();
        $detail = DetailJenis::all();
        $ppks = Ppks::select('ppks.id', 'ppks.nama', 'ppks.nik', 'ppks.jenis_kelamin', 'kecamatan.id_kecamatan', 'kelurahan.id_kelurahan' ,'ppks.tanggal_lahir', 'ppks.pendidikan' ,'kecamatan.nama_kecamatan', 'jenis_ppks.nama_jenis', 'ppks.jaminan_kesehatan', 'ppks.pekerjaan', 'ppks.alamat', 'kelurahan.nama_kelurahan', 'jenis_ppks.nama_jenis', DB::raw('IF(ppks.id_jenis_ppks IN (4, 6), detail_jenis.nama_detail_jenis, "-") AS nama_detail_jenis') ,'jenis_ppks.jenis_ppks_id', 'detail_jenis.id_detail_ppks', 'foto.foto_ppks', 'foto.foto_luar', 'foto.foto_dalam', 'ppks.keterangann', 'ppks.status')
        ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
        ->join('kelurahan', 'ppks.id_kelurahan', '=', 'kelurahan.id_kelurahan')
        ->join('detail_jenis', 'ppks.id_detail_ppks', '=', 'detail_jenis.id_detail_ppks')
        ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
        ->join('foto', 'ppks.id_foto', '=', 'foto.id_foto')
        ->where('ppks.id_jenis_ppks', '=', $id)
        ->get();
        
        return view('ppks/data-ppks_filter', compact('ppks', 'kecamatan', 'kelurahan', 'jenis', 'detail'));
    }

    public function destroy($id)
    {
        $ppks = Ppks::find($id);

        $ppks->delete();

        $massage = "Data Berhasil Di Hapus";
        return redirect()->route('data-ppks')->with('success', $massage);
    }

    

      // public function filter_jenis(Request $request)
    // {
    //     $kecamatan = Kecamatan::all();
    //     $kelurahan = Kelurahan::all();
    //     $jenis = JenisPpk::all();
    //     $detail = DetailJenis::all();
    //     $ppks = Ppks::select('ppks.id', 'ppks.nama', 'ppks.nik', 'ppks.jenis_kelamin', 'kecamatan.id_kecamatan', 'kelurahan.id_kelurahan' ,'ppks.tanggal_lahir', 'ppks.pendidikan' ,'kecamatan.nama_kecamatan', 'jenis_ppks.nama_jenis', 'ppks.jaminan_kesehatan', 'ppks.pekerjaan', 'ppks.alamat', 'jenis_ppks.jenis_ppks_id', 'detail_jenis.id_detail_ppks', 'foto.foto_ppks', 'foto.foto_luar', 'foto.foto_dalam', 'ppks.keterangann', 'ppks.status')
    //     ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
    //     ->join('kelurahan', 'ppks.id_kelurahan', '=', 'kelurahan.id_kelurahan')
    //     ->join('detail_jenis', 'ppks.id_detail_ppks', '=', 'detail_jenis.id_detail_ppks')
    //     ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
    //     ->join('foto', 'ppks.id_foto', '=', 'foto.id_foto')
    //     ->where('ppks.id_jenis_ppks', '=', $request->id)
    //     ->get();

    //     $presentase = DB::table('ppks')
    //     ->selectRaw('jenis_ppks.nama_jenis, COUNT(ppks.id_jenis_ppks) as banyak_data')
    //     ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
    //     ->where('ppks.id_jenis_ppks', '=', $request->id)
    //     ->groupBy('jenis_ppks.nama_jenis')
    //     ->get();

    //     $ppks_1 = Ppks::select('ppks.id', 'ppks.nama', 'ppks.nik', 'ppks.jenis_kelamin', 'kecamatan.id_kecamatan', 'kelurahan.id_kelurahan' ,'ppks.tanggal_lahir', 'ppks.pendidikan' ,'kecamatan.nama_kecamatan', 'jenis_ppks.nama_jenis', 'ppks.jaminan_kesehatan', 'ppks.pekerjaan', 'ppks.alamat', 'jenis_ppks.jenis_ppks_id', 'detail_jenis.id_detail_ppks', 'foto.foto_ppks', 'foto.foto_luar', 'foto.foto_dalam', 'ppks.keterangann', 'ppks.status')
    //     ->join('kecamatan', 'ppks.id_kecamatan', '=', 'kecamatan.id_kecamatan')
    //     ->join('kelurahan', 'ppks.id_kelurahan', '=', 'kelurahan.id_kelurahan')
    //     ->join('detail_jenis', 'ppks.id_detail_ppks', '=', 'detail_jenis.id_detail_ppks')
    //     ->join('jenis_ppks', 'ppks.id_jenis_ppks', '=', 'jenis_ppks.jenis_ppks_id')
    //     ->join('foto', 'ppks.id_foto', '=', 'foto.id_foto')
    //     ->where('ppks.id_jenis_ppks', '=', $request->id)
    //     ->first();

    //     if (is_null($ppks_1)) {
    //         $page = "Data PPKS";
    //         $grafik1 = "Piechart Data PPKS Tiap Kecamatan";
    //         $grafik2 = "Donat Data PPKS Tiap Kecamatan";
    //         $tabel = "Tabel Data PPKS";
    //         $id = 6;
    //         $title = "Data Disabilitas";
    //     }else{
    //         $page = "Data ". $ppks_1['nama_jenis'];
    //         $grafik1 = "Piechart " . $ppks_1['nama_jenis'] . " Tiap Kecamatan";
    //         $grafik2 = "Donat " . $ppks_1['nama_jenis'] . " Tiap Kecamatan";
    //         $tabel = "Tabel ". $ppks_1['nama_jenis'];
    //         $id = 6;
    //         $title = "Data Disabilitas";
    //     }
        
    //     return view('ppks/data-ppks', compact('ppks', 'kelurahan', 'jenis', 'detail' , 'kecamatan', 'presentase', 'page', 'grafik1', 'grafik2', 'tabel'));
    // }
}
