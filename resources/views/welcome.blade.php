@extends('layouts.buyer')

@section('content')
{{-- HERO BANNER UMKM --}}
<section class="relative overflow-hidden bg-gradient-to-br from-[#8B0000] via-[#B22222] to-[#8B0000] px-4 sm:px-8 pt-10 sm:pt-14 pb-16 sm:pb-20 lg:pb-24">

    {{-- Decorative wavy lines background --}}
    <div class="absolute inset-0 opacity-[0.07] pointer-events-none" style="background-image: repeating-linear-gradient(0deg, transparent, transparent 38px, rgba(255,255,255,0.5) 38px, rgba(255,255,255,0.5) 40px), repeating-linear-gradient(90deg, transparent, transparent 38px, rgba(255,255,255,0.5) 38px, rgba(255,255,255,0.5) 40px);"></div>

    {{-- Blob decorations --}}
    <div class="absolute top-0 left-0 w-72 h-72 bg-red-900/50 rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-red-950/60 rounded-full translate-x-1/3 translate-y-1/3 blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-6 lg:gap-10">

            {{-- LEFT: Text Content --}}
            <div class="flex-1 text-center lg:text-left">
                {{-- Welcome tag --}}
                <div class="inline-flex items-center gap-2 bg-white/15 backdrop-blur-sm border border-white/20 px-4 py-1.5 rounded-full mb-5">
                    <span class="text-yellow-300 animate-pulse">★</span>
                    <span class="text-white text-xs sm:text-sm font-bold tracking-wide">Selamat Datang di LocalKita!</span>
                    <span class="text-yellow-300 animate-pulse">★</span>
                </div>

                {{-- Main heading --}}
                <h1 class="text-white font-black leading-tight tracking-tight">
                    <span class="block text-xl sm:text-2xl font-extrabold text-yellow-300 mb-1 drop-shadow-md">Pusat UMKM</span>
                    <span class="block text-4xl sm:text-5xl md:text-6xl lg:text-7xl drop-shadow-lg">TANAH SERATUS</span>
                </h1>

                {{-- Subtitle pill --}}
                <div class="inline-block mt-5 mb-6 bg-yellow-400/20 border border-yellow-300/40 rounded-2xl px-5 py-2.5">
                    <p class="text-white font-bold text-sm sm:text-base">🛒 Cari Kuliner, Jasa, &amp; Kelontong Terdekat</p>
                </div>

                {{-- Feature bullets --}}
                <div class="flex flex-col sm:flex-row lg:flex-col gap-2.5 items-center lg:items-start">
                    <div class="flex items-center gap-2.5 bg-white/10 border border-white/15 rounded-xl px-4 py-2 backdrop-blur-sm">
                        <span class="text-lg">📍</span>
                        <span class="text-white text-xs sm:text-sm font-semibold">Terintegrasi Google Maps &amp; Patokan Warga</span>
                    </div>
                    <div class="flex items-center gap-2.5 bg-white/10 border border-white/15 rounded-xl px-4 py-2 backdrop-blur-sm">
                        <span class="text-lg">💬</span>
                        <span class="text-white text-xs sm:text-sm font-semibold">Pesan Langsung via WhatsApp</span>
                    </div>
                </div>
            </div>

            {{-- RIGHT: Pedagang UMKM Hero Illustration --}}
            <div class="relative shrink-0 w-full max-w-[320px] sm:max-w-[420px] lg:max-w-[480px] xl:max-w-[520px] flex items-center justify-center select-none group mt-2 lg:mt-0">
                {{-- Ambient glowing background --}}
                <div class="absolute -inset-4 bg-gradient-to-tr from-yellow-400/20 via-orange-500/20 to-transparent rounded-full blur-3xl pointer-events-none"></div>

                {{-- Pedagang Illustration Image & Interactive Badges --}}
                <div class="relative z-10 w-full flex items-center justify-center">
                    <img
                        src="{{ asset('images/pedagang_banner.png') }}"
                        alt="Pedagang UMKM LocalKita Tanah Seratus"
                        class="w-full h-auto max-h-[340px] sm:max-h-[390px] lg:max-h-[440px] object-contain drop-shadow-[0_20px_35px_rgba(0,0,0,0.35)] transform transition-transform duration-500 group-hover:scale-105"
                    >

                    {{-- Floating Badge 1: Buka Sekarang --}}
                    <div class="absolute top-2 right-2 sm:top-4 sm:right-4 flex items-center gap-2 bg-slate-900/80 backdrop-blur-md border border-white/20 rounded-full px-3.5 py-1.5 shadow-xl">
                        <span class="w-2.5 h-2.5 bg-green-400 rounded-full animate-pulse"></span>
                        <span class="text-green-300 text-xs font-black tracking-wide">Buka Sekarang</span>
                    </div>

                    {{-- Floating Badge 2: Mitra Lokal 100+ UMKM & Rating --}}
                    <div class="absolute -bottom-2 sm:bottom-2 left-1 sm:left-3 flex items-center gap-2.5 bg-white/95 backdrop-blur-md rounded-2xl px-3.5 sm:px-4 py-2 sm:py-2.5 shadow-2xl border border-white/60">
                        <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-xl bg-gradient-to-br from-yellow-400 to-orange-500 flex items-center justify-center text-base sm:text-lg shadow-md shadow-orange-500/30 shrink-0">
                            🏪
                        </div>
                        <div>
                            <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wider leading-none">Mitra Lokal</div>
                            <div class="text-xs sm:text-sm font-black text-slate-800 flex items-center gap-1.5 mt-0.5">
                                <span>100+ UMKM</span>
                                <span class="text-yellow-500 flex items-center gap-0.5">
                                    <span>★</span>
                                    <span>4.8</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Search Bar --}}
        <form action="{{ route('buyer.index') }}" method="GET" class="mt-8 w-full max-w-3xl mx-auto lg:mx-0 relative group">
            <div class="absolute inset-y-0 left-5 flex items-center pointer-events-none">
                <span class="text-xl sm:text-2xl opacity-60 group-focus-within:opacity-100 transition-opacity">🔍</span>
            </div>
            <input
                type="text"
                name="search"
                class="w-full pl-14 pr-36 sm:pr-44 py-4 sm:py-5 rounded-[24px] border-2 border-white/30 focus:border-yellow-300 focus:ring-8 focus:ring-yellow-300/20 text-base sm:text-lg font-bold text-slate-800 placeholder-slate-400 bg-white/95 backdrop-blur-sm shadow-[0_12px_40px_rgba(0,0,0,0.2)] focus:shadow-[0_20px_60px_rgba(0,0,0,0.25)] transition-all outline-none"
                placeholder="Ketik aja: Seblak pedes, Bengkel motor..."
                autocomplete="off"
            >
            <button type="submit" class="absolute right-2.5 top-1/2 -translate-y-1/2 bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-300 hover:to-yellow-400 hover:scale-105 active:scale-95 text-red-800 px-5 sm:px-7 py-3 sm:py-3.5 rounded-[18px] font-black transition-all shadow-lg text-sm sm:text-base flex items-center gap-2">
                <span>Cari Kuy!</span>
                <span class="hidden sm:inline">🚀</span>
            </button>
        </form>
    </div>

    {{-- Wave Divider to Body Background --}}
    <div class="absolute -bottom-1 left-0 right-0 w-full overflow-hidden leading-none pointer-events-none z-10">
        <svg viewBox="0 0 1440 48" fill="none" preserveAspectRatio="none" class="w-full h-6 sm:h-10 text-[#fdfaf6]" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 24C240 48 480 52 720 28C960 4 1200 40 1440 20V48H0V24Z" fill="currentColor"/>
        </svg>
    </div>
