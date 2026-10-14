<x-app-layout>
    <!-- Background styling overlay to ensure app layout looks seamless -->
    <div class="min-h-screen bg-[#FDF8F5] pb-12">
        
        <!-- Hero Section -->
        <div class="relative bg-[linear-gradient(135deg,#FD6600_0%,#FF944B_100%)] overflow-hidden">
            <!-- Decorative Background Elements -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute -top-24 -left-24 w-96 h-96 bg-white rounded-full mix-blend-overlay filter blur-3xl"></div>
                <div class="absolute top-1/2 -right-24 w-72 h-72 bg-[#F8C600] rounded-full mix-blend-overlay filter blur-3xl"></div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 relative z-10 text-center">
                <span class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full mb-6 border border-white/30 text-white font-semibold text-sm shadow-sm">
                    ðŸ“ Kawasan Tanah Seratus
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 tracking-tight drop-shadow-md">
                    Cari Jajanan & Jasa <br class="hidden sm:block"> 
                    <span class="text-[#F8C600]">Sekitarmu</span> Lebih Mudah!
                </h1>
                <p class="text-lg text-orange-50 max-w-2xl mx-auto mb-10 font-medium">
                    Jelajahi direktori UMKM lokal terlengkap. Beli kebutuhanmu dan dukung tetanggamu hari ini.
                </p>

                <!-- Search Bar -->
                <div class="max-w-2xl mx-auto relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-6 w-6 text-gray-400 group-focus-within:text-[#FD6600] transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" 
                        class="block w-full pl-12 pr-32 py-4 border-0 rounded-2xl leading-5 bg-white shadow-xl placeholder-gray-400 focus:outline-none focus:ring-4 focus:ring-white/40 focus:bg-white sm:text-lg transition-all duration-300" 
                        placeholder="Cari warung, makanan, jasa...">
                    <button class="absolute inset-y-2 right-2 flex items-center justify-center px-6 border border-transparent text-sm font-bold rounded-xl text-white bg-[#FD6600] hover:bg-[#E65C00] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FD6600] shadow-md hover:shadow-lg transition-all duration-200">
                        Cari
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-20">
            
            <!-- Category Pills -->
            <div class="flex items-center gap-3 overflow-x-auto pb-4 hide-scrollbar snap-x">
                <button class="snap-start shrink-0 px-6 py-2.5 rounded-full font-bold text-sm bg-[#FD6600] text-white shadow-lg shadow-orange-500/30 border border-transparent transition-all">
                    Semua Kategori
                </button>
                <button class="snap-start shrink-0 px-6 py-2.5 rounded-full font-bold text-sm bg-white text-gray-600 hover:text-[#FD6600] hover:bg-orange-50 border border-gray-200 shadow-sm transition-all">
                    ðŸœ Makanan
                </button>
                <button class="snap-start shrink-0 px-6 py-2.5 rounded-full font-bold text-sm bg-white text-gray-600 hover:text-[#FD6600] hover:bg-orange-50 border border-gray-200 shadow-sm transition-all">
                    ðŸ§‹ Minuman
                </button>
                <button class="snap-start shrink-0 px-6 py-2.5 rounded-full font-bold text-sm bg-white text-gray-600 hover:text-[#FD6600] hover:bg-orange-50 border border-gray-200 shadow-sm transition-all">
                    ðŸ›’ Warung Kelontong
                </button>
                <button class="snap-start shrink-0 px-6 py-2.5 rounded-full font-bold text-sm bg-white text-gray-600 hover:text-[#FD6600] hover:bg-orange-50 border border-gray-200 shadow-sm transition-all">
                    ðŸ› ï¸ Jasa
                </button>
            </div>

            <!-- Stores Grid -->
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                
                <!-- Dummy Card 1: Makanan (Buka) -->
                <div class="bg-white rounded-[1.5rem] shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group border border-gray-100 flex flex-col">
                    <div class="relative h-48 w-full overflow-hidden bg-gray-200">
                        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?q=80&w=600&auto=format&fit=crop" alt="Mie Ayam Pak Min" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-in-out">
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-80"></div>
                        <!-- Status Badge -->
                        <div class="absolute top-4 right-4 bg-green-500/90 backdrop-blur-sm text-white text-xs font-extrabold px-3 py-1.5 rounded-full shadow-lg flex items-center gap-1.5 border border-green-400/50">
                            <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span> BUKA
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <div class="flex items-start justify-between mb-2">
                            <h3 class="font-extrabold text-xl text-gray-900 leading-tight">Mie Ayam Pak Min</h3>
                        </div>
                        <p class="text-sm text-gray-500 font-medium flex items-center gap-1.5 mb-4 line-clamp-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.242-4.243a8 8 0 1111.314 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Depan Gapura RT 01, Samping Masjid
                        </p>
                        
                        <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                            <span class="inline-flex items-center gap-1 text-xs font-bold text-gray-500 bg-gray-100 px-2.5 py-1 rounded-md">
                                ðŸœ Makanan
                            </span>
                            <button class="text-sm font-bold text-[#FD6600] group-hover:text-[#E65C00] flex items-center gap-1 transition-colors">
                                Lihat Detail
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Dummy Card 2: Kelontong (Tutup) -->
                <div class="bg-white rounded-[1.5rem] shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group border border-gray-100 flex flex-col">
                    <div class="relative h-48 w-full overflow-hidden bg-gray-200">
                        <img src="https://images.unsplash.com/photo-1604719312566-8fa2065b749a?q=80&w=600&auto=format&fit=crop" alt="Warung Bu Nani" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-in-out grayscale">
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-80"></div>
                        <!-- Status Badge -->
                        <div class="absolute top-4 right-4 bg-gray-500/90 backdrop-blur-sm text-white text-xs font-extrabold px-3 py-1.5 rounded-full shadow-lg flex items-center gap-1.5 border border-gray-400/50">
                            <span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span> TUTUP
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <div class="flex items-start justify-between mb-2">
                            <h3 class="font-extrabold text-xl text-gray-900 leading-tight">Warung Bu Nani</h3>
                        </div>
                        <p class="text-sm text-gray-500 font-medium flex items-center gap-1.5 mb-4 line-clamp-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.242-4.243a8 8 0 1111.314 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Masuk Gang H. Soleh 20 meter, pagar ijo
                        </p>
                        
                        <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                            <span class="inline-flex items-center gap-1 text-xs font-bold text-gray-500 bg-gray-100 px-2.5 py-1 rounded-md">
                                ðŸ›’ Kelontong
                            </span>
                            <button class="text-sm font-bold text-[#FD6600] group-hover:text-[#E65C00] flex items-center gap-1 transition-colors">
                                Lihat Detail
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Dummy Card 3: Minuman (Buka) -->
                <div class="bg-white rounded-[1.5rem] shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group border border-gray-100 flex flex-col">
                    <div class="relative h-48 w-full overflow-hidden bg-gray-200">
                        <img src="https://images.unsplash.com/photo-1544145945-f90425340c7e?q=80&w=600&auto=format&fit=crop" alt="Es Teh Solo Seger" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-in-out">
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-80"></div>
                        <!-- Status Badge -->
                        <div class="absolute top-4 right-4 bg-green-500/90 backdrop-blur-sm text-white text-xs font-extrabold px-3 py-1.5 rounded-full shadow-lg flex items-center gap-1.5 border border-green-400/50">
                            <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span> BUKA
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <div class="flex items-start justify-between mb-2">
                            <h3 class="font-extrabold text-xl text-gray-900 leading-tight">Es Teh Solo Seger</h3>
                        </div>
                        <p class="text-sm text-gray-500 font-medium flex items-center gap-1.5 mb-4 line-clamp-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.242-4.243a8 8 0 1111.314 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Jalan Utama, Samping Indomaret
                        </p>
                        
                        <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                            <span class="inline-flex items-center gap-1 text-xs font-bold text-gray-500 bg-gray-100 px-2.5 py-1 rounded-md">
                                ðŸ§‹ Minuman
                            </span>
                            <button class="text-sm font-bold text-[#FD6600] group-hover:text-[#E65C00] flex items-center gap-1 transition-colors">
                                Lihat Detail
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Dummy Card 4: Jasa (Buka) -->
                <div class="bg-white rounded-[1.5rem] shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group border border-gray-100 flex flex-col">
                    <div class="relative h-48 w-full overflow-hidden bg-gray-200">
                        <img src="https://images.unsplash.com/photo-1621905252507-b35492cc74b4?q=80&w=600&auto=format&fit=crop" alt="Bengkel Motor Berkah" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-in-out">
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-80"></div>
                        <!-- Status Badge -->
                        <div class="absolute top-4 right-4 bg-green-500/90 backdrop-blur-sm text-white text-xs font-extrabold px-3 py-1.5 rounded-full shadow-lg flex items-center gap-1.5 border border-green-400/50">
                            <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span> BUKA
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <div class="flex items-start justify-between mb-2">
                            <h3 class="font-extrabold text-xl text-gray-900 leading-tight">Bengkel Motor Berkah</h3>
                        </div>
                        <p class="text-sm text-gray-500 font-medium flex items-center gap-1.5 mb-4 line-clamp-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.242-4.243a8 8 0 1111.314 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Pos Ronda Belok Kanan, Rumah Cat Biru
                        </p>
                        
                        <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                            <span class="inline-flex items-center gap-1 text-xs font-bold text-gray-500 bg-gray-100 px-2.5 py-1 rounded-md">
                                ðŸ› ï¸ Jasa
                            </span>
                            <button class="text-sm font-bold text-[#FD6600] group-hover:text-[#E65C00] flex items-center gap-1 transition-colors">
                                Lihat Detail
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            
            <!-- Load More Button (Dummy) -->
            <div class="mt-12 text-center">
                <button class="inline-flex items-center justify-center px-8 py-3.5 border border-gray-200 text-sm font-bold rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FD6600] shadow-sm transition-all">
                    Muat Lebih Banyak
                </button>
            </div>
            
        </div>
    </div>

    <!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
         BUYER FLOWCHART â€” ILLUSTRATED INFOGRAPHIC (User Page)
         â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
    <section class="relative py-20 overflow-hidden bg-[#fdfaf6]">
        <!-- Dot-grid texture -->
        <div class="absolute inset-0 pointer-events-none" style="background-image: radial-gradient(circle, #e2e8f0 1.5px, transparent 1.5px); background-size: 28px 28px; opacity:0.55;"></div>

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <!-- Header -->
            <div class="text-center mb-14">
                <div class="inline-flex items-center gap-2 bg-[#FD6600]/10 border border-[#FD6600]/20 px-5 py-2 rounded-full text-xs font-black text-[#FD6600] uppercase tracking-widest mb-5">
                    ðŸ“– Panduan Akun
                </div>
                <h2 class="text-3xl sm:text-4xl font-black text-gray-900 tracking-tight">
                    Alur <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#FD6600] to-[#FF944B]">Daftar &amp; Login</span> Pembeli
                </h2>
                <p class="mt-3 text-gray-500 font-medium">Panduan lengkap untuk buat akun &amp; mulai jelajahi UMKM lokal</p>
            </div>

            <!-- ROW 1: DAFTAR BARU -->
            <div class="mb-12">
                <div class="flex items-center gap-4 mb-7">
                    <div class="flex items-center gap-3 flex-shrink-0">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#FD6600] to-[#FF944B] flex items-center justify-center shadow-lg shadow-orange-500/25 flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none">Alur 1</p>
                            <p class="text-sm font-black text-gray-800 mt-0.5">Daftar Akun Baru</p>
                        </div>
                    </div>
                    <div class="flex-1 h-px bg-gradient-to-r from-orange-200 to-transparent"></div>
                    <a href="{{ route('register') }}" class="flex-shrink-0 text-xs font-black text-[#FD6600] hover:underline">Daftar â†’</a>
                </div>

                <div class="grid grid-cols-3 sm:grid-cols-6 gap-3">
                    <div class="ib-step-ud group"><span class="ib-num-ud">1</span><div class="ib-icon-ud bg-slate-100 group-hover:bg-slate-200 group-hover:scale-110"><svg class="w-7 h-7 text-slate-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg></div><p class="ib-label-ud">Buka<br>LocalKita.id</p></div>

                    <div class="ib-step-ud group"><span class="ib-num-ud" style="background:#FD6600">2</span><div class="ib-icon-ud bg-orange-50 group-hover:bg-orange-100 group-hover:scale-110"><svg class="w-7 h-7 text-[#FD6600]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg></div><p class="ib-label-ud">Klik<br>"Daftar"</p></div>

                    <div class="ib-step-ud group"><span class="ib-num-ud" style="background:#3b82f6">3</span><div class="ib-icon-ud bg-blue-50 group-hover:bg-blue-100 group-hover:scale-110"><svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div><p class="ib-label-ud">Pilih Role<br><strong class="text-blue-600">"Pembeli"</strong></p></div>

                    <div class="ib-step-ud group"><span class="ib-num-ud" style="background:#7c3aed">4</span><div class="ib-icon-ud bg-violet-50 group-hover:bg-violet-100 group-hover:scale-110"><svg class="w-7 h-7 text-violet-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></div><p class="ib-label-ud">Isi Nama,<br>Email, Password</p></div>

                    <div class="ib-step-ud group"><span class="ib-num-ud" style="background:#dc2626">5</span><div class="ib-icon-ud bg-red-50 group-hover:bg-red-100 group-hover:scale-110"><svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg></div><p class="ib-label-ud">Klik "Daftar<br>Sekarang"</p></div>

                    <div class="ib-step-ud group border-2 border-green-200"><span class="ib-num-ud" style="background:#16a34a">âœ“</span><div class="ib-icon-ud bg-green-50 group-hover:bg-green-100 group-hover:scale-110"><svg class="w-7 h-7 text-green-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><p class="ib-label-ud text-green-700 font-black">Akun Aktif!<br>Auto Login ðŸŽ‰</p></div>
                </div>
            </div>

            <!-- Divider OR -->
            <div class="relative flex items-center my-10">
                <div class="flex-1 h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent"></div>
                <div class="mx-5 px-4 py-1.5 bg-white border border-gray-200 rounded-full text-xs font-black text-gray-400 shadow-sm tracking-widest">ATAU</div>
                <div class="flex-1 h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent"></div>
            </div>

            <!-- ROW 2: LOGIN -->
            <div>
                <div class="flex items-center gap-4 mb-7">
                    <div class="flex items-center gap-3 flex-shrink-0">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-slate-700 to-slate-900 flex items-center justify-center shadow-lg flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none">Alur 2</p>
                            <p class="text-sm font-black text-gray-800 mt-0.5">Login / Masuk</p>
                        </div>
                    </div>
                    <div class="flex-1 h-px bg-gradient-to-r from-gray-200 to-transparent"></div>
                    <a href="{{ route('login') }}" class="flex-shrink-0 text-xs font-black text-gray-500 hover:text-gray-800 hover:underline">Masuk â†’</a>
                </div>

                <div class="grid grid-cols-3 sm:grid-cols-5 gap-3">
                    <div class="ib-step-ud group"><span class="ib-num-ud">1</span><div class="ib-icon-ud bg-slate-100 group-hover:bg-slate-200 group-hover:scale-110"><svg class="w-7 h-7 text-slate-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg></div><p class="ib-label-ud">Buka<br>LocalKita.id</p></div>

                    <div class="ib-step-ud group"><span class="ib-num-ud" style="background:#FD6600">2</span><div class="ib-icon-ud bg-orange-50 group-hover:bg-orange-100 group-hover:scale-110"><svg class="w-7 h-7 text-[#FD6600]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg></div><p class="ib-label-ud">Klik<br>"Masuk"</p></div>

                    <div class="ib-step-ud group"><span class="ib-num-ud" style="background:#7c3aed">3</span><div class="ib-icon-ud bg-violet-50 group-hover:bg-violet-100 group-hover:scale-110"><svg class="w-7 h-7 text-violet-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg></div><p class="ib-label-ud">Masukkan<br>Email &amp; Password</p></div>

                    <div class="ib-step-ud group"><span class="ib-num-ud" style="background:#d97706">4</span><div class="ib-icon-ud bg-amber-50 group-hover:bg-amber-100 group-hover:scale-110"><svg class="w-7 h-7 text-amber-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg></div><p class="ib-label-ud">Sistem<br>Verifikasi</p></div>

                    <div class="ib-step-ud group border-2 border-green-200 col-span-3 sm:col-span-1"><span class="ib-num-ud" style="background:#16a34a">âœ“</span><div class="ib-icon-ud bg-green-50 group-hover:bg-green-100 group-hover:scale-110"><svg class="w-7 h-7 text-green-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><p class="ib-label-ud text-green-700 font-black">Login Berhasil!<br>Jelajahi UMKM âœ…</p></div>
                </div>

                <div class="mt-8 flex flex-col sm:flex-row gap-3 justify-center items-center">
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-[#FD6600] to-[#FF944B] text-white font-black px-7 py-3.5 rounded-2xl shadow-lg shadow-orange-500/25 hover:-translate-y-1 hover:shadow-orange-500/35 transition-all text-sm">
                        âœ¨ Daftar Akun Baru
                    </a>
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-2 bg-white border-2 border-gray-200 text-gray-700 font-black px-7 py-3.5 rounded-2xl hover:border-[#FD6600] hover:text-[#FD6600] transition-all text-sm">
                        ðŸ” Masuk ke Akun
                    </a>
                    <a href="{{ route('password.request') }}" class="text-xs text-gray-400 hover:text-[#FD6600] font-semibold transition-colors">
                        Lupa password?
                    </a>
                </div>
            </div>
        </div>
    </section>

    <style>
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

    /* Infographic step (user dashboard variant) */
    .ib-step-ud {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 18px 8px 14px;
        background: white;
        border-radius: 18px;
        border: 1.5px solid #f1f5f9;
        box-shadow: 0 2px 14px rgba(0,0,0,0.04);
        position: relative;
        transition: all 0.28s cubic-bezier(.34,1.56,.64,1);
        gap: 9px;
    }
    .ib-step-ud:hover {
        transform: translateY(-6px);
        box-shadow: 0 14px 32px rgba(253,102,0,0.11);
        border-color: #fed7aa;
    }
    .ib-num-ud {
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
    .ib-icon-ud {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.25s ease;
    }
    .ib-label-ud {
        font-size: 11px;
        font-weight: 700;
        color: #334155;
        line-height: 1.4;
    }
    </style>
</x-app-layout>
