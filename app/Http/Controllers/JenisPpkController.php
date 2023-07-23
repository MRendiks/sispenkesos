<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPpk;

class JenisPpkController extends Controller
{
    public function index()
    {
        $jenisPpks = JenisPpk::all();

        return view('jenis_ppks.index', compact('jenisPpks'));
    }

    public function create()
    {
        return view('jenis_ppks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required',
        ]);

        JenisPpk::create($request->all());

        return redirect()->route('jenis_ppks.index')
            ->with('success', 'Jenis PPK berhasil ditambahkan.');
    }

    public function edit(JenisPpk $jenisPpk)
    {
        return view('jenis_ppks.edit', compact('jenisPpk'));
    }

    public function update(Request $request, JenisPpk $jenisPpk)
    {
        $request->validate([
            'nama_jenis' => 'required',
        ]);

        $jenisPpk->update($request->all());

        return redirect()->route('jenis_ppks.index')
            ->with('success', 'Jenis PPK berhasil diperbarui.');
    }

    public function destroy(JenisPpk $jenisPpk)
    {
        $jenisPpk->delete();

        return redirect()->route('jenis_ppks.index')
            ->with('success', 'Jenis PPK berhasil dihapus.');
    }
}
