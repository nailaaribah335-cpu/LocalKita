@extends('layouts.buyer')

@section('content')
<div class="bg-[#fdfaf6] min-h-screen font-sans pb-24 pt-6 md:pt-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- BREADCRUMB / BACK --}}
        <div class="mb-6">
            <a href="{{ route('buyer.index') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-orange-600 font-bold text-sm transition-colors">
                <span>←</span> Kembali ke Direktori
            </a>
        </div>

        {{-- 2 COLUMN LAYOUT --}}
        <div class="flex flex-col lg:flex-row gap-8 items-start">
            
            {{-- KOLOM KIRI: KONTEN UTAMA (70%) --}}
            <div class="w-full lg:w-[70%] flex flex-col gap-8">
                
                {{-- Store Banner & Info Card --}}
                <div class="bg-white rounded-[32px] overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 flex flex-col relative">
                    <div class="relative w-full h-64 md:h-80 bg-slate-100">
                        <img src="{{ $store->image ?? 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=1200&q=80' }}" 
                             alt="{{ $store->name }}" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
                        
                        {{-- Status Badge (On Banner) --}}
                        <div class="absolute top-6 left-6 z-10">
                            @if($store->status === 'open')
                                <span class="inline-flex items-center gap-2 bg-[#22C55E]/95 backdrop-blur-md text-white text-xs font-black px-4 py-2 rounded-full shadow-md tracking-widest border border-green-400/50">
                                    <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span> BUKA
                                </span>
                            @else
                                <span class="inline-flex items-center gap-2 bg-red-500/95 backdrop-blur-md text-white text-xs font-black px-4 py-2 rounded-full shadow-md tracking-widest border border-red-400/50">
                                    TUTUP
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="p-6 md:p-8 relative">
                        {{-- Bookmark floating button --}}
                        @auth
                        <form action="{{ route('buyer.bookmarks.toggle', $store->id) }}" method="POST" class="absolute -top-8 right-8">
                            @csrf
                            <button type="submit" class="w-16 h-16 rounded-2xl bg-white text-slate-400 hover:text-red-500 flex items-center justify-center shadow-[0_10px_30px_rgba(0,0,0,0.08)] transition-all hover:-translate-y-1 active:scale-95 border border-gray-50">
                                @if($isBookmarked)
                                    <svg class="w-8 h-8 text-red-500 fill-current" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                                @else
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                @endif
                            </button>
                        </form>
                        @endauth
                        
                        <h1 class="font-black text-3xl sm:text-5xl text-slate-900 mb-3 tracking-tight pr-20">{{ $store->name }}</h1>
                        <p class="text-slate-600 font-medium text-base leading-relaxed max-w-3xl mb-6">{{ $store->description }}</p>
                        
                        <div class="flex items-center gap-3">
                            <span class="inline-flex items-center gap-1.5 bg-orange-50 border border-orange-200 text-orange-700 font-black text-sm px-4 py-2 rounded-xl">
                                <span class="text-orange-500 text-lg leading-none">★</span> 4.8
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Peta Lokasi Block --}}
                <div class="bg-white rounded-[32px] p-6 shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100 flex flex-col gap-4">
                    <div class="h-64 sm:h-80 bg-slate-100 rounded-[24px] w-full overflow-hidden border border-gray-200 relative">
                        <div id="store-map" class="w-full h-full z-0"></div>
                    </div>
                </div>

                {{-- Katalog Produk Grid --}}
                <div>
                    <h2 class="font-black text-2xl text-slate-900 mb-6 flex items-center gap-3">
                        <span class="bg-gradient-to-tr from-red-500 to-orange-500 text-transparent bg-clip-text">🛍️ Katalog Menu & Jasa</span>
                    </h2>
                    
                    @if($groupedProducts->count() > 0)
                        @foreach($groupedProducts as $categoryName => $products)
                            <div class="mb-8">
                                <h3 class="font-bold text-slate-800 text-lg mb-4 flex items-center gap-3">
                                    {{ $categoryName }} <div class="h-px bg-gray-200 flex-grow"></div>
                                </h3>
                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                    @foreach($products as $product)
                                    <div class="bg-white rounded-[24px] p-3 border border-gray-100 shadow-[0_4px_15px_rgba(0,0,0,0.02)] hover:shadow-[0_15px_30px_rgba(249,115,22,0.08)] hover:border-orange-200 transition-all duration-300 flex flex-col group">
                                        <div class="aspect-square bg-slate-50 rounded-[16px] overflow-hidden mb-3 relative">
                                            <img src="{{ $product->image ?? 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=400&q=80' }}" 
                                                 alt="{{ $product->name }}" 
                                                 loading="lazy"
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                            
                                            @if(!$product->is_available)
                                                <div class="absolute inset-0 bg-white/70 backdrop-blur-[2px] flex items-center justify-center">
                                                    <span class="bg-slate-800 text-white font-black px-3 py-1.5 rounded-full text-[10px] uppercase tracking-wider">HABIS</span>
                                                </div>
                                            @endif
                                        </div>
                                        <h4 class="font-black text-slate-900 text-sm leading-snug line-clamp-2 mb-1 group-hover:text-orange-500 transition-colors">
                                            {{ $product->name }}
                                        </h4>
                                        <div class="mt-auto pt-3 flex items-center justify-between border-t border-slate-50">
                                            <span class="font-black text-orange-600 text-sm">{{ $product->formatted_price }}</span>
                                            @if($product->is_available)
                                            <button class="bg-slate-100 text-slate-600 group-hover:bg-orange-500 group-hover:text-white text-xs font-bold px-4 py-2 rounded-xl transition-all shadow-sm">
                                                Tambah
                                            </button>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="bg-white rounded-[32px] p-12 text-center border border-gray-100 shadow-sm">
                            <div class="text-5xl mb-4">👻</div>
                            <h3 class="font-black text-slate-900 text-xl mb-2">Belum Ada Katalog</h3>
                            <p class="text-slate-500 font-medium">Toko ini belum menambahkan produk atau jasa untuk ditampilkan.</p>
                        </div>
                    @endif
                </div>

            </div>

            {{-- KOLOM KANAN: STICKY SIDEBAR CHECKOUT (30%) --}}
            <div class="w-full lg:w-[30%] flex flex-col gap-4 lg:sticky lg:top-[104px]">

                {{-- Card: Hubungi Penjual --}}
                <div class="bg-white rounded-[32px] p-6 sm:p-8 shadow-[0_20px_40px_rgba(0,0,0,0.06)] border border-gray-100 flex flex-col gap-6 relative overflow-hidden">
                    {{-- Decorative top bar --}}
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-[#25D366] to-[#128C7E]"></div>

                    <div>
                        <h2 class="font-black text-xl text-slate-900 mb-1">Hubungi Penjual</h2>
                        <p class="text-xs text-slate-500 font-medium">Lanjutkan pesanan atau tanya-tanya langsung ke penjual.</p>
                    </div>

                    @php
                        $waMessage = urlencode("Halo {$store->name}, saya ingin memesan dari LocalKita.");
                    @endphp
                    <a href="https://wa.me/{{ $store->formatted_phone }}?text={{ $waMessage }}" target="_blank" 
                       class="w-full bg-[#25D366] hover:bg-[#20BD5A] text-white font-black text-base rounded-[20px] h-16 shadow-xl shadow-[#25D366]/30 flex items-center justify-center gap-3 transition-all hover:scale-105 active:scale-95">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564c.173.087.289.129.332.202.043.073.043.423-.101.827z"></path>
                        </svg>
                        Pesan via WhatsApp
                    </a>
                </div>

                {{-- Card: Patokan Lokasi Warga --}}
                <div class="bg-white rounded-[32px] p-6 shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-gray-100 relative overflow-hidden">
                    {{-- Decorative top bar --}}
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-orange-400 to-red-500"></div>

                    <h2 class="font-black text-lg text-slate-900 mb-1 flex items-center gap-2">
                        <span class="text-xl">🗺️</span> Patokan Lokasi Warga
                    </h2>
                    <p class="text-xs text-slate-500 font-medium mb-4">Cara mudah menemukan lokasi toko ini.</p>

                    <div class="bg-orange-50 border border-orange-100 rounded-2xl p-4 mb-4">
                        <p class="text-slate-800 text-sm font-bold leading-relaxed">
                            {{ $store->landmark ?? 'Belum ada patokan spesifik.' }}
                        </p>
                    </div>

                    <div class="flex items-start gap-2 text-slate-500 text-xs font-medium">
                        <span class="text-base leading-none mt-0.5">📍</span>
                        <span class="leading-relaxed">{{ $store->address }}</span>
                    </div>

                    {{-- Tombol buka maps --}}
                    @if($store->latitude && $store->longitude)
                    <a href="https://www.google.com/maps?q={{ $store->latitude }},{{ $store->longitude }}" target="_blank"
                       class="mt-4 w-full bg-slate-100 hover:bg-orange-500 hover:text-white text-slate-700 font-black text-sm rounded-[16px] h-12 flex items-center justify-center gap-2 transition-all active:scale-95">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                        Buka di Google Maps
                    </a>
                    @endif
                </div>

            </div>

        </div>
    </div>
</div>

@push('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lat = {{ $store->latitude ?? -6.223 }};
        const lng = {{ $store->longitude ?? 106.702 }};
        
        var map = L.map('store-map', { zoomControl: false }).setView([lat, lng], 15);
        L.control.zoom({ position: 'bottomright' }).addTo(map);

        L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        var customIcon = L.divIcon({
            className: 'custom-pin',
            html: `<div class="w-12 h-12 bg-gradient-to-br from-red-500 to-orange-500 rounded-full flex items-center justify-center text-white text-2xl shadow-xl border-4 border-white">📍</div>`,
            iconSize: [48, 48],
            iconAnchor: [24, 48]
        });

        var marker = L.marker([lat, lng], {icon: customIcon}).addTo(map);
    });
</script>
@endpush
@endsection
