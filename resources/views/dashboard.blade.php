@extends('layouts.admin.app')

@section('content')
<div class="max-w-7xl mx-auto text-slate-100  animate-page">

    <div class="flex items-center justify-between mb-8">

    {{-- TITLE --}}
    <h1 class="text-3xl font-bold text-slate-100">
        Dashboard
    </h1>

    {{-- USER PROFILE --}}
    <div class="flex items-center gap-4">

        {{-- USER INFO --}}
        <div class="text-right">
            <p class="text-sm text-slate-400">Welcome back</p>
            <p class="font-semibold text-slate-100">
                {{ auth()->user()->name }}
            </p>
        </div>

        {{-- AVATAR --}}
        <div
            class="w-10 h-10 rounded-full
                   bg-gradient-to-br from-blue-800 to-blue-500
                   flex items-center justify-center
                   text-white font-bold shadow">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>
         {{-- LOGOUT --}}
        <div class="mt-auto  border-t border-slate-800 transition-all duration-300 ease-out
                       hover:from-pink-400 hover:to-rose-400
                       hover:shadow-[0_0_40px_rgba(236,72,153,0.35)]
                       hover:-translate-y-0.5
                       active:scale-95">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                    class="w-full flex items-center gap-3
                        px-4 py-2 rounded-lg
                        bg-gradient-to-r from-red-500 to-pink-600">
                    <!-- Icon (opsional) -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-14V3" />
                    </svg>

                    Logout
                </button>
            </form>
        </div>

    </div>
</div>

    {{-- STATISTIK --}}
<div class="grid grid-cols-3 gap-6 mb-8 animate-fade-up delay-1">

    {{-- KATEGORI --}}
    <div
        class="group bg-slate-800 p-6 rounded-xl shadow
               border-l-4 border-blue-900
               transition-all duration-300
               hover:-translate-y-1
               hover:shadow-[0_0_40px_rgba(59,130,246,0.25)]">

        <div class="flex items-center justify-between">
            <div>
                <p class="text-slate-400 text-sm">Total Kategori</p>
                <h2 class="text-3xl font-bold mt-1">{{ $totalKategori }}</h2>
            </div>

            <div
                class="p-3 rounded-xl bg-blue-900/20 text-blue-400
                       transition group-hover:scale-110 group-hover:rotate-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 7h18M3 12h18M3 17h18" />
                </svg>
            </div>
        </div>
    </div>

    {{-- BARANG --}}
    <div
        class="group bg-slate-800 p-6 rounded-xl shadow
               border-l-4 border-blue-900
               transition-all duration-300
               hover:-translate-y-1
               hover:shadow-[0_0_40px_rgba(59,130,246,0.25)]">

        <div class="flex items-center justify-between">
            <div>
                <p class="text-slate-400 text-sm">Total Barang</p>
                <h2 class="text-3xl font-bold mt-1">{{ $totalBarang }}</h2>
            </div>

            <div
                class="p-3 rounded-xl bg-indigo-900/20 text-indigo-400
                       transition group-hover:scale-110 group-hover:-rotate-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0l-8 4-8-4" />
                </svg>
            </div>
        </div>
    </div>

    {{-- STOK --}}
    <div
        class="group bg-slate-800 p-6 rounded-xl shadow
               border-l-4 border-blue-900
               transition-all duration-300
               hover:-translate-y-1
               hover:shadow-[0_0_40px_rgba(59,130,246,0.25)]">

        <div class="flex items-center justify-between">
            <div>
                <p class="text-slate-400 text-sm">Total Stok</p>
                <h2 class="text-3xl font-bold mt-1">{{ $totalStok }}</h2>
            </div>

            <div
                class="p-3 rounded-xl bg-emerald-900/20 text-emerald-400
                       transition group-hover:scale-110 group-hover:rotate-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 3h18v4H3V3zm0 6h18v12H3V9z" />
                </svg>
            </div>
        </div>
    </div>

