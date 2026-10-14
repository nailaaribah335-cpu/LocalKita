<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LocalKita') }} - Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,900&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#FAF5EE] text-gray-900">

    <div class="min-h-screen flex flex-col md:flex-row">
        
        {{-- SIDEBAR --}}
        <aside class="w-full md:w-64 bg-white border-r border-[#E8DCCF] shrink-0 md:min-h-screen flex flex-col shadow-sm relative z-20">
            {{-- Logo --}}
            <div class="h-16 flex items-center px-6 border-b border-[#E8DCCF] bg-white">
                <a href="{{ route('admin.dashboard') }}" class="text-xl font-black text-gray-800 tracking-tight flex items-center gap-2">
                    <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-[#FF4500] to-orange-400 flex items-center justify-center text-white text-sm shadow-md">L</span>
                    LocalKita <span class="text-[10px] bg-[#FF4500] px-1.5 py-0.5 rounded text-white font-bold ml-1">ADMIN</span>
                </a>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 px-4 py-6 flex flex-col gap-2">
                
                <p class="px-2 text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Menu Utama</p>
                
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-bold transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-[#FFF1ED] text-[#FF4500]' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.stores.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-bold transition-colors {{ request()->routeIs('admin.stores.*') ? 'bg-[#FFF1ED] text-[#FF4500]' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    Verifikasi Toko
                </a>

                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-bold transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-[#FFF1ED] text-[#FF4500]' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Pengguna
                </a>

                <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-bold transition-colors {{ request()->routeIs('admin.categories.*') ? 'bg-[#FFF1ED] text-[#FF4500]' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                    Master Kategori
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
            
            {{-- Top Header (Mobile menu & Profile) --}}
            <header class="h-16 bg-[#FAF5EE] sm:bg-transparent border-b sm:border-none border-[#E8DCCF] flex items-center justify-between px-4 sm:px-8 mt-0 sm:mt-4">
                <div>
                    @isset($header)
                        <h2 class="font-black text-2xl text-gray-900 tracking-tight">
                            {{ $header }}
                        </h2>
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
                @if(session('success'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl relative font-bold" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl relative font-bold" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                {{ $slot }}
            </div>

        </main>
    </div>

    @stack('scripts')
</body>
</html>
