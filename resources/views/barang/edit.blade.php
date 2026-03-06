@extends('layouts.admin.app')

@section('content')
<div class="max-w-xl mx-auto text-slate-100">

    <form action="{{ route('barang.update', $barang->id) }}"
          method="POST"
          class="group bg-slate-800/90 backdrop-blur
                 p-8 rounded-2xl space-y-5
                 shadow-xl border border-slate-700
                 transition-all duration-300
                 hover:border-blue-800
                 hover:shadow-[0_0_40px_rgba(30,64,175,0.25)]">
        @csrf
        @method('PUT')

        {{-- TITLE --}}
        <h2 class="text-2xl font-bold tracking-wide mb-1">
            Edit Barang
        </h2>
        <p class="text-slate-400 text-sm mb-6">
            Perbarui informasi barang pada sistem
        </p>

        {{-- KATEGORI --}}
        <div>
            <label class="text-sm text-slate-400 mb-1 block">Kategori</label>
            <select name="kategori_id"
                    class="w-full px-4 py-3 rounded-lg
                           bg-slate-900 border border-slate-700
                           focus:outline-none focus:ring-2 focus:ring-blue-600
                           transition">
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}"
                        {{ $barang->kategori_id == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- NAMA BARANG --}}
        <div>
            <label class="text-sm text-slate-400 mb-1 block">Nama Barang</label>
            <input type="text" name="nama_barang"
                   value="{{ $barang->nama_barang }}"
                   class="w-full px-4 py-3 rounded-lg
                          bg-slate-900 border border-slate-700
                          focus:outline-none focus:ring-2 focus:ring-blue-600
                          transition">
        </div>

        {{-- STOK --}}
        <div>
            <label class="text-sm text-slate-400 mb-1 block">Stok</label>
            <input type="number" name="stok"
                   value="{{ $barang->stok }}"
                   class="w-full px-4 py-3 rounded-lg
                          bg-slate-900 border border-slate-700
                          focus:outline-none focus:ring-2 focus:ring-blue-600
                          transition">
        </div>

        {{-- HARGA --}}
        <div>
            <label class="text-sm text-slate-400 mb-1 block">Harga</label>
            <input type="number" name="harga"
                   value="{{ $barang->harga }}"
                   class="w-full px-4 py-3 rounded-lg
                          bg-slate-900 border border-slate-700
                          focus:outline-none focus:ring-2 focus:ring-blue-600
                          transition">
        </div>

        {{-- ACTION --}}
        <div class="pt-6 flex justify-end gap-3">

            {{-- BATAL --}}
            <a href="{{ route('barang.index') }}"
               class="px-6 py-3 rounded-xl
                      font-semibold text-slate-800
                      bg-white
                      shadow-md
                      transition-all duration-300
                      hover:scale-[1.03]
                      hover:shadow-[0_0_25px_rgba(226,232,240,0.8)]">
                Batal
            </a>

            {{-- UPDATE --}}
            <button
                type="submit"
                id="btnUpdate"
                onclick="showLoading()"
                class="group inline-flex items-center gap-2
                    px-6 py-3 rounded-xl
                    font-semibold text-white
                    bg-gradient-to-r from-blue-700 to-blue-900
                    shadow-lg
                    transition-all duration-300
                    hover:scale-[1.03]
                    hover:shadow-[0_0_30px_rgba(59,130,246,0.45)]">

                {{-- ICON CHECK --}}
                <svg id="iconUpdate" xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 transition group-hover:rotate-3"
                    fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M5 13l4 4L19 7" />
                </svg>

                <svg id="loadingSpinner"
                    class="hidden w-5 h-5 animate-spin"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25"
                            cx="12"
                            cy="12"
                            r="10"
                            stroke="currentColor"
                            stroke-width="4"></circle>
                    <path class="opacity-75"
                        fill="currentColor"
                        d="M4 12a8 8 0 018-8v4l3-3-3-3v4a12 12 0 00-12 12h4z"></path>
                </svg>

                <span id="textUpdate">Update Barang</span>
            </button>
        </div>

    </form>

</div>
@endsection

<script>
function showLoading() {
    document.getElementById('iconUpdate').classList.add('hidden');
    document.getElementById('loadingSpinner').classList.remove('hidden');
    document.getElementById('textUpdate').innerText = "Memproses...";
}
</script>