</div>


    {{-- CHART --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8 animate-fade-up delay-2">

        {{-- BAR CHART --}}
        <div class="bg-slate-800 rounded-xl p-6 shadow
                    transition hover:shadow-[0_0_40px_rgba(59,130,246,0.25)]">
            <h3 class="text-lg font-semibold mb-4">
                Stok per Kategori
            </h3>
            <div class="h-[320px]">
                <canvas id="stokBarChart"></canvas>
            </div>
        </div>

        {{-- PIE CHART --}}
        <div class="bg-slate-800 rounded-xl p-6 shadow
                    transition hover:shadow-[0_0_40px_rgba(139,92,246,0.25)]">
            <h3 class="text-lg font-semibold mb-4">
                Distribusi Stok
            </h3>
            <div class="h-[320px] flex items-center justify-center">
                <canvas id="stokPieChart"></canvas>
            </div>
        </div>

    </div>

</div>
<style>
/* =========================
   PAGE LOAD ANIMATION
========================= */

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(24px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Base */
.animate-page {
    animation: fadeUp 0.9s ease-out forwards;
}

/* Fade up reusable */
.animate-fade-up {
    opacity: 0;
    animation: fadeUp 0.8s ease-out forwards;
}

/* Delay utilities */
.delay-1 { animation-delay: 0.15s; }
.delay-2 { animation-delay: 0.3s; }
.delay-3 { animation-delay: 0.45s; }

/* Prevent flash */
.animate-fade-up,
.animate-page {
    will-change: transform, opacity;
}
</style>


{{-- CHART JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
/* =======================
   BAR CHART (IMPROVED)
======================= */
const barCtx = document.getElementById('stokBarChart').getContext('2d');

// 🔹 Soft blue gradient (dark-mode friendly)
const barGradient = barCtx.createLinearGradient(0, 0, 0, 320);
barGradient.addColorStop(0, 'rgba(147,197,253,0.85)'); // blue-300 soft
barGradient.addColorStop(1, 'rgba(59,130,246,0.75)');  // blue-500 muted

new Chart(barCtx, {
    type: 'bar',
    data: {
        labels: @json($kategoriLabels),
        datasets: [{
            label: 'Total Stok',
            data: @json($stokPerKategori),
            backgroundColor: barGradient,

            // 🔹 Rounded modern bar
            borderRadius: 10,
            borderSkipped: false,

            // 🔹 KECILKAN BAR
            barThickness: 22,        // lebar bar (px)
            maxBarThickness: 28,     // batas maksimal
            categoryPercentage: 0.6, // jarak antar kategori
            barPercentage: 0.7,      // kepadatan bar dalam kategori

            // 🔹 Hover effect (soft)
            hoverBackgroundColor: 'rgba(96,165,250,0.9)',
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,

        animation: {
            duration: 1400,
            easing: 'easeOutCubic'
        },

        plugins: {
            legend: {
                labels: {
                    color: '#cbd5f5',
                    font: {
                        size: 13,
                        weight: '500'
                    }
                }
            },
            tooltip: {
                backgroundColor: 'rgba(15,23,42,0.95)',
                titleColor: '#e5e7eb',
                bodyColor: '#cbd5f5',
                borderColor: 'rgba(59,130,246,0.4)',
                borderWidth: 1,
                padding: 12,
                cornerRadius: 10
            }
        },

        scales: {
            x: {
                ticks: {
                    color: '#94a3b8',
                    font: { size: 12 }
                },
                grid: {
                    color: 'rgba(30,41,59,0.6)'
                }
            },
            y: {
                ticks: {
                    color: '#94a3b8',
                    font: { size: 12 }
                },
                grid: {
                    color: 'rgba(30,41,59,0.6)'
                }
            }
        }
    }
});

/* =======================
   PIE CHART
======================= */
const pieCtx = document.getElementById('stokPieChart');

const softShadowPlugin = {
    id: 'softShadow',
    beforeDraw(chart) {
        const ctx = chart.ctx;
        ctx.save();
        ctx.shadowColor = 'rgba(148,163,184,0.25)'; // slate soft
        ctx.shadowBlur = 14;
        ctx.shadowOffsetX = 0;
        ctx.shadowOffsetY = 6;
    },
    afterDraw(chart) {
        chart.ctx.restore();
    }
};

new Chart(pieCtx, {
    type: 'pie',
    data: {
        labels: @json($kategoriLabels),
        datasets: [{
            data: @json($stokPerKategori),
       backgroundColor: [
    'rgba(147,197,253,0.65)', // blue-300 soft
    'rgba(96,165,250,0.65)',  // blue-400 soft
    'rgba(59,130,246,0.60)',  // blue-500 muted
    'rgba(37,99,235,0.55)',   // blue-600 muted
    'rgba(29,78,216,0.50)',   // blue-700 muted
    'rgba(30,64,175,0.45)',   // blue-800 muted
],
            borderWidth: 1,
            borderColor: 'rgba(15,23,42,0.4)', // sangat soft (dark slate)
            hoverBorderWidth: 1,
            hoverBorderColor: 'rgba(203,213,225,0.35)', // ❌ tidak terang
            hoverOffset: 10,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        animation: {
            animateRotate: true,
            duration: 900,
            easing: 'easeOutQuart'
        },
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    color: '#cbd5f5',
                    padding: 18,
                    boxWidth: 10,
                    boxHeight: 10,
                    usePointStyle: true,
                    pointStyle: 'circle'
                }
            },
            tooltip: {
                backgroundColor: 'rgba(15,23,42,0.95)',
                titleColor: '#e5e7eb',
                bodyColor: '#cbd5f5',
                padding: 12,
                cornerRadius: 8
            }
        }
    },
    plugins: [softShadowPlugin]
});
</script>
<script>
    // ======================
    // PAGE LOAD ANIMATION
    // ======================
    window.addEventListener('load', () => {
        const page = document.getElementById('page');

        if (page) {
            setTimeout(() => {
                page.classList.remove(
                    'opacity-0',
                    'translate-y-6',
                    'scale-[0.97]'
                );
                page.classList.add(
                    'opacity-100',
                    'translate-y-0',
                    'scale-100'
                );
            }, 120); // delay halus
        }
    });
</script>
@endsection