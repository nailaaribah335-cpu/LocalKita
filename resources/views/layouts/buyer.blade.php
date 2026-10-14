<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'LocalKita') }}</title>

    <!-- Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-slate-800 bg-[#fdfaf6] selection:bg-gradient-to-r selection:from-red-500 selection:to-orange-500 selection:text-white min-h-screen flex flex-col pb-20 md:pb-0">

    {{-- TOP PROMO BANNER --}}
    <div id="promo-banner" class="w-full bg-gradient-to-r from-red-700 via-red-600 to-red-700 text-white py-2.5 px-4 relative overflow-hidden">
        {{-- Decorative waves --}}
        <div class="absolute inset-0 opacity-10" style="background-image: url(\"data:image/svg+xml,%3Csvg width='60' height='20' viewBox='0 0 60 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 10 Q15 0 30 10 Q45 20 60 10' stroke='white' stroke-width='2' fill='none'/%3E%3C/svg%3E\"); background-repeat: repeat-x; background-size: 60px 20px;"></div>
        <div class="max-w-7xl mx-auto flex items-center justify-center gap-3 text-center relative z-10">
            <span class="text-yellow-300 text-base animate-pulse">★</span>
            <p class="text-xs sm:text-sm font-black tracking-wide uppercase">
                🏪 <span class="text-yellow-300">Pusat UMKM Tanah Seratus</span> — Cari Kuliner, Jasa &amp; Kelontong Terdekat!
                <span class="hidden sm:inline text-white/70 font-semibold normal-case tracking-normal"> · Terintegrasi Google Maps &amp; Patokan Warga</span>
            </p>
            <span class="text-yellow-300 text-base animate-pulse">★</span>
            <button onclick="document.getElementById('promo-banner').style.display='none'" class="absolute right-4 top-1/2 -translate-y-1/2 text-white/60 hover:text-white transition-colors text-lg leading-none" aria-label="Tutup banner">&times;</button>
        </div>
    </div>

    {{-- Navbar Anti-Lompat: Sticky Top, Fixed Height, Glassmorphism --}}
    <nav class="sticky top-0 z-50 w-full h-[72px] bg-[#fdfaf6]/70 backdrop-blur-xl border-b border-gray-200/60 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
            <div class="flex justify-between items-center h-full">
                
                {{-- Logo & Links --}}
                <div class="flex items-center gap-8">
                    <a href="{{ route('welcome') }}" class="flex items-center gap-2.5 group">
                        {{-- Map Pin Marker Logo --}}
                        <div class="group-hover:scale-105 group-hover:-translate-y-0.5 transition-all duration-300">
                            <svg width="38" height="44" viewBox="0 0 38 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                {{-- Pin body --}}
                                <path d="M19 0C8.507 0 0 8.507 0 19c0 13.255 17.1 24.2 18.02 24.78a1.8 1.8 0 001.96 0C20.9 43.2 38 32.255 38 19 38 8.507 29.493 0 19 0z" fill="url(#pin_grad)"/>
                                {{-- Inner circle ring --}}
                                <circle cx="19" cy="19" r="9" stroke="white" stroke-width="2.2" fill="none"/>
                                <circle cx="19" cy="19" r="5" fill="white"/>
                                {{-- Shadow ellipse at base --}}
                                <ellipse cx="19" cy="43" rx="8" ry="2.5" fill="#7f1d1d" opacity="0.25"/>
                                <defs>
                                    <linearGradient id="pin_grad" x1="0" y1="0" x2="38" y2="44" gradientUnits="userSpaceOnUse">
                                        <stop offset="0%" stop-color="#ef4444"/>
                                        <stop offset="100%" stop-color="#b91c1c"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <div>
                            <span class="text-xl font-black tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-red-800 leading-none block">LocalKita</span>
                            <span class="text-[10px] font-extrabold text-slate-500 uppercase tracking-widest block mt-0.5">Direktori UMKM</span>
                        </div>
                    </a>

                    <div class="hidden md:flex space-x-6 items-center">
                        <a href="{{ route('welcome') }}" class="text-sm font-bold {{ request()->routeIs('welcome') ? 'text-orange-600' : 'text-slate-600 hover:text-orange-500' }} transition-colors">
                            Beranda
                        </a>
                        <a href="{{ route('buyer.index') }}" class="text-sm font-bold {{ request()->routeIs('buyer.index') ? 'text-orange-600 bg-orange-100/50 px-4 py-2 rounded-full' : 'text-slate-600 hover:text-orange-500 px-4 py-2' }} transition-colors">
                            Direktori UMKM
                        </a>
                        <a href="/top-100" class="text-sm font-bold {{ request()->is('top-100') ? 'text-orange-600' : 'text-slate-600 hover:text-orange-500' }} transition-colors">
                            Top 100
                        </a>
                        @auth
                        <a href="{{ route('buyer.bookmarks.index') }}" class="text-sm font-bold {{ request()->routeIs('buyer.bookmarks.index') ? 'text-orange-600' : 'text-slate-600 hover:text-orange-500' }} transition-colors flex items-center gap-1">
                            Favorit ❤️
                        </a>
                        @endauth
                    </div>
                </div>

                {{-- Auth / Actions --}}
                <div class="flex items-center gap-4">
                    @auth
                        <div class="flex items-center gap-3">
                            <a href="{{ route('dashboard') }}" class="bg-gradient-to-r from-red-500 to-orange-500 hover:from-red-600 hover:to-orange-600 text-white text-sm font-bold px-6 py-2.5 rounded-full shadow-md shadow-orange-500/25 transition-all hover:scale-105 hover:shadow-orange-500/40">
                                Dashboard
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="m-0 hidden md:block">
                                @csrf
                                <button type="submit" class="text-sm font-bold text-slate-400 hover:text-red-500 transition-colors py-2 px-2">
                                    Keluar
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-orange-600 hover:text-orange-700 bg-orange-50/90 hover:bg-orange-100 border border-orange-200 px-4 sm:px-5 py-2 sm:py-2.5 rounded-full shadow-sm hover:shadow transition-all duration-200 hover:scale-105">
                            <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            <span>Masuk</span>
                        </a>
                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-red-500 to-orange-500 hover:from-red-600 hover:to-orange-600 text-white text-sm font-bold px-6 py-2.5 rounded-full shadow-md shadow-orange-500/25 transition-all hover:scale-105 hover:shadow-orange-500/40">
                            Daftar UMKM
                        </a>
                    @endauth
                </div>

            </div>
        </div>
    </nav>

    <main class="flex-grow w-full">
        @yield('content')
    </main>

    {{-- Mobile Bottom Navigation Dock (Mobile-First Experience) --}}
    <div class="md:hidden fixed bottom-0 left-0 right-0 z-40 bg-[#fdfaf6]/90 backdrop-blur-xl border-t border-gray-200/60 py-3 px-6 shadow-[0_-10px_40px_rgba(0,0,0,0.05)] pb-safe">
        <div class="flex justify-around items-center max-w-md mx-auto">
            <a href="{{ route('welcome') }}" class="flex flex-col items-center gap-1 {{ request()->routeIs('welcome') ? 'text-orange-600' : 'text-slate-400 hover:text-orange-500' }} transition-colors">
                <span class="text-xl">🏠</span>
                <span class="text-[10px] font-extrabold">Beranda</span>
            </a>
            <a href="{{ route('buyer.index') }}" class="flex flex-col items-center gap-1 {{ request()->routeIs('buyer.index') ? 'text-orange-600' : 'text-slate-400 hover:text-orange-500' }} transition-colors">
                <div class="w-10 h-10 rounded-full {{ request()->routeIs('buyer.index') ? 'bg-gradient-to-r from-red-500 to-orange-500 text-white shadow-md shadow-orange-500/30' : 'bg-transparent text-slate-400' }} flex items-center justify-center text-lg transition-all">
                    🏬
                </div>
                <span class="text-[10px] font-extrabold">Direktori</span>
            </a>
            @auth
            <a href="{{ route('buyer.bookmarks.index') }}" class="flex flex-col items-center gap-1 {{ request()->routeIs('buyer.bookmarks.index') ? 'text-orange-600' : 'text-slate-400 hover:text-orange-500' }} transition-colors">
                <span class="text-xl">❤️</span>
                <span class="text-[10px] font-extrabold">Favorit</span>
            </a>
            <a href="{{ route('dashboard') }}" class="flex flex-col items-center gap-1 text-slate-400 hover:text-orange-500 transition-colors">
                <span class="text-xl">👤</span>
                <span class="text-[10px] font-extrabold">Akun</span>
            </a>
            @else
            <a href="{{ route('login') }}" class="flex flex-col items-center gap-1 text-slate-400 hover:text-orange-500 transition-colors">
                <span class="text-xl">👤</span>
                <span class="text-[10px] font-extrabold">Masuk</span>
            </a>
            @endauth
        </div>
    </div>

    {{-- Footer --}}
    <footer class="relative bg-gradient-to-br from-[#7f1d1d] via-[#991b1b] to-[#7f1d1d] text-white overflow-hidden mt-16" id="site-footer">

        {{-- Wave divider at top --}}
        <div class="absolute top-0 left-0 right-0 overflow-hidden leading-none pointer-events-none" style="height:60px;">
            <svg viewBox="0 0 1440 60" preserveAspectRatio="none" class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,30 C240,60 480,0 720,30 C960,60 1200,0 1440,30 L1440,0 L0,0 Z" fill="#fdfaf6"/>
            </svg>
        </div>

        {{-- Ambient blobs --}}
        <div class="absolute top-10 left-0 w-80 h-80 bg-red-900/40 rounded-full -translate-x-1/2 blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-red-950/50 rounded-full translate-x-1/3 translate-y-1/3 blur-3xl pointer-events-none"></div>
        <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-orange-900/10 rounded-full -translate-x-1/2 -translate-y-1/2 blur-2xl pointer-events-none"></div>

        {{-- Grid lines decoration --}}
        <div class="absolute inset-0 opacity-[0.04] pointer-events-none" style="background-image: repeating-linear-gradient(90deg, white 0, white 1px, transparent 0, transparent 50%); background-size: 80px;"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-10">

            {{-- TOP ROW: Brand + Tagline --}}
            <div class="footer-reveal flex flex-col md:flex-row items-start md:items-center justify-between gap-8 mb-12 pb-10 border-b border-white/10">
                {{-- Brand --}}
                <div class="flex items-center gap-4">
                    {{-- Animated pin logo --}}
                    <div class="footer-pin-logo relative shrink-0">
                        <svg width="44" height="52" viewBox="0 0 38 44" fill="none" xmlns="http://www.w3.org/2000/svg" class="drop-shadow-2xl">
                            <path d="M19 0C8.507 0 0 8.507 0 19c0 13.255 17.1 24.2 18.02 24.78a1.8 1.8 0 001.96 0C20.9 43.2 38 32.255 38 19 38 8.507 29.493 0 19 0z" fill="url(#footer_pin_main)"/>
                            <circle cx="19" cy="19" r="9" stroke="white" stroke-width="2.2" fill="none"/>
                            <circle cx="19" cy="19" r="5" fill="white"/>
                            <ellipse cx="19" cy="43" rx="8" ry="2.5" fill="black" opacity="0.2"/>
                            <defs>
                                <linearGradient id="footer_pin_main" x1="0" y1="0" x2="38" y2="44" gradientUnits="userSpaceOnUse">
                                    <stop offset="0%" stop-color="#fbbf24"/>
                                    <stop offset="100%" stop-color="#f59e0b"/>
                                </linearGradient>
                            </defs>
                        </svg>
                        <div class="absolute -top-1 -right-1 w-3 h-3 bg-green-400 rounded-full border-2 border-[#991b1b] animate-pulse"></div>
                    </div>
                    <div>
                        <span class="font-black text-2xl tracking-tight block text-white">LocalKita</span>
                        <span class="text-xs font-bold text-white/50 uppercase tracking-widest block">Direktori UMKM Lokal Terlengkap</span>
                    </div>
                </div>

                {{-- Tagline + CTA --}}
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                    <p class="text-white/60 text-sm font-medium max-w-xs leading-relaxed">
                        Platform UMKM Tanah Seratus — dukung bisnis lokal, temukan yang terdekat.
                    </p>
                    <a href="{{ route('register') }}" class="shrink-0 inline-flex items-center gap-2 bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-300 hover:to-yellow-400 text-red-900 font-black text-sm px-6 py-3 rounded-2xl shadow-lg shadow-yellow-500/20 hover:shadow-yellow-400/30 hover:scale-105 active:scale-95 transition-all">
                        <span>🏪 Daftarkan UMKM</span>
                    </a>
                </div>
            </div>

            {{-- QUICK MENU GRID --}}
            <div class="footer-reveal grid grid-cols-2 md:grid-cols-4 gap-8 mb-12">

                {{-- Kolom 1: Jelajahi --}}
                <div>
                    <h4 class="text-yellow-300 font-black text-xs uppercase tracking-widest mb-4 flex items-center gap-2">
                        <span>🗺️</span> Jelajahi
                    </h4>
                    <ul class="space-y-2.5">
                        <li>
                            <a href="{{ route('welcome') }}" class="footer-link group flex items-center gap-2 text-white/65 hover:text-yellow-300 text-sm font-semibold transition-all duration-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-white/20 group-hover:bg-yellow-300 transition-colors shrink-0"></span>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('buyer.index') }}" class="footer-link group flex items-center gap-2 text-white/65 hover:text-yellow-300 text-sm font-semibold transition-all duration-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-white/20 group-hover:bg-yellow-300 transition-colors shrink-0"></span>
                                Direktori UMKM
                            </a>
                        </li>
                        <li>
                            <a href="/top-100" class="footer-link group flex items-center gap-2 text-white/65 hover:text-yellow-300 text-sm font-semibold transition-all duration-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-white/20 group-hover:bg-yellow-300 transition-colors shrink-0"></span>
                                Top 100 UMKM
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('buyer.index') }}?kategori=kuliner" class="footer-link group flex items-center gap-2 text-white/65 hover:text-yellow-300 text-sm font-semibold transition-all duration-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-white/20 group-hover:bg-yellow-300 transition-colors shrink-0"></span>
                                Kuliner Terdekat
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('buyer.index') }}?kategori=jasa" class="footer-link group flex items-center gap-2 text-white/65 hover:text-yellow-300 text-sm font-semibold transition-all duration-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-white/20 group-hover:bg-yellow-300 transition-colors shrink-0"></span>
                                Jasa & Servis
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Kolom 2: Akun --}}
                <div>
                    <h4 class="text-yellow-300 font-black text-xs uppercase tracking-widest mb-4 flex items-center gap-2">
                        <span>👤</span> Akun
                    </h4>
                    <ul class="space-y-2.5">
                        @auth
                        <li>
                            <a href="{{ route('dashboard') }}" class="footer-link group flex items-center gap-2 text-white/65 hover:text-yellow-300 text-sm font-semibold transition-all duration-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-white/20 group-hover:bg-yellow-300 transition-colors shrink-0"></span>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('buyer.bookmarks.index') }}" class="footer-link group flex items-center gap-2 text-white/65 hover:text-yellow-300 text-sm font-semibold transition-all duration-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-white/20 group-hover:bg-yellow-300 transition-colors shrink-0"></span>
                                Favorit Saya ❤️
                            </a>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('login') }}" class="footer-link group flex items-center gap-2 text-white/65 hover:text-yellow-300 text-sm font-semibold transition-all duration-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-white/20 group-hover:bg-yellow-300 transition-colors shrink-0"></span>
                                Masuk
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="footer-link group flex items-center gap-2 text-white/65 hover:text-yellow-300 text-sm font-semibold transition-all duration-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-white/20 group-hover:bg-yellow-300 transition-colors shrink-0"></span>
                                Daftar Akun
                            </a>
                        </li>
                        @endauth
                        <li>
                            <a href="{{ route('register') }}" class="footer-link group flex items-center gap-2 text-white/65 hover:text-yellow-300 text-sm font-semibold transition-all duration-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-white/20 group-hover:bg-yellow-300 transition-colors shrink-0"></span>
                                Daftarkan UMKM
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Kolom 3: Kategori --}}
                <div>
                    <h4 class="text-yellow-300 font-black text-xs uppercase tracking-widest mb-4 flex items-center gap-2">
                        <span>🏷️</span> Kategori
                    </h4>
                    <ul class="space-y-2.5">
                        <li>
                            <a href="{{ route('buyer.index') }}?kategori=makanan" class="footer-link group flex items-center gap-2 text-white/65 hover:text-yellow-300 text-sm font-semibold transition-all duration-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-white/20 group-hover:bg-yellow-300 transition-colors shrink-0"></span>
                                🍜 Makanan & Minuman
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('buyer.index') }}?kategori=kelontong" class="footer-link group flex items-center gap-2 text-white/65 hover:text-yellow-300 text-sm font-semibold transition-all duration-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-white/20 group-hover:bg-yellow-300 transition-colors shrink-0"></span>
                                🛒 Kelontong & Toko
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('buyer.index') }}?kategori=bengkel" class="footer-link group flex items-center gap-2 text-white/65 hover:text-yellow-300 text-sm font-semibold transition-all duration-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-white/20 group-hover:bg-yellow-300 transition-colors shrink-0"></span>
                                🔧 Bengkel & Servis
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('buyer.index') }}?kategori=fashion" class="footer-link group flex items-center gap-2 text-white/65 hover:text-yellow-300 text-sm font-semibold transition-all duration-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-white/20 group-hover:bg-yellow-300 transition-colors shrink-0"></span>
                                👗 Fashion & Pakaian
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('buyer.index') }}?kategori=jasa" class="footer-link group flex items-center gap-2 text-white/65 hover:text-yellow-300 text-sm font-semibold transition-all duration-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-white/20 group-hover:bg-yellow-300 transition-colors shrink-0"></span>
                                💼 Jasa Panggilan
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Kolom 4: Hubungi --}}
                <div>
                    <h4 class="text-yellow-300 font-black text-xs uppercase tracking-widest mb-4 flex items-center gap-2">
                        <span>📡</span> Hubungi
                    </h4>
                    <ul class="space-y-2.5">
                        <li class="text-white/65 text-sm font-semibold flex items-start gap-2">
                            <span class="mt-0.5 shrink-0">📍</span>
                            <span>Tanah Seratus, Ciledug, Kota Tangerang.</span>
                        </li>
                        <li>
                            <a href="https://wa.me/6281234567890" target="_blank" rel="noopener" class="footer-link group flex items-center gap-2 text-white/65 hover:text-green-300 text-sm font-semibold transition-all duration-200">
                                <span class="shrink-0">💬</span>
                                WhatsApp Kami
                            </a>
                        </li>
                    </ul>

                    {{-- Social icons --}}
                    <div class="mt-5 flex items-center gap-3">
                        <a href="#" class="w-9 h-9 rounded-xl bg-white/10 hover:bg-yellow-400/20 border border-white/10 hover:border-yellow-300/30 flex items-center justify-center text-white/60 hover:text-yellow-300 transition-all hover:scale-110 text-base" title="Instagram">
                            📸
                        </a>
                        <a href="#" class="w-9 h-9 rounded-xl bg-white/10 hover:bg-green-400/20 border border-white/10 hover:border-green-300/30 flex items-center justify-center text-white/60 hover:text-green-300 transition-all hover:scale-110 text-base" title="WhatsApp">
                            💬
                        </a>
                        <a href="#" class="w-9 h-9 rounded-xl bg-white/10 hover:bg-blue-400/20 border border-white/10 hover:border-blue-300/30 flex items-center justify-center text-white/60 hover:text-blue-300 transition-all hover:scale-110 text-base" title="Facebook">
                            📘
                        </a>
                    </div>
                </div>
            </div>

            {{-- BOTTOM ROW --}}
            <div class="footer-reveal border-t border-white/10 pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-center">
                <p class="text-white/40 text-xs font-medium">
                    &copy; {{ date('Y') }} <span class="text-white/60 font-bold">LocalKita</span>. Dukung UMKM, Majukan Bisnis Warga. 🇮🇩
                </p>
                <div class="flex items-center gap-1 text-white/30 text-xs font-medium">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                    <span>Semua sistem aktif</span>
                </div>
            </div>
        </div>
    </footer>

    <style>
    /* Footer pin bounce */
    .footer-pin-logo { animation: footerPinBounce 3s ease-in-out infinite; }
    @keyframes footerPinBounce {
        0%, 100% { transform: translateY(0); }
        50%       { transform: translateY(-6px); }
    }
    /* Footer link hover slide */
    .footer-link { position: relative; }
    .footer-link:hover { padding-left: 4px; }
    /* Scroll reveal */
    .footer-reveal {
        opacity: 0;
        transform: translateY(28px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .footer-reveal.visible {
        opacity: 1;
        transform: translateY(0);
    }
    </style>

    <script>
    // Footer scroll-reveal observer
    (function () {
        const els = document.querySelectorAll('.footer-reveal');
        if (!els.length) return;
        const obs = new IntersectionObserver((entries) => {
            entries.forEach((entry, idx) => {
                if (entry.isIntersecting) {
                    setTimeout(() => entry.target.classList.add('visible'), idx * 120);
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        els.forEach(el => obs.observe(el));
    })();
    </script>

    @stack('scripts')
</body>
</html>