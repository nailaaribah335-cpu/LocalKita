<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LocalKita') }} - Seller</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,900&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#FAF5EE] text-gray-900">

    <div class="min-h-screen flex flex-col md:flex-row">
        
        {{-- SIDEBAR --}}
        <aside class="w-full md:w-64 bg-white shrink-0 md:min-h-screen flex flex-col border-r border-[#E8DCCF] shadow-sm relative z-20">
            {{-- Logo --}}
            <div class="h-16 flex items-center px-6 border-b border-[#E8DCCF] bg-white">
                <a href="{{ route('seller.dashboard') }}" class="text-xl font-black text-gray-800 tracking-tight flex items-center gap-2">
                    <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-[#FF4500] to-orange-400 flex items-center justify-center text-white text-sm shadow-md">L</span>
                    LocalKita <span class="text-[10px] bg-[#FF4500] px-1.5 py-0.5 rounded text-white font-bold ml-1">SELLER</span>
                </a>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 px-4 py-6 flex flex-col gap-2">
                
                <p class="px-2 text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Toko Anda</p>
                
                <a href="{{ route('seller.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-bold transition-colors {{ request()->routeIs('seller.dashboard') ? 'bg-[#FFF1ED] text-[#FF4500]' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>

                <a href="{{ route('seller.store.edit') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-bold transition-colors {{ request()->routeIs('seller.store.*') ? 'bg-[#FFF1ED] text-[#FF4500]' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    Profil & Peta
                </a>

                <a href="{{ route('seller.products.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-bold transition-colors {{ request()->routeIs('seller.products.*') ? 'bg-[#FFF1ED] text-[#FF4500]' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                    Katalog Menu
                </a>

            </nav>

            {{-- Footer / Logout --}}
            <div class="p-4 border-t border-[#E8DCCF]">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg font-bold text-gray-500 hover:bg-red-50 hover:text-red-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 flex flex-col min-w-0">
            
            {{-- Top Header --}}
            <header class="h-16 bg-[#FAF5EE] sm:bg-transparent border-b sm:border-none border-[#E8DCCF] flex items-center justify-between px-4 sm:px-8 mt-0 sm:mt-4">
                <div>
                    @isset($header)
                        <div class="font-black text-2xl text-gray-900 tracking-tight">
                            {{ $header }}
                        </div>
                    @endisset
                </div>
                <div class="flex items-center gap-3 bg-white px-4 py-2 rounded-full shadow-[0_2px_10px_rgba(0,0,0,0.03)] border border-[#E8DCCF] hidden sm:flex">
                    <span class="text-sm font-bold text-gray-600">Halo, {{ Auth::user()->name }}</span>
                    <div class="w-7 h-7 rounded-full bg-[#FFF1ED] flex items-center justify-center text-[#FF4500] font-black border border-[#FFC2B0]">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <div class="p-4 sm:p-8 flex-1 overflow-y-auto">
                {{ $slot }}
            </div>

        </main>
    </div>

    @stack('scripts')
</body>
</html>
