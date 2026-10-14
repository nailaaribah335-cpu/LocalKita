@extends('layouts.buyer')

@section('content')
<div class="bg-[#FAF5EE] min-h-screen py-4 sm:py-8 font-sans">
    <div class="max-w-6xl mx-auto px-3.5 sm:px-6 lg:px-8">
        
        {{-- HEADER: GREETING & SEARCH (Mobile-First) --}}
        <header class="mb-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                
                {{-- BENTO 1: MAIN HERO (Greeting & Search) --}}
                <div class="md:col-span-8 bg-white border border-stone-200 rounded-[24px] p-6 sm:p-10 flex flex-col justify-center">
                    {{-- Text Badge Sesuai Request --}}
                    <div class="inline-flex items-center gap-2 bg-stone-50 border border-stone-200 px-3.5 py-1.5 rounded-full text-xs font-bold text-stone-700 w-max mb-5">
                        <span>✨ 100% Produk Asli Tanah Seratus</span>
                    </div>
                    
                    <h1 class="text-3xl sm:text-5xl font-black text-stone-900 tracking-tight leading-tight mb-4">
                        Direktori UMKM <span class="text-[#FF4500]">Lokal</span>
                    </h1>
                    <p class="text-sm sm:text-base font-medium text-stone-500 mb-8 max-w-lg leading-relaxed">
                        Dukung usaha tetangga, jajan enak & kebutuhan harian makin mudah ditemukan dalam satu tempat.
                    </p>

                    {{-- Kolom Pencarian --}}
                    <form action="{{ route('buyer.index') }}" method="GET" class="relative w-full max-w-xl">
                        @if(request('category')) <input type="hidden" name="category" value="{{ request('category') }}"> @endif
                        @if(request('open_only')) <input type="hidden" name="open_only" value="1"> @endif
                        
                        <div class="flex items-center bg-stone-50 border border-stone-200 rounded-[20px] p-2 focus-within:border-[#FF4500] focus-within:bg-white transition-all">
                            <div class="pl-3 pr-2 text-stone-400 text-lg">🔍</div>
                            <input 
                                type="text" 
                                name="search" 
                                value="{{ request('search') }}" 
                                placeholder="Cari warung, laundry, servis..." 
                                class="w-full bg-transparent border-none text-stone-800 placeholder-stone-400 text-sm font-medium focus:outline-none focus:ring-0 px-2"
                                autocomplete="off"
                            >
                            @if(request('search'))
                                <a href="{{ route('buyer.index', array_filter(['category' => request('category'), 'open_only' => request('open_only')])) }}" class="text-stone-400 hover:text-stone-700 px-2 text-sm">✖</a>
                            @endif
                            <button type="submit" class="bg-[#FF4500] hover:bg-[#E63900] text-white font-bold py-3 px-6 rounded-xl ml-1 transition-colors">
                                Cari
                            </button>
                        </div>
                    </form>
                </div>

                {{-- BENTO 2 & 3: MAP & FILTER BUKA --}}
                <div class="md:col-span-4 flex flex-row md:flex-col gap-4">
                    
                    {{-- Map Bento --}}
                    <button type="button" onclick="toggleMapModal()" class="flex-1 md:flex-none md:h-1/2 bg-white border border-stone-200 rounded-[24px] p-5 flex flex-col items-center justify-center text-center cursor-pointer hover:bg-stone-50 transition-colors group">
                        <div class="text-3xl sm:text-4xl mb-2 sm:mb-3 group-hover:scale-110 transition-transform">🗺️</div>
                        <h3 class="font-bold text-stone-900 text-sm sm:text-base">Peta Lokasi</h3>
                        <p class="text-[10px] sm:text-xs text-stone-500 font-medium hidden sm:block">Lihat sebaran UMKM</p>
                    </button>
                    
                    {{-- Filter Buka Bento --}}
                    <a href="{{ route('buyer.index', array_merge(request()->except('page'), ['open_only' => request('open_only') ? null : '1'])) }}" 
                       class="flex-1 md:flex-none md:h-1/2 border rounded-[24px] p-5 flex flex-col items-center justify-center text-center transition-all group {{ request('open_only') ? 'bg-[#FFF1ED] border-[#FFC2B0]' : 'bg-white border-stone-200 hover:bg-stone-50' }}">
                        <div class="w-10 h-10 rounded-full bg-stone-100 border border-stone-200 flex items-center justify-center mb-2 sm:mb-3 group-hover:scale-110 transition-transform">
                            <span class="w-3 h-3 rounded-full {{ request('open_only') ? 'bg-emerald-500 animate-pulse' : 'bg-stone-300' }}"></span>
                        </div>
                        <h3 class="font-bold text-sm sm:text-base {{ request('open_only') ? 'text-[#FF4500]' : 'text-stone-900' }}">Sedang Buka</h3>
                        <p class="text-[10px] sm:text-xs font-medium hidden sm:block {{ request('open_only') ? 'text-[#FF4500]/70' : 'text-stone-500' }}">Hanya toko aktif</p>
                    </a>
                    
                </div>
            </div>

            {{-- BENTO 4: KATEGORI (Horizontal Scroll) --}}
            <div class="mt-6 sm:mt-8 bg-white border border-stone-200 rounded-[24px] p-3.5 sm:p-4 shadow-sm flex items-center gap-2 sm:gap-2.5 overflow-x-auto scrollbar-hide">
                {{-- Semua Kategori --}}
                <a href="{{ route('buyer.index', array_filter(['search' => request('search'), 'open_only' => request('open_only')])) }}" 
                   class="shrink-0 px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all {{ !request('category') ? 'bg-stone-900 text-white' : 'bg-stone-50 text-stone-600 hover:bg-stone-100' }}">
                    Semua Kategori
                </a>

                {{-- Kategori List --}}
                @foreach($categories as $cat)
                    @php
                        $catIcon = '🏪';
                        $cName = strtolower($cat->name);
                        if (str_contains($cName, 'makan') || str_contains($cName, 'kuliner')) $catIcon = '🍲';
                        elseif (str_contains($cName, 'minum') || str_contains($cName, 'kopi') || str_contains($cName, 'cafe')) $catIcon = '☕';
                        elseif (str_contains($cName, 'jasa') || str_contains($cName, 'servis')) $catIcon = '🛠️';
                        elseif (str_contains($cName, 'sembako') || str_contains($cName, 'toko')) $catIcon = '🥦';
                        elseif (str_contains($cName, 'fashion') || str_contains($cName, 'baju')) $catIcon = '👕';
                        elseif (str_contains($cName, 'salon') || str_contains($cName, 'cukur')) $catIcon = '✂️';
                        elseif (str_contains($cName, 'laundry')) $catIcon = '🧺';
                        elseif (str_contains($cName, 'kriya') || str_contains($cName, 'kerajinan')) $catIcon = '🎨';
                    @endphp
                    <a href="{{ route('buyer.index', array_merge(request()->except('page'), ['category' => $cat->slug])) }}" 
                       class="shrink-0 px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all flex items-center gap-2 {{ request('category') == $cat->slug ? 'bg-stone-900 text-white' : 'bg-stone-50 text-stone-600 hover:bg-stone-100' }}">
                        <span>{{ $catIcon }}</span>
                        <span>{{ $cat->name }}</span>
                    </a>
                @endforeach
            </div>
        </header>

        {{-- INFO BAR: TOTAL TOKO & FILTER AKTIF --}}
        <div class="flex items-center justify-between gap-2 mb-4 pb-2 border-b border-[#EFE5D6]">
            <div class="flex items-center gap-2">
                <span class="text-xs sm:text-sm font-extrabold text-stone-800">
                    Daftar Toko & Usaha
                </span>
                <span class="bg-[#FFF1ED] text-[#FF4500] font-black text-[11px] sm:text-xs px-2.5 py-0.5 rounded-full border border-[#FFC2B0]">
                    {{ $stores->total() }} UMKM
                </span>
            </div>

            @if(request('search') || request('category') || request('open_only'))
            <a href="{{ route('buyer.index') }}" class="text-[11px] sm:text-xs font-bold text-[#FF4500] hover:underline flex items-center gap-1">
                <span>Reset Filter</span>
                <span>🔄</span>
            </a>
            @endif
        </div>

        {{-- KONTEN UTAMA: GRID 2 KOLOM KARTU TOKO (MOBILE-FIRST) --}}
        @if($stores->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-5">
            @foreach($stores as $store)
            <div class="bg-white rounded-2xl sm:rounded-3xl border border-[#F0E6D8] overflow-hidden shadow-sm hover:shadow-xl hover:shadow-[#FF4500]/10 transition-all duration-300 hover:-translate-y-1 relative group flex flex-col">
                
                {{-- Foto UMKM & Badges Container --}}
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden">
                    <img 
                        src="{{ $store->image ?? 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=600&q=80' }}" 
                        alt="{{ $store->name }}" 
                        loading="lazy" 
                        class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500 ease-out"
                        onerror="this.src='https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=600&q=80'"
                    >

                    {{-- Gradient Overlay for Contrast --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-black/20 pointer-events-none"></div>

                    {{-- BADGE STATUS 'BUKA' ATAU 'TUTUP' (Wajib Sesuai Request) --}}
                    <div class="absolute top-2 sm:top-2.5 left-2 sm:left-2.5 z-10">
                        @if($store->status === 'open')
                            <span class="inline-flex items-center gap-1 bg-emerald-500 text-white text-[10px] sm:text-xs font-black px-2 sm:px-2.5 py-0.5 sm:py-1 rounded-full shadow-md tracking-wide">
                                <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                                <span>BUKA</span>
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 bg-stone-800/90 backdrop-blur-sm text-stone-200 text-[10px] sm:text-xs font-bold px-2 sm:px-2.5 py-0.5 sm:py-1 rounded-full shadow-md tracking-wide">
                                <span class="w-1.5 h-1.5 rounded-full bg-stone-400"></span>
                                <span>TUTUP</span>
                            </span>
                        @endif
                    </div>

                    {{-- Bookmark Button --}}
                    @auth
                    <form action="{{ route('buyer.bookmarks.toggle', $store->id) }}" method="POST" class="absolute top-2 sm:top-2.5 right-2 sm:right-2.5 z-10">
                        @csrf
                        <button type="submit" aria-label="Simpan Toko" class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 backdrop-blur-sm text-stone-600 hover:text-red-500 flex items-center justify-center shadow-md transition-all hover:scale-110 active:scale-90">
                            @if($store->isBookmarkedBy(Auth::user()))
                                <svg class="w-4 h-4 text-red-500 fill-current" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                            @else
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                            @endif
                        </button>
                    </form>
                    @endauth

                    {{-- Rating Tag di Sudut Bawah Foto --}}
                    <div class="absolute bottom-2 left-2 z-10 inline-flex items-center gap-1 bg-black/60 backdrop-blur-md text-white text-[10px] sm:text-xs font-bold px-2 py-0.5 rounded-md">
                        <span class="text-amber-400">★</span>
                        <span>4.8</span>
                    </div>
                </div>

                {{-- Konten Kartu: Nama UMKM & Lokasi Singkat --}}
                <div class="p-2.5 sm:p-4 flex flex-col flex-grow justify-between">
                    <div>
                        {{-- Nama UMKM --}}
                        <h2 class="font-extrabold text-stone-900 text-xs sm:text-base leading-snug mb-1 line-clamp-1 group-hover:text-[#FF4500] transition-colors" title="{{ $store->name }}">
                            {{ $store->name }}
                        </h2>

                        {{-- Teks Lokasi Singkat --}}
                        <p class="text-[11px] sm:text-xs text-stone-500 font-medium flex items-center gap-1 mb-2.5 truncate" title="{{ $store->landmark ?? $store->address }}">
                            <span class="text-[#FF4500] shrink-0 text-xs">📍</span>
                            <span class="truncate">{{ $store->landmark ?? ($store->address ?? 'Tanah Seratus') }}</span>
                        </p>
                    </div>

                    {{-- Footer Kartu: Tombol Aksi Merah-Oranye Terang --}}
                    <div class="mt-auto pt-2 border-t border-[#F5EBDD] flex flex-col gap-1.5">
                        @if($store->products && $store->products->count() > 0)
                        <div class="flex items-baseline justify-between text-[10px] sm:text-xs">
                            <span class="text-stone-400 font-semibold">Mulai</span>
                            <span class="font-black text-[#FF4500]">
                                {{ $store->products->sortBy('price')->first()->formatted_price ?? 'Terjangkau' }}
                            </span>
                        </div>
                        @endif

                        <a href="{{ route('buyer.stores.show', $store->slug) }}" 
                           class="w-full bg-[#FFF1ED] hover:bg-[#FF4500] text-[#FF4500] hover:text-white font-extrabold text-[11px] sm:text-xs py-2 px-2.5 rounded-xl text-center transition-all duration-200 shadow-sm flex items-center justify-center gap-1">
                            <span>Lihat Toko</span>
                            <span>👉</span>
                        </a>
                    </div>

                </div>

            </div>
            @endforeach
        </div>

        {{-- Pagination Ramah & Hangat --}}
        <div class="mt-8 mb-6">
            {{ $stores->links() }}
        </div>

        @else
        {{-- Empty State Ramah & Bersahabat --}}
        <div class="text-center py-16 px-4 bg-white rounded-3xl border border-[#F0E6D8] shadow-sm max-w-lg mx-auto my-6">
            <div class="w-16 h-16 sm:w-20 sm:h-20 bg-[#FFF1ED] text-[#FF4500] text-3xl sm:text-4xl rounded-full flex items-center justify-center mx-auto mb-4 shadow-inner">
                🔍
            </div>
            <h2 class="text-lg sm:text-xl font-black text-stone-900 mb-1">
                Waduh, Belum Ada Toko yang Cocok
            </h2>
            <p class="text-xs sm:text-sm font-medium text-stone-500 mb-5 max-w-xs mx-auto">
                Coba gunakan kata kunci pencarian yang lebih umum atau pilih kategori lainnya ya tetangga!
            </p>
            <a href="{{ route('buyer.index') }}" class="inline-flex items-center gap-2 bg-[#FF4500] hover:bg-[#E63900] text-white text-xs sm:text-sm font-black px-6 py-2.5 rounded-full shadow-md shadow-[#FF4500]/25 transition-all hover:scale-105">
                <span>Lihat Semua Toko</span>
                <span>✨</span>
            </a>
        </div>
        @endif

    </div>
</div>

{{-- MODAL PETA LOKASI INTERAKTIF (Untuk Tetap Mendukung Fitur Lokasi Tanpa Merusak Grid 2 Kolom Mobile) --}}
<div id="map-modal" class="fixed inset-0 z-50 hidden bg-stone-900/60 backdrop-blur-sm transition-opacity flex items-center justify-center p-3 sm:p-6">
    <div class="bg-white rounded-3xl w-full max-w-3xl overflow-hidden shadow-2xl border border-[#E8DCCF] flex flex-col max-h-[90vh]">
        <div class="p-4 sm:p-5 border-b border-[#F0E6D8] flex items-center justify-between bg-[#FAF5EE]">
            <div class="flex items-center gap-2">
                <span class="text-xl">🗺️</span>
                <div>
                    <h2 class="font-black text-stone-900 text-sm sm:text-base">Peta Sebaran UMKM</h2>
                    <p class="text-[11px] text-stone-500 font-medium">Area Tanah Seratus & Sekitarnya</p>
                </div>
            </div>
            <button type="button" onclick="toggleMapModal()" class="w-8 h-8 rounded-full bg-stone-100 hover:bg-stone-200 text-stone-600 flex items-center justify-center font-bold text-sm transition-colors">
                ✕
            </button>
        </div>
        <div class="p-2 sm:p-3 flex-grow">
            <div id="umkm-map" class="w-full h-[400px] sm:h-[480px] rounded-2xl bg-stone-100"></div>
        </div>
        <div class="p-3 bg-[#FAF5EE] border-t border-[#F0E6D8] text-center">
            <p class="text-[11px] text-stone-500 font-medium">Klik salah satu pin merah-oranye untuk melihat nama toko dan detail rute.</p>
        </div>
    </div>
</div>

@push('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
    let mapInitialized = false;
    let map = null;

    function toggleMapModal() {
        const modal = document.getElementById('map-modal');
        if (!modal) return;
        
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
            if (!mapInitialized) {
                setTimeout(initMap, 200);
            } else if (map) {
                setTimeout(() => map.invalidateSize(), 200);
            }
        } else {
            modal.classList.add('hidden');
        }
    }

    function initMap() {
        if (mapInitialized) return;
        
        map = L.map('umkm-map', { zoomControl: false }).setView([-6.223, 106.702], 14);
        L.control.zoom({ position: 'topright' }).addTo(map);

        L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        const customIcon = L.divIcon({
            className: 'custom-pin',
            html: `<div class="w-9 h-9 bg-gradient-to-br from-[#FF4500] to-[#FF7043] rounded-full flex items-center justify-center text-white text-lg shadow-lg border-2 border-white transform transition-transform hover:scale-110">📍</div>`,
            iconSize: [36, 36],
            iconAnchor: [18, 36]
        });

        const stores = @json($stores->items());
        
        stores.forEach(function(store) {
            const lat = store.latitude || (-6.223 + (Math.random() - 0.5) * 0.02);
            const lng = store.longitude || (106.702 + (Math.random() - 0.5) * 0.02);
            
            const marker = L.marker([lat, lng], {icon: customIcon}).addTo(map);
            
            marker.bindPopup(`
                <div class="text-center p-1.5 font-sans">
                    <span class="text-[10px] uppercase font-bold text-stone-400 block mb-0.5">${store.landmark || 'Tanah Seratus'}</span>
                    <strong class="text-[#FF4500] font-black text-sm block mb-2">${store.name}</strong>
                    <a href="/toko/${store.slug}" class="inline-block bg-[#FF4500] text-white px-3.5 py-1.5 rounded-full text-xs font-extrabold hover:bg-[#E63900] transition-colors shadow-sm">
                        Kunjungi Toko 👉
                    </a>
                </div>
            `, {
                closeButton: false,
                className: 'custom-leaflet-popup'
            });
        });

        mapInitialized = true;
    }
</script>
<style>
    .custom-leaflet-popup .leaflet-popup-content-wrapper {
        border-radius: 18px;
        box-shadow: 0 12px 30px rgba(0,0,0,0.12);
        padding: 4px;
        border: 1px solid #FAF5EE;
    }
    .custom-leaflet-popup .leaflet-popup-tip {
        background: white;
    }
</style>
@endpush
@endsection
