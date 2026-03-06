@extends('layouts.admin.app')

@section('content')
{{-- MODAL EDIT KATEGORI --}}
<div 
    x-data="{ open: true, loading: false }"
    x-show="open"
    x-transition.opacity
    class="fixed inset-0 z-50 flex items-center justify-center"
>

    {{-- BACKDROP --}}
    <div 
        @click="open = false"
        class="absolute inset-0 bg-black/60 backdrop-blur-sm">
    </div>

    {{-- MODAL CARD --}}
    <div
        x-transition.scale
        class="relative w-full max-w-xl mx-4
               bg-slate-800/90 backdrop-blur
               rounded-2xl shadow-2xl
               border border-slate-700
               hover:border-blue-600
               transition-all duration-300"
    >

        {{-- HEADER --}}
        <div class="px-8 pt-8 pb-4 text-center">
            <h2 class="text-2xl font-semibold tracking-wide text-white">
                Edit Kategori
            </h2>
            <p class="text-slate-400 text-sm mt-1">
                Perbarui data kategori
            </p>
        </div>

        {{-- FORM --}}
        <form
            @submit="loading = true"
            action="{{ route('kategori.update', $kategori->id) }}"
            method="POST"
            class="px-8 pb-8 space-y-6"
        >
            @csrf
            @method('PUT')

            {{-- NAMA --}}
            <div>
                <label class="block text-sm text-slate-400 mb-2">
                    Nama Kategori
                </label>
                <input
                    type="text"
                    name="nama_kategori"
                    value="{{ $kategori->nama_kategori }}"
                    required
                    class="w-full px-4 py-3 rounded-lg
                           bg-slate-900 border border-slate-700
                           text-slate-100
                           focus:outline-none focus:ring-2 focus:ring-blue-500
                           transition"
                >
            </div>

            {{-- DESKRIPSI --}}
            <div>
                <label class="block text-sm text-slate-400 mb-2">
                    Deskripsi
                </label>
                <textarea
                    name="deskripsi"
                    rows="3"
                    class="w-full px-4 py-3 rounded-lg
                           bg-slate-900 border border-slate-700
                           text-slate-100 resize-none
                           focus:outline-none focus:ring-2 focus:ring-blue-500
                           transition"
                >{{ $kategori->deskripsi }}</textarea>
            </div>

            {{-- ACTION BUTTONS --}}
            <div class="flex justify-end gap-4 pt-4">

                {{-- BATAL --}}
                <a href="{{ route('kategori.index') }}"
                    class="px-6 py-2 rounded-lg font-semibold
                            bg-white text-slate-900
                            hover:shadow-[0_0_25px_rgba(255,255,255,0.35)]
                            transition-all hover:-translate-y-0.5">
                        Batal
                </a>

                {{-- UPDATE --}}
                <button
                    type="submit"
                    :disabled="loading"
                    class="relative px-7 py-2 rounded-lg
                           font-semibold text-white
                           bg-gradient-to-r from-blue-700 to-indigo-700
                           transition-all duration-300
                           hover:shadow-[0_0_40px_rgba(59,130,246,0.45)]
                           hover:-translate-y-0.5
                           flex items-center gap-2"
                >
                    {{-- SPINNER --}}
                    <svg x-show="loading"
                         class="w-5 h-5 animate-spin"
                         fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                    </svg>

                    <span x-text="loading ? 'Menyimpan...' : 'Update'"></span>
                </button>

            </div>
        </form>
    </div>
</div>

@endsection