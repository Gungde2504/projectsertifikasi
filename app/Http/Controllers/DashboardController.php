<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Barang;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalKategori' => Kategori::count(),
            'totalBarang'   => Barang::count(),
            'totalStok'     => Barang::sum('stok'),

            // chart
            'kategoriLabels' => Kategori::pluck('nama_kategori'),
            'stokPerKategori' => Kategori::withSum('barangs', 'stok')
                ->pluck('barangs_sum_stok'),
        ]);
    }
}