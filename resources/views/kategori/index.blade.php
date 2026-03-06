@extends('layouts.admin.app')

@section('content')
<div id="page-content" class="max-w-5xl mx-auto text-slate-100 opacity-0 translate-y-6
           transition-all duration-700 ease-out ">

    <h2 class="text-2xl font-bold mb-6">
        Kategori Barang
    </h2>

    {{-- Form --}}
    <div class="bg-slate-800 p-6 rounded-xl shadow mb-6opacity-0 translate-y-4 transition-all duration-700 delay-100"
     data-animate>
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <input 
                    type="text" 
                    name="nama_kategori" 
                    placeholder="Nama kategori"
                    class="px-4 py-2 rounded bg-slate-900 border border-slate-700 text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required
                >

                <input 
                    type="text" 
                    name="deskripsi" 
                    placeholder="Deskripsi (opsional)"
                    class="px-4 py-2 rounded bg-slate-900 border border-slate-700 text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >

                <button 
    type="submit"
    class="relative px-4 py-2 font-medium text-white rounded-lg
           bg-gradient-to-r from-blue-700 to-blue-900
           transition-all duration-300
           hover:from-blue-600 hover:to-blue-800
           hover:-translate-y-0.5
           hover:shadow-[0_0_35px_rgba(37,99,235,0.55)]
           active:translate-y-0
           shadow-md"
>
    Tambah
</button>
            </div>
        </form>
    </div>

    {{-- Tabel --}}
    <div class="bg-slate-800 rounded-xl shadow overflow-hidden mt-5 opacity-0 translate-y-4 transition-all duration-700 delay-300"
     data-animate>
        <table class="w-full">
           <thead class="bg-slate-700 text-slate-200">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Nama Kategori</th>
                    <th class="px-4 py-3 text-left">Deskripsi</th>
                    <th class="pr-14 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($kategoris as $kategori)
                <tr class="border-t border-slate-700 hover:bg-slate-700/40 transition">
                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 font-medium">{{ $kategori->nama_kategori }}</td>
                    <td class="px-4 py-3 text-slate-400">{{ $kategori->deskripsi }}</td>
                    <td class="px-4 py-3">
                      <div class="flex gap-3">

                            {{-- EDIT --}}
                            <a href="{{ route('kategori.edit', $kategori->id) }}"
                            class="group inline-flex items-center gap-2
                                    px-3 py-1.5 rounded-lg
                                    text-white font-medium
                                    bg-gradient-to-r from-yellow-500 to-amber-500
                                    border border-yellow-400/40
                                    transition-all duration-300
                                    hover:scale-105
                                    hover:shadow-[0_0_20px_rgba(250,204,21,0.45)]">

                                {{-- ICON EDIT --}}
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 transition group-hover:rotate-6"
                                    fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 3.487l3.651 3.651M4 20h4.586a1 1 0 00.707-.293l10.12-10.12a1 1 0 000-1.414l-3.586-3.586a1 1 0 00-1.414 0L4.293 14.707A1 1 0 004 15.414V20z"/>
                                </svg>

                                Edit
                            </a>

                            {{-- HAPUS --}}
                           <a href="?delete_kategori={{ $kategori->id }}"
                            class="group inline-flex items-center gap-2
                                    px-3 py-1.5 rounded-lg
                                    text-white font-medium
                                    bg-gradient-to-r from-red-600 to-rose-600
                                    border border-red-500/40
                                    transition-all duration-300
                                    hover:scale-105
                                    hover:shadow-[0_0_25px_rgba(239,68,68,0.55)]">

                                {{-- ICON DELETE --}}
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 transition group-hover:scale-110"
                                    fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0H7m3-3h4a1 1 0 011 1v1H9V5a1 1 0 011-1z"/>
                                </svg>

                                Hapus
                            </a>

                            @if(request('delete_kategori') == $kategori->id)

                            <div class="fixed inset-0 flex items-center justify-center
                                        bg-black/70 backdrop-blur-sm z-50">

                                <div class="bg-slate-900 border border-slate-700
                                            p-6 rounded-xl shadow-xl text-center w-80">

                                    <h2 class="text-white text-lg font-semibold mb-4">
                                        Apakah Anda yakin ingin menghapus kategori ini?
                                    </h2>

                                    <div class="flex justify-center gap-4">

                                        {{-- tombol hapus --}}
                                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST">
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
                    <td colspan="4" class="px-4 py-6 text-center text-slate-400">
                        Belum ada data kategori
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const page = document.getElementById('page-content');

        // trigger animation
        setTimeout(() => {
            page.classList.remove('opacity-0', 'translate-y-6');
            page.classList.add('opacity-100', 'translate-y-0');
        }, 100);
    });
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('[data-animate]').forEach(el => {
            setTimeout(() => {
                el.classList.remove('opacity-0', 'translate-y-4');
                el.classList.add('opacity-100', 'translate-y-0');
            }, 100);
        });
    });
</script>
@endsection