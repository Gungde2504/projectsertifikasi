@extends('layouts.admin.app')

@section('content')
<div 
    id="page-content"
    class="max-w-6xl mx-auto
           px-4 md:px-6
           pb-10
           opacity-0 translate-y-6
           transition-all duration-700 ease-out">
<h2 class="text-2xl font-bold mb-6 text-slate-100">
    Data Barang
</h2>

{{-- FORM TAMBAH --}}
<div class="bg-slate-800 p-6 rounded-xl mb-6 shadow-mdopacity-0 translate-y-4
            transition-all duration-700 delay-100"
     data-animate>
    <form action="{{ route('barang.store') }}" method="POST"
          class="grid grid-cols-1 md:grid-cols-4 gap-4">
        @csrf

        <select name="kategori_id"
                class="px-4 py-2 rounded-md bg-slate-900 border border-slate-700
                       text-slate-100 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                required>
            <option value="">Pilih Kategori</option>
            @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}">
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach
        </select>

        <input type="text" name="nama_barang" placeholder="Nama barang"
               class="px-4 py-2 rounded-md bg-slate-900 border border-slate-700
                      text-slate-100 focus:ring-2 focus:ring-blue-500 focus:outline-none"
               required>

        <input type="number" name="stok" placeholder="Stok"
               class="px-4 py-2 rounded-md bg-slate-900 border border-slate-700
                      text-slate-100 focus:ring-2 focus:ring-blue-500 focus:outline-none"
               required>

        <input type="number" name="harga" placeholder="Harga"
               class="px-4 py-2 rounded-md bg-slate-900 border border-slate-700
                      text-slate-100 focus:ring-2 focus:ring-blue-500 focus:outline-none"
               required>

        <button
    class="md:col-span-4 py-2 rounded-lg font-semibold text-white
           bg-gradient-to-r from-blue-700 to-indigo-800
           transition-all duration-300 ease-out
           hover:from-blue-600 hover:to-indigo-700
           hover:-translate-y-0.5
           hover:shadow-[0_0_40px_rgba(37,99,235,0.55)]
           active:translate-y-0
           shadow-md"
>
    Tambah Barang
</button>
    </form>
</div>

{{-- TABEL --}}
<div class="bg-slate-800 rounded-lg overflow-hidden shadow-mdopacity-0 translate-y-4
            transition-all duration-700 delay-300"
     data-animate>
    <table class="w-full text-sm">
        <thead class="bg-slate-700 text-slate-200">
            <tr>
                <th class="p-3 text-left">No</th>
                <th class="p-3 text-left">Barang</th>
                <th class="p-3 text-left">Kategori</th>
                <th class="p-3 text-left">Stok</th>
                <th class="p-3 text-left">Harga</th>
                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
        @forelse ($barangs as $barang)
            <tr class="border-t border-slate-700
                       hover:bg-slate-700/40 transition">
                <td class="p-3">{{ $loop->iteration }}</td>
                <td class="p-3 font-medium">{{ $barang->nama_barang }}</td>
                <td class="p-3 text-slate-300">
                    {{ $barang->kategori->nama_kategori }}
                </td>
                <td class="p-3">{{ $barang->stok }}</td>
                <td class="p-3">Rp {{ number_format($barang->harga) }}</td>

                {{-- AKSI --}}
                <td class="p-3">
                    <div class="flex justify-center gap-3">

                        {{-- EDIT --}}
                        <a href="{{ route('barang.edit', $barang->id) }}"
                        class="group inline-flex items-center gap-2
                                px-4 py-1.5 rounded-lg
                                font-semibold text-white
                                bg-gradient-to-r from-yellow-500 to-amber-500
                                shadow-md
                                transition-all duration-300
                                hover:scale-105
                                hover:shadow-[0_0_25px_rgba(234,179,8,0.45)]">

                            {{-- ICON EDIT --}}
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 transition group-hover:rotate-6"
                                fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 3.487a2.1 2.1 0 113.002 3.002L7.125 19.228l-4.125 1.125
                                        1.125-4.125L16.862 3.487z" />
                            </svg>

                            Edit
                        </a>

                        {{-- HAPUS --}}
                        <a href="?delete={{ $barang->id }}"
                        class="group inline-flex items-center gap-2
                                px-4 py-1.5 rounded-lg
                                font-semibold text-white
                                bg-gradient-to-r from-red-600 to-rose-600
                                shadow-md
                                transition-all duration-300
                                hover:scale-105
                                hover:shadow-[0_0_25px_rgba(239,68,68,0.45)]">

                            {{-- ICON HAPUS --}}
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 transition group-hover:-rotate-6"
                                fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862
                                    a2 2 0 01-1.995-1.858L5 7m5-3h4m-4 0
                                    a1 1 0 00-1 1v1h6V5a1 1 0 00-1-1m-4 0h4" />
                            </svg>

                            Hapus
                        </a>


                        {{-- POPUP --}}
                        @if(request('delete') == $barang->id)

                        <div class="fixed inset-0 flex items-center justify-center
                                    bg-black/70 backdrop-blur-sm z-50">

                            <div class="bg-slate-900 border border-slate-700
                                        p-6 rounded-xl shadow-xl text-center w-80">

                                <h2 class="text-white text-lg font-semibold mb-4">
                                    Apakah Anda yakin ingin menghapus data ini?
                                </h2>

                                <div class="flex justify-center gap-4">

                                    {{-- tombol hapus --}}
                                    <form action="{{ route('barang.destroy', $barang->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="px-4 py-2 rounded-lg font-semibold text-white
                                                bg-red-600
                                                transition-all duration-300
                                                hover:bg-red-500
                                                hover:shadow-[0_0_25px_rgba(239,68,68,0.7)]">
                                            Hapus
                                        </button>
                                    </form>

                                    {{-- tombol batal --}}
                                    <a href="{{ url()->current() }}"
                                    class="px-4 py-2 rounded-lg font-semibold
                                            bg-white text-black
                                            transition-all duration-300
                                            hover:bg-gray-200
                                            hover:shadow-[0_0_20px_rgba(255,255,255,0.8)]">
                                        Batal
                                    </a>

                                </div>

                            </div>

                        </div>

                        @endif
                    </div>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6"
                    class="p-6 text-center text-slate-400">
                    Belum ada data barang
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
<div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // wrapper utama
        const page = document.getElementById('page-content');
        page.classList.remove('opacity-0', 'translate-y-6');
        page.classList.add('opacity-100', 'translate-y-0');

        // animasi bertahap
        document.querySelectorAll('[data-animate]').forEach(el => {
            el.classList.remove('opacity-0', 'translate-y-4');
            el.classList.add('opacity-100', 'translate-y-0');
        });
    });
</script>
@endsection