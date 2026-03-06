<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Sistem Inventaris</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-950 via-slate-900 to-slate-800 text-slate-100">

    <div
        class="w-full max-w-md bg-slate-900/80 backdrop-blur
               rounded-2xl shadow-2xl p-8
               animate-fade-in">

        {{-- TITLE --}}
        <h1 
            id="typewriter"
            class="text-3xl font-bold text-center mb-2 text-slate-100 tracking-wide 
           min-h-[2.5rem]">
            Welcome Back
        </h1>
        <p class="text-center text-slate-400 mb-8">
            Login ke Sistem Inventaris
        </p>

        {{-- SESSION STATUS --}}
        <x-auth-session-status class="mb-4 text-green-400" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf
            
{{-- EMAIL --}}
<div>
    <label class="block text-sm mb-1 text-slate-400">
        Email
    </label>
    <input
        type="email"
        name="email"
        required
        autofocus
        placeholder="email@example.com"
        class="w-full px-4 py-3 rounded-lg
               bg-slate-900 border border-blue-900
               text-slate-100 placeholder-slate-500
               transition-all duration-300 ease-out
               hover:border-blue-700
               hover:shadow-[0_0_30px_rgba(37,99,235,0.25)]
               focus:outline-none
               focus:border-blue-600
               focus:ring-2 focus:ring-blue-600
               focus:shadow-[0_0_35px_rgba(37,99,235,0.45)]"
    >
    <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-400" />
</div>

           {{-- PASSWORD --}}
<div>
    <label class="block text-sm mb-1 text-slate-400">
        Password
    </label>
    <input
        type="password"
        name="password"
        required
        placeholder="••••••••"
        class="w-full px-4 py-3 rounded-lg
               bg-slate-900 border border-blue-900
               text-slate-100 placeholder-slate-500
               transition-all duration-300 ease-out
               hover:border-blue-700
               hover:shadow-[0_0_30px_rgba(37,99,235,0.25)]
               focus:outline-none
               focus:border-blue-600
               focus:ring-2 focus:ring-blue-600
               focus:shadow-[0_0_35px_rgba(37,99,235,0.45)]"
    >
    <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-400" />
</div>
            {{-- REMEMBER --}}
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2 text-slate-400">
                    <input type="checkbox" name="remember"
                           class="rounded bg-slate-700 border-slate-600 text-blue-500">
                    Remember me
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="text-blue-400 hover:text-blue-300 transition">
                        Forgot password?
                    </a>
                @endif
            </div>

            {{-- BUTTON --}}
            <button
    type="submit"
    class="w-full py-3 rounded-xl font-semibold text-white
           bg-gradient-to-r from-blue-800 to-blue-950
           transition-all duration-300 ease-out
           hover:from-blue-700 hover:to-blue-900
           hover:-translate-y-0.5
           hover:shadow-[0_0_45px_rgba(37,99,235,0.6)]
           active:translate-y-0
           focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-slate-900"
>
    Log In
</button>
        </form>
    </div>

    {{-- ANIMATION --}}
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }
    </style>
    <script>
      const text = "Welcome Back";
    const typingSpeed = 160;   // kecepatan ketik
    const pauseAtEnd = 1200;   // jeda saat sampai huruf terakhir

    const el = document.getElementById("typewriter");
    let index = 0;

    function loopTyping() {
        // ketik sampai akhir
        if (index < text.length) {
            el.textContent += text[index];
            index++;
            setTimeout(loopTyping, typingSpeed);
        } 
        // sampai huruf terakhir → tunggu → ulang dari awal
        else {
            setTimeout(() => {
                el.textContent = "";
                index = 0;
                loopTyping();
            }, pauseAtEnd);
        }
    }

    // init
    el.textContent = "";
    loopTyping();
</script>
</body>
</html>