</section>

{{-- CATEGORY BAR & UMKM GRID --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 sm:pt-12 pb-24 relative z-10">
    {{-- Quick Categories Strip --}}
    <div class="bg-white/95 backdrop-blur-md rounded-2xl sm:rounded-3xl p-3 sm:p-4 border border-orange-100/80 shadow-[0_8px_30px_rgba(0,0,0,0.04)] mb-10 sm:mb-12">
        <div class="flex items-center gap-2 sm:gap-3 overflow-x-auto no-scrollbar py-1">
            <span class="text-xs sm:text-sm font-black text-slate-700 whitespace-nowrap pl-2 flex items-center gap-1.5 shrink-0">
                <span class="inline-block w-2 h-2 rounded-full bg-red-500"></span>
                Kategori:
            </span>
            <a href="{{ route('buyer.index') }}" class="whitespace-nowrap px-3.5 py-1.5 rounded-full text-xs font-bold transition-all bg-gradient-to-r from-red-600 to-orange-600 text-white shadow-sm shadow-red-500/20 hover:scale-105 shrink-0">
                Semua UMKM
            </a>
            @foreach(\App\Models\Category::take(6)->get() as $cat)
            <a href="{{ route('buyer.index', ['category' => $cat->slug]) }}" class="whitespace-nowrap px-3.5 py-1.5 rounded-full text-xs font-bold transition-all bg-stone-100 hover:bg-orange-50 hover:text-orange-600 text-slate-600 hover:scale-105 border border-transparent hover:border-orange-200 shrink-0">
                {{ $cat->name }}
            </a>
            @endforeach
        </div>
    </div>

    {{-- Section Header --}}
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8 sm:mb-10">
        <div>
            <div class="inline-flex items-center gap-1.5 bg-orange-100/90 border border-orange-200/80 px-3 py-1 rounded-full text-xs font-black text-orange-700 mb-2.5 shadow-xs">
                <span class="animate-pulse">✨</span> Rekomendasi Terhangat
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-slate-900 tracking-tight">Lagi Rame Disekitar Sini 🔥</h2>
            <p class="text-sm sm:text-base text-slate-500 font-medium mt-1">Banyak yang suka dan sering dibeli sama tetangga.</p>
        </div>
        <a href="{{ route('buyer.index') }}" class="hidden sm:flex text-orange-600 font-bold hover:text-white bg-orange-50 hover:bg-orange-500 px-6 py-3 rounded-[20px] text-sm transition-all duration-300 items-center gap-2 group shadow-sm hover:shadow-orange-500/30">
            Jelajahi Semua <span class="group-hover:translate-x-1 transition-transform">👉</span>
        </a>
    </div>

    {{-- UMKM Grid --}}
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
        @foreach(\App\Models\Store::where('is_approved', true)->latest()->take(8)->get() as $store)
        <a href="{{ route('buyer.stores.show', $store->slug) }}" class="group bg-white rounded-[24px] sm:rounded-[32px] border border-stone-100 shadow-[0_8px_30px_rgb(0,0,0,0.03)] hover:shadow-[0_20px_40px_rgba(249,115,22,0.08)] transition-all duration-300 hover:-translate-y-2 overflow-hidden flex flex-col relative">
            <div class="relative w-full aspect-square sm:aspect-[4/3] bg-slate-100 overflow-hidden p-2 pb-0">
                <img src="{{ $store->image ?? 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=600&q=80' }}" alt="{{ $store->name }}" loading="lazy" class="w-full h-full object-cover rounded-[20px] sm:rounded-[24px] group-hover:scale-105 transition-transform duration-500 ease-out">
                <div class="absolute top-4 left-4 z-10">
                    @if($store->status === 'open')
                        <span class="inline-flex items-center gap-1.5 bg-[#22C55E]/95 backdrop-blur-md text-white text-[10px] md:text-xs font-black px-3.5 py-1.5 rounded-full shadow-md tracking-widest border border-green-400/50">
                            <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span> BUKA
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 bg-red-500/95 backdrop-blur-md text-white text-[10px] md:text-xs font-black px-3.5 py-1.5 rounded-full shadow-md tracking-widest border border-red-400/50">
                            TUTUP
                        </span>
                    @endif
                </div>
            </div>
            <div class="p-4 sm:p-5 md:p-6 flex flex-col flex-grow bg-white z-10">
                <h3 class="font-black text-slate-900 text-base sm:text-lg mb-1.5 truncate group-hover:text-orange-500 transition-colors">{{ $store->name }}</h3>
                <p class="text-[11px] sm:text-xs text-slate-500 font-bold flex items-center gap-1.5 truncate">
                    <span class="text-orange-400 text-sm">📍</span> {{ $store->landmark ?? 'Tanah Seratus' }}
                </p>
                <div class="mt-auto pt-4 sm:pt-5 border-t border-gray-50 flex items-center justify-between">
                    <div class="flex items-center gap-1">
                        <span class="text-yellow-400 text-sm sm:text-base">⭐</span>
                        <span class="font-black text-slate-800 text-xs sm:text-sm">4.8</span>
                    </div>
                    <div class="text-white bg-gradient-to-r from-red-500 to-orange-500 rounded-full w-8 h-8 flex items-center justify-center opacity-0 group-hover:opacity-100 group-hover:-translate-x-1 transition-all shadow-md shadow-orange-500/20">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <div class="mt-8 text-center sm:hidden">
        <a href="{{ route('buyer.index') }}" class="inline-flex w-full justify-center text-white font-black bg-gradient-to-r from-red-500 to-orange-500 px-6 py-4 rounded-[20px] shadow-lg shadow-orange-500/25 active:scale-95 transition-transform">
            Jelajahi Semua UMKM 👉
        </a>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════
     BUYER FLOWCHART — ILLUSTRATED INFOGRAPHIC STYLE
     Inspired by: Registration infographic reference
     ═══════════════════════════════════════════════════════ --}}
