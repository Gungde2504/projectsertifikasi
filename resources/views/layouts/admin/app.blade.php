<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-900 text-slate-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-800 p-6 sticky top-0 h-screen">
        <h1 class="text-xl font-bold mb-6">Sistem Inventaris</h1>

         <nav class="space-y-2">

        {{-- DASHBOARD --}}
        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-4 py-2 rounded-md
                  text-white
                  transition-all duration-300
                  {{ request()->routeIs('dashboard') 
                        ? 'bg-slate-700/70 border-r-4 border-blue-900 shadow-[inset_0_0_0_1px_rgba(30,58,138,0.3)]' 
                        : 'hover:bg-slate-700/70 hover:border-r-4 hover:border-blue-900 hover:shadow-[inset_0_0_0_1px_rgba(30,58,138,0.3)]' }}">
            
            {{-- ICON DASHBOARD --}}
            <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3 10h7V3H3v7zm0 11h7v-9H3v9zm11 0h7v-7h-7v7zm0-18v9h7V3h-7z"/>
            </svg>

            <span>Dashboard</span>
        </a>

        {{-- KATEGORI --}}
        <a href="{{ route('kategori.index') }}"
           class="flex items-center gap-3 px-4 py-2 rounded-md
                  text-white
                  transition-all duration-300
                  {{ request()->routeIs('kategori.*') 
                        ? 'bg-slate-700/70 border-r-4 border-blue-900 shadow-[inset_0_0_0_1px_rgba(30,58,138,0.3)]' 
                        : 'hover:bg-slate-700/70 hover:border-r-4 hover:border-blue-900 hover:shadow-[inset_0_0_0_1px_rgba(30,58,138,0.3)]' }}">
            
            {{-- ICON KATEGORI --}}
            <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>

            <span>Kategori</span>
        </a>

        {{-- BARANG --}}
        <a href="{{ route('barang.index') }}"
           class="flex items-center gap-3 px-4 py-2 rounded-md
                  text-white
                  transition-all duration-300
                  {{ request()->routeIs('barang.*') 
                        ? 'bg-slate-700/70 border-r-4 border-blue-900 shadow-[inset_0_0_0_1px_rgba(30,58,138,0.3)]' 
                        : 'hover:bg-slate-700/70 hover:border-r-4 hover:border-blue-900 hover:shadow-[inset_0_0_0_1px_rgba(30,58,138,0.3)]' }}">
            
            {{-- ICON BARANG --}}
            <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0l-8 4-8-4m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6"/>
            </svg>

            <span>Barang</span>
        </a>

    </nav>

    </aside>

    <!-- Content -->
    <main class="flex-1 p-8">
        @yield('content')
    </main>

</body>
</html>
