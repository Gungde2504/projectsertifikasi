@extends('layouts.admin.app')

@section('content')
    <h2 class="text-2xl font-bold mb-6">
        Dashboard
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-slate-800 p-6 rounded-xl shadow">
            <p class="text-sm text-slate-400">
                Total Kategori
            </p>
            <h3 class="text-3xl font-bold mt-2">
                {{ $totalKategori ?? 0 }}
            </h3>
        </div>

        <div class="bg-slate-800 p-6 rounded-xl shadow">
            <p class="text-sm text-slate-400">
                Total Barang
            </p>
            <h3 class="text-3xl font-bold mt-2">
                {{ $totalBarang ?? 0 }}
            </h3>
        </div>

        <div class="bg-slate-800 p-6 rounded-xl shadow">
            <p class="text-sm text-slate-400">
                Stok Tersedia
            </p>
            <h3 class="text-3xl font-bold mt-2">
                {{ $totalStok ?? 0 }}
            </h3>
        </div>
    </div>
@endsection
