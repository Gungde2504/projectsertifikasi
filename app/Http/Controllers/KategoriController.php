<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori.index', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->back()->with('success', 'Kategori berhasil dihapus');
    }

    public function edit($id)
{
    $kategori = Kategori::findOrFail($id);
    return view('kategori.edit', compact('kategori'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_kategori' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
    ]);

    $kategori = Kategori::findOrFail($id);
    $kategori->update($request->all());

    return redirect()->route('kategori.index')
        ->with('success', 'Kategori berhasil diperbarui');
}
}
