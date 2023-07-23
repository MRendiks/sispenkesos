<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailJenis;

class DetailJenisController extends Controller
{
    public function index()
    {
        $detailJenis = DetailJenis::all();
        return view('detail-jenis.index', compact('detailJenis'));
    }

    public function create()
    {
        return view('detail-jenis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_detail_jenis' => 'required',
        ]);

        DetailJenis::create($request->all());

        return redirect()->route('detail-jenis.index')
            ->with('success', 'Detail Jenis created successfully.');
    }

    public function show(DetailJenis $detailJenis)
    {
        return view('detail-jenis.show', compact('detailJenis'));
    }

    public function edit(DetailJenis $detailJenis)
    {
        return view('detail-jenis.edit', compact('detailJenis'));
    }

    public function update(Request $request, DetailJenis $detailJenis)
    {
        $request->validate([
            'nama_detail_jenis' => 'required',
        ]);

        $detailJenis->update($request->all());

        return redirect()->route('detail-jenis.index')
            ->with('success', 'Detail Jenis updated successfully');
    }

    public function destroy(DetailJenis $detailJenis)
    {
        $detailJenis->delete();

        return redirect()->route('detail-jenis.index')
            ->with('success', 'Detail Jenis deleted successfully');
    }
}
