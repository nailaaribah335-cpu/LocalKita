<x-seller-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Dashboard Penjual') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto space-y-6">
            
            {{-- Flash Message --}}
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            {{-- Store Overview --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col md:flex-row items-center justify-between p-6">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-xl bg-gray-200 overflow-hidden border">
                        <img src="{{ $store->image ?? 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=150' }}" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">{{ $store->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $store->landmark }}</p>
                    </div>
                </div>
                
                <div class="mt-4 md:mt-0 flex gap-3">
                    <a href="{{ route('seller.store.edit') }}" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-gray-50 transition-colors">
                        Edit Profil Toko
                    </a>
                    <a href="{{ route('buyer.stores.show', $store->slug) }}" target="_blank" class="bg-brand-500 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-brand-600 transition-colors">
                        Lihat Toko Publik
                    </a>
                </div>
            </div>

            {{-- Stats Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Status --}}
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 flex flex-col justify-center items-center text-center">
                    <span class="text-gray-500 text-sm font-semibold mb-2">Status Operasional</span>
                    @if($store->status === 'open')
                        <span class="px-4 py-1.5 bg-green-100 text-green-700 rounded-full font-bold">Buka Sekarang</span>
                    @else
                        <span class="px-4 py-1.5 bg-red-100 text-red-600 rounded-full font-bold">Sedang Tutup</span>
                    @endif
                </div>

                {{-- Total Products --}}
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 flex flex-col justify-center items-center text-center">
                    <span class="text-gray-500 text-sm font-semibold mb-2">Total Produk (Katalog)</span>
                    <span class="text-3xl font-black text-brand-600">{{ $totalProducts }}</span>
                    <a href="{{ route('seller.products.index') }}" class="text-xs text-brand-500 font-semibold mt-2 hover:underline">Kelola Katalog &rarr;</a>
                </div>

                {{-- Total Bookmarks --}}
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 flex flex-col justify-center items-center text-center">
                    <span class="text-gray-500 text-sm font-semibold mb-2">Disimpan Pelanggan</span>
                    <span class="text-3xl font-black text-pink-600">{{ $totalBookmarks }} <span class="text-lg">â¤ï¸</span></span>
                </div>
            </div>

            {{-- Recent Products --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Produk Terbaru</h3>
                    <a href="{{ route('seller.products.create') }}" class="text-sm bg-brand-50 text-brand-600 px-3 py-1.5 rounded-lg font-semibold hover:bg-brand-100">
                        + Tambah Produk
                    </a>
                </div>

                @if($recentProducts->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4">
                        @foreach($recentProducts as $product)
                            <div class="border border-gray-100 rounded-xl p-3 flex flex-col">
                                <div class="w-full h-24 bg-gray-100 rounded-lg overflow-hidden mb-2">
                                    <img src="{{ $product->image ?? 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=150' }}" class="w-full h-full object-cover">
                                </div>
                                <span class="text-[10px] text-gray-400 uppercase font-bold">{{ $product->category->name ?? 'Umum' }}</span>
                                <h4 class="font-semibold text-sm text-gray-800 truncate">{{ $product->name }}</h4>
                                <span class="text-brand-600 font-bold text-sm">{{ $product->formatted_price }}</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 bg-gray-50 rounded-xl border border-dashed border-gray-200">
                        <p class="text-gray-500 font-medium">Belum ada produk di katalogmu.</p>
                    </div>
                @endif
            </div>

            {{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
                 SELLER FLOWCHART â€” ILLUSTRATED INFOGRAPHIC
                 â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}
            <div class="relative rounded-3xl overflow-hidden" id="seller-flowchart">

                {{-- Background: dot grid on light --}}
                <div class="absolute inset-0 bg-[#fdfaf6]"></div>
                <div class="absolute inset-0 pointer-events-none" style="background-image: radial-gradient(circle, #e2e8f0 1.5px, transparent 1.5px); background-size: 28px 28px; opacity:0.55;"></div>
                {{-- Subtle orange glow top-right --}}
                <div class="absolute top-0 right-0 w-64 h-64 bg-orange-200/30 rounded-full translate-x-1/3 -translate-y-1/3 blur-3xl pointer-events-none"></div>

                <div class="relative z-10 p-6 lg:p-10">

                    {{-- Section header --}}
                    <div class="text-center mb-12">
                        <div class="inline-flex items-center gap-2 bg-[#FD6600]/10 border border-[#FD6600]/20 px-5 py-2 rounded-full text-xs font-black text-[#FD6600] uppercase tracking-widest mb-4">
                            ðŸª Panduan Penjual UMKM
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">
                            Alur <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#FD6600] to-[#FF944B]">Daftar &amp; Login</span> Penjual
                        </h2>
                        <p class="mt-2 text-slate-500 text-sm font-medium">Proses lengkap dari daftar hingga toko aktif &amp; siap dikelola</p>
                    </div>

                    {{-- â”€â”€ ROW 1: DAFTAR BARU PENJUAL â”€â”€ --}}
                    <div class="mb-10">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="flex items-center gap-3 flex-shrink-0">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#FD6600] to-[#FF944B] flex items-center justify-center shadow-lg shadow-orange-500/25 flex-shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none">Alur 1</p>
                                    <p class="text-sm font-black text-slate-800 mt-0.5">Daftar sebagai Penjual</p>
                                </div>
                            </div>
                            <div class="flex-1 h-px bg-gradient-to-r from-orange-200 to-transparent"></div>
                            <a href="{{ route('register') }}" class="flex-shrink-0 text-xs font-black text-[#FD6600] hover:underline">Daftar â†’</a>
                        </div>

                        {{-- 6 steps + admin approval --}}
                        <div class="grid grid-cols-3 sm:grid-cols-7 gap-2 sm:gap-3">

                            <div class="ib-step-sl group"><span class="ib-num-sl">1</span><div class="ib-icon-sl bg-slate-100 group-hover:bg-slate-200 group-hover:scale-110"><svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg></div><p class="ib-label-sl">Buka<br>LocalKita.id</p></div>

                            <div class="ib-step-sl group"><span class="ib-num-sl" style="background:#FD6600">2</span><div class="ib-icon-sl bg-orange-50 group-hover:bg-orange-100 group-hover:scale-110"><svg class="w-6 h-6 text-[#FD6600]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg></div><p class="ib-label-sl">Klik<br>"Daftar"</p></div>

                            <div class="ib-step-sl group border-2 border-amber-300"><span class="ib-num-sl" style="background:#d97706">3</span><div class="ib-icon-sl bg-amber-50 group-hover:bg-amber-100 group-hover:scale-110"><svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg></div><p class="ib-label-sl">Pilih <strong class="text-amber-700">"Pemilik<br>UMKM"</strong></p><span class="text-[8px] font-black text-amber-600 bg-amber-100 px-1.5 py-0.5 rounded-full">âš ï¸ PENTING</span></div>

                            <div class="ib-step-sl group"><span class="ib-num-sl" style="background:#7c3aed">4</span><div class="ib-icon-sl bg-violet-50 group-hover:bg-violet-100 group-hover:scale-110"><svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></div><p class="ib-label-sl">Isi Nama,<br>Email, Password</p></div>

                            <div class="ib-step-sl group"><span class="ib-num-sl" style="background:#2563eb">5</span><div class="ib-icon-sl bg-blue-50 group-hover:bg-blue-100 group-hover:scale-110"><svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg></div><p class="ib-label-sl">Sistem Buat<br>Toko Otomatis</p></div>

                            <div class="ib-step-sl group border-2 border-slate-300"><span class="ib-num-sl" style="background:#475569">6</span><div class="ib-icon-sl bg-slate-50 group-hover:bg-slate-100 group-hover:scale-110"><svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg></div><p class="ib-label-sl">Admin<br>Verifikasi</p></div>

                            <div class="ib-step-sl group border-2 border-green-200 col-span-3 sm:col-span-1"><span class="ib-num-sl" style="background:#16a34a">âœ“</span><div class="ib-icon-sl bg-green-50 group-hover:bg-green-100 group-hover:scale-110"><svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><p class="ib-label-sl text-green-700 font-black">Toko Aktif!<br>Siap Jualan ðŸŽ‰</p></div>

                        </div>

                        {{-- Admin approval info box --}}
                        <div class="mt-4 bg-slate-50 border border-slate-200 rounded-2xl p-4 flex flex-col sm:flex-row items-start sm:items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-slate-200 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-xs font-black text-slate-700 mb-1">â„¹ï¸ Tentang Proses Verifikasi Admin (Langkah 6)</p>
                                <p class="text-[11px] text-slate-500 font-medium">Setelah mendaftar, tokomu akan otomatis dibuat namun berstatus <strong class="text-amber-600">menunggu persetujuan</strong>. Tim LocalKita akan meninjau dan mengaktifkan toko dalam waktu 1Ã—24 jam.</p>
                            </div>
                            <div class="flex gap-2 flex-shrink-0">
                                <div class="text-center px-3 py-2 bg-green-50 border border-green-200 rounded-xl">
                                    <p class="text-green-600 font-black text-[10px]">âœ… Disetujui</p>
                                    <p class="text-slate-400 text-[9px]">Toko tampil publik</p>
                                </div>
                                <div class="text-center px-3 py-2 bg-red-50 border border-red-200 rounded-xl">
                                    <p class="text-red-500 font-black text-[10px]">âŒ Ditolak</p>
                                    <p class="text-slate-400 text-[9px]">Hub. admin</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Divider --}}
                    <div class="relative flex items-center my-8">
                        <div class="flex-1 h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>
                        <div class="mx-5 px-4 py-1.5 bg-white border border-slate-200 rounded-full text-xs font-black text-slate-400 shadow-sm tracking-widest">ATAU</div>
                        <div class="flex-1 h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>
                    </div>

                    {{-- â”€â”€ ROW 2: LOGIN PENJUAL â”€â”€ --}}
                    <div>
                        <div class="flex items-center gap-3 mb-6">
                            <div class="flex items-center gap-3 flex-shrink-0">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-slate-700 to-slate-900 flex items-center justify-center shadow-lg flex-shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none">Alur 2</p>
                                    <p class="text-sm font-black text-slate-800 mt-0.5">Login / Masuk</p>
                                </div>
                            </div>
                            <div class="flex-1 h-px bg-gradient-to-r from-slate-200 to-transparent"></div>
                            <a href="{{ route('login') }}" class="flex-shrink-0 text-xs font-black text-slate-500 hover:text-slate-800 hover:underline">Masuk â†’</a>
                        </div>

                        <div class="grid grid-cols-3 sm:grid-cols-5 gap-2 sm:gap-3">

                            <div class="ib-step-sl group"><span class="ib-num-sl">1</span><div class="ib-icon-sl bg-slate-100 group-hover:bg-slate-200 group-hover:scale-110"><svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg></div><p class="ib-label-sl">Buka<br>LocalKita.id</p></div>

                            <div class="ib-step-sl group"><span class="ib-num-sl" style="background:#FD6600">2</span><div class="ib-icon-sl bg-orange-50 group-hover:bg-orange-100 group-hover:scale-110"><svg class="w-6 h-6 text-[#FD6600]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg></div><p class="ib-label-sl">Klik<br>"Masuk"</p></div>

                            <div class="ib-step-sl group"><span class="ib-num-sl" style="background:#7c3aed">3</span><div class="ib-icon-sl bg-violet-50 group-hover:bg-violet-100 group-hover:scale-110"><svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg></div><p class="ib-label-sl">Masukkan<br>Email &amp; Password</p></div>

                            <div class="ib-step-sl group"><span class="ib-num-sl" style="background:#d97706">4</span><div class="ib-icon-sl bg-amber-50 group-hover:bg-amber-100 group-hover:scale-110"><svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg></div><p class="ib-label-sl">Sistem<br>Verifikasi</p></div>

                            <div class="ib-step-sl group border-2 border-green-200 col-span-3 sm:col-span-1"><span class="ib-num-sl" style="background:#16a34a">âœ“</span><div class="ib-icon-sl bg-green-50 group-hover:bg-green-100 group-hover:scale-110"><svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><p class="ib-label-sl text-green-700 font-black">Masuk ke<br>Dashboard âœ…</p></div>

                        </div>

                        <div class="mt-6 text-center">
                            <a href="{{ route('password.request') }}" class="inline-flex items-center gap-2 text-xs text-slate-400 hover:text-[#FD6600] font-semibold transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
                                Lupa password? Reset via email
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <style>
    /* Infographic step (seller dashboard) */
    .ib-step-sl {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 18px 6px 14px;
        background: white;
        border-radius: 18px;
        border: 1.5px solid #f1f5f9;
        box-shadow: 0 2px 14px rgba(0,0,0,0.04);
        position: relative;
        transition: all 0.28s cubic-bezier(.34,1.56,.64,1);
        gap: 8px;
    }
    .ib-step-sl:hover {
        transform: translateY(-6px);
        box-shadow: 0 14px 32px rgba(253,102,0,0.11);
        border-color: #fed7aa;
    }
    .ib-num-sl {
        position: absolute;
        top: -12px;
        left: 50%;
        transform: translateX(-50%);
        min-width: 26px;
        height: 26px;
        padding: 0 5px;
        border-radius: 50px;
        background: #1e293b;
        color: white;
        font-size: 10px;
        font-weight: 900;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 3px solid white;
        box-shadow: 0 2px 8px rgba(0,0,0,0.18);
        z-index: 2;
    }
    .ib-icon-sl {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.25s ease;
    }
    .ib-label-sl {
        font-size: 10.5px;
        font-weight: 700;
        color: #334155;
        line-height: 1.4;
    }
    </style>
</x-seller-layout>