<section class="relative py-20 sm:py-28 overflow-hidden bg-[#fdfaf6]" id="cara-daftar">

    {{-- Dot-grid background (subtle texture) --}}
    <div class="absolute inset-0 pointer-events-none" style="background-image: radial-gradient(circle, #e2e8f0 1.5px, transparent 1.5px); background-size: 28px 28px; opacity:0.6;"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        {{-- ── SECTION HEADER ── --}}
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 bg-[#FD6600]/10 border border-[#FD6600]/25 px-5 py-2 rounded-full text-xs font-black text-[#FD6600] uppercase tracking-widest mb-5">
                👤 Panduan Akun Pembeli
            </div>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-black text-slate-900 tracking-tight leading-tight">
                Cara <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-orange-500">Daftar &amp; Masuk</span><br class="hidden sm:block"> sebagai Pembeli
            </h2>
            <p class="mt-4 text-slate-500 text-base sm:text-lg font-medium max-w-xl mx-auto">Ikuti langkah berikut untuk mulai menjelajahi UMKM lokal favoritmu!</p>
        </div>

        {{-- ── ROW 1 : DAFTAR BARU ── --}}
        <div class="mb-12">
            {{-- Row label bar --}}
            <div class="flex items-center gap-4 mb-8">
                <div class="flex items-center gap-3 flex-shrink-0">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-[#FD6600] to-[#FF944B] flex items-center justify-center shadow-lg shadow-orange-500/30 flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none">Alur 1</p>
                        <p class="text-sm sm:text-base font-black text-slate-800 mt-0.5">Daftar Akun Baru</p>
                    </div>
                </div>
                <div class="flex-1 h-px bg-gradient-to-r from-orange-200 via-orange-100 to-transparent"></div>
                <a href="{{ route('register') }}" class="flex-shrink-0 text-xs font-black text-[#FD6600] hover:underline">Daftar Sekarang →</a>
            </div>

            {{-- Steps grid --}}
            <div class="grid grid-cols-3 sm:grid-cols-6 gap-3 sm:gap-4">

                <div class="ib-step group">
                    <span class="ib-num">1</span>
                    <div class="ib-icon bg-slate-100 group-hover:bg-slate-200 group-hover:scale-110">
                        <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                    </div>
                    <p class="ib-label">Buka<br>LocalKita.id</p>
                </div>

                <div class="ib-step group">
                    <span class="ib-num" style="background:#FD6600">2</span>
                    <div class="ib-icon bg-orange-50 group-hover:bg-orange-100 group-hover:scale-110">
                        <svg class="w-8 h-8 text-[#FD6600]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <p class="ib-label">Klik<br>"Daftar"</p>
                </div>

                <div class="ib-step group">
                    <span class="ib-num" style="background:#3b82f6">3</span>
                    <div class="ib-icon bg-blue-50 group-hover:bg-blue-100 group-hover:scale-110">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <p class="ib-label">Pilih Role<br><strong class="text-blue-600">"Pembeli"</strong></p>
                </div>

                <div class="ib-step group">
                    <span class="ib-num" style="background:#7c3aed">4</span>
                    <div class="ib-icon bg-violet-50 group-hover:bg-violet-100 group-hover:scale-110">
                        <svg class="w-8 h-8 text-violet-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </div>
                    <p class="ib-label">Isi Nama,<br>Email, Password</p>
                </div>

                <div class="ib-step group">
                    <span class="ib-num" style="background:#dc2626">5</span>
                    <div class="ib-icon bg-red-50 group-hover:bg-red-100 group-hover:scale-110">
                        <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <p class="ib-label">Klik "Daftar<br>Sekarang"</p>
                </div>

                <div class="ib-step group border-2 border-green-200">
                    <span class="ib-num" style="background:#16a34a">✓</span>
                    <div class="ib-icon bg-green-50 group-hover:bg-green-100 group-hover:scale-110">
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <p class="ib-label text-green-700 font-black">Akun Aktif!<br>Auto Login 🎉</p>
                </div>

            </div>
        </div>

        {{-- Divider OR --}}
        <div class="relative flex items-center my-10">
            <div class="flex-1 h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>
            <div class="mx-5 px-5 py-2 bg-white border border-slate-200 rounded-full text-xs font-black text-slate-400 shadow-sm tracking-widest">ATAU</div>
            <div class="flex-1 h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>
        </div>

        {{-- ── ROW 2 : LOGIN / MASUK ── --}}
        <div>
            {{-- Row label bar --}}
            <div class="flex items-center gap-4 mb-8">
                <div class="flex items-center gap-3 flex-shrink-0">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-slate-700 to-slate-900 flex items-center justify-center shadow-lg flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none">Alur 2</p>
                        <p class="text-sm sm:text-base font-black text-slate-800 mt-0.5">Login / Masuk</p>
                    </div>
                </div>
                <div class="flex-1 h-px bg-gradient-to-r from-slate-200 via-slate-100 to-transparent"></div>
                <a href="{{ route('login') }}" class="flex-shrink-0 text-xs font-black text-slate-500 hover:text-slate-800 hover:underline">Masuk Sekarang →</a>
            </div>

            <div class="grid grid-cols-3 sm:grid-cols-5 gap-3 sm:gap-4">

                <div class="ib-step group">
                    <span class="ib-num">1</span>
                    <div class="ib-icon bg-slate-100 group-hover:bg-slate-200 group-hover:scale-110">
                        <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                    </div>
                    <p class="ib-label">Buka<br>LocalKita.id</p>
                </div>

                <div class="ib-step group">
                    <span class="ib-num" style="background:#FD6600">2</span>
                    <div class="ib-icon bg-orange-50 group-hover:bg-orange-100 group-hover:scale-110">
                        <svg class="w-8 h-8 text-[#FD6600]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                    </div>
                    <p class="ib-label">Klik<br>"Masuk"</p>
                </div>

                <div class="ib-step group">
                    <span class="ib-num" style="background:#7c3aed">3</span>
                    <div class="ib-icon bg-violet-50 group-hover:bg-violet-100 group-hover:scale-110">
                        <svg class="w-8 h-8 text-violet-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <p class="ib-label">Masukkan<br>Email &amp; Password</p>
                </div>

                <div class="ib-step group">
                    <span class="ib-num" style="background:#d97706">4</span>
                    <div class="ib-icon bg-amber-50 group-hover:bg-amber-100 group-hover:scale-110">
                        <svg class="w-8 h-8 text-amber-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <p class="ib-label">Sistem<br>Verifikasi</p>
                </div>

                <div class="ib-step group border-2 border-green-200 col-span-3 sm:col-span-1">
                    <span class="ib-num" style="background:#16a34a">✓</span>
                    <div class="ib-icon bg-green-50 group-hover:bg-green-100 group-hover:scale-110">
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <p class="ib-label text-green-700 font-black">Login Berhasil!<br>Jelajahi UMKM ✅</p>
                </div>

            </div>

            {{-- Lupa Password --}}
            <div class="mt-8 text-center">
                <a href="{{ route('password.request') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-[#FD6600] font-semibold transition-colors group">
                    <svg class="w-4 h-4 group-hover:text-[#FD6600]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
                    Lupa password? Reset via email
                </a>
            </div>
        </div>

    </div>
</section>

@endsection

@push('scripts')
<style>
.no-scrollbar::-webkit-scrollbar { display: none; }
.no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

/* ── Infographic Step Box ── */
.ib-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 20px 10px 16px;
    background: white;
    border-radius: 20px;
    border: 1.5px solid #f1f5f9;
    box-shadow: 0 2px 16px rgba(0,0,0,0.04);
    position: relative;
    transition: all 0.28s cubic-bezier(.34,1.56,.64,1);
    cursor: default;
    gap: 10px;
}
.ib-step:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 36px rgba(253,102,0,0.12);
    border-color: #fed7aa;
}
.ib-num {
    position: absolute;
    top: -13px;
    left: 50%;
    transform: translateX(-50%);
    min-width: 28px;
    height: 28px;
    padding: 0 6px;
    border-radius: 50px;
    background: #1e293b;
    color: white;
    font-size: 11px;
    font-weight: 900;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 3px solid white;
    box-shadow: 0 2px 10px rgba(0,0,0,0.18);
    z-index: 2;
    letter-spacing: -0.02em;
}
.ib-icon {
    width: 68px;
    height: 68px;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.25s ease;
}
.ib-label {
    font-size: 11.5px;
    font-weight: 700;
    color: #334155;
    line-height: 1.45;
}
</style>
@endpush
