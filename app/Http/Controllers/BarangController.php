<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('kategori')->get();
        $kategoris = Kategori::all();

        return view('barang.index', compact('barangs', 'kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama_barang' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        Barang::create($request->all());

        return redirect()->back()->with('success', 'Barang berhasil ditambahkan');
    }
public function edit(Barang $barang)
{
    $kategoris = Kategori::all();
    return view('barang.edit', compact('barang', 'kategoris'));
}

public function update(Request $request, Barang $barang)
{
    $request->validate([
        'kategori_id' => 'required',
        'nama_barang' => 'required',
        'stok' => 'required|integer',
        'harga' => 'required|numeric',
    ]);

    $barang->update($request->all());

    return redirect()->route('barang.index')
        ->with('success', 'Barang berhasil diupdate');
}

public function destroy(Barang $barang)
{
    $barang->delete();

    return redirect()->route('barang.index')
        ->with('success', 'Barang berhasil dihapus');
}

}
