<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Daftar - LocalKita</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-[#FDF8F5]">
    <div class="min-h-screen lg:h-screen w-full flex">
        
        <!-- Left Side (Visuals/Poster like) -->
        <div class="hidden lg:flex lg:w-1/2 bg-[linear-gradient(135deg,#FD6600_0%,#FF944B_100%)] flex-col justify-center items-center relative overflow-hidden">
            
            <!-- Decorative Elements -->
            <div class="absolute top-0 left-0 w-80 h-80 bg-white opacity-10 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-[30rem] h-[30rem] bg-[#F8C600] opacity-20 rounded-full translate-x-1/3 translate-y-1/3"></div>
            <div class="absolute top-1/4 right-1/4 w-12 h-12 border-4 border-white opacity-20 rounded-full"></div>
            <div class="absolute bottom-1/4 left-1/4 w-16 h-16 border-4 border-[#F8C600] opacity-30 rounded-full"></div>
            
            <!-- Poster Content -->
            <div class="relative z-10 text-center px-12 max-w-lg flex flex-col items-center">
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-md px-5 py-2 rounded-full mb-8 border border-white/30 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-white font-bold text-sm tracking-wide">Yuk, dukung #UMKMLokal!</span>
                </div>
                
                <!-- Main Headline -->
                <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-6 drop-shadow-lg leading-[1.15] uppercase tracking-tight">
                    Coba Nikmatnya <br> 
                    <span class="text-[#F8C600]">Jajanan & Jasa</span> <br>
                    Sekitarmu!
                </h1>
                
                <p class="text-lg text-white/95 font-medium leading-relaxed mb-10">
                    Dari warga untuk warga. Gak perlu repot nyari, semua ada di LocalKita.
                </p>
                
                <!-- Mockup Element like the map or pin -->
                <div class="bg-white rounded-2xl p-5 shadow-2xl transform rotate-2 hover:rotate-0 transition-transform duration-300 max-w-sm w-full relative">
                    <!-- Pin decoration -->
                    <div class="absolute -top-4 -right-4 w-10 h-10 bg-[#F8C600] rounded-full flex items-center justify-center shadow-lg transform rotate-12">
                        <span class="text-white font-bold text-xl">📌</span>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-full bg-orange-50 flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-[#FD6600]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.242-4.243a8 8 0 1111.314 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <p class="text-gray-900 font-extrabold text-lg">Anti Nyasar!</p>
                            <p class="text-gray-500 text-sm font-medium">Ada peta lokasi usahanya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Right Side (Form Register) -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-4 sm:p-8 relative">
            
            <!-- Subtle background blob wrapper -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none -z-10">
                <div class="absolute top-1/4 -right-20 w-[500px] h-[500px] bg-orange-100/50 rounded-full blur-3xl"></div>
            </div>

            <div class="max-w-md w-full space-y-5 bg-white/90 backdrop-blur-sm p-6 sm:p-10 rounded-3xl sm:rounded-[2rem] shadow-[0_8px_30px_rgb(253,102,0,0.06)] border border-orange-50 relative my-auto">
                
                <!-- Logo Mobile (Shown only on small screens) -->
                <div class="lg:hidden text-center mb-5">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-orange-50 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#FD6600]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                    </div>
                    <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-[linear-gradient(86deg,#FD6700_4.98%,#FF944B_94.22%)]">LocalKita</h1>
                </div>

                <!-- Header Register -->
                <div class="text-center lg:text-left">
                    <h2 class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight">
                        Buat Akun Baru ✨
                    </h2>
                    <p class="mt-2 text-sm text-gray-500 font-medium">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="font-bold text-[#FD6600] hover:text-[#E65C00] transition-colors ml-1">
                            Masuk di sini
                        </a>
                    </p>
                </div>
                
                <!-- Form Register -->
                <form class="mt-6 space-y-4" action="{{ route('register') }}" method="POST">
                    @csrf
                    
                    <!-- Role Selector -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Daftar Sebagai</label>
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Option Buyer -->
                            <label class="relative flex cursor-pointer rounded-xl border border-gray-200 bg-gray-50 p-3 shadow-sm focus-within:ring-2 focus-within:ring-[#FD6600]/20 hover:bg-white transition-all duration-200">
                                <input type="radio" name="role" value="buyer" class="sr-only peer" checked>
                                <div class="peer-checked:border-[#FD6600] peer-checked:bg-orange-50 absolute inset-0 rounded-xl border-2 border-transparent transition-all"></div>
                                <div class="relative flex items-center justify-center w-full gap-2 z-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 peer-checked:text-[#FD6600] transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-sm font-bold text-gray-700 peer-checked:text-[#FD6600] transition-colors">Pembeli</span>
                                </div>
                            </label>

                            <!-- Option Seller -->
                            <label class="relative flex cursor-pointer rounded-xl border border-gray-200 bg-gray-50 p-3 shadow-sm focus-within:ring-2 focus-within:ring-[#FD6600]/20 hover:bg-white transition-all duration-200">
                                <input type="radio" name="role" value="seller" class="sr-only peer">
                                <div class="peer-checked:border-[#FD6600] peer-checked:bg-orange-50 absolute inset-0 rounded-xl border-2 border-transparent transition-all"></div>
                                <div class="relative flex items-center justify-center w-full gap-2 z-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 peer-checked:text-[#FD6600] transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span class="text-sm font-bold text-gray-700 peer-checked:text-[#FD6600] transition-colors">Pemilik UMKM</span>
                                </div>
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('role')" class="mt-1" />
                    </div>

                    <!-- Input Name -->
                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-1.5">Nama Lengkap</label>
                        <input id="name" name="name" type="text" autocomplete="name" required autofocus value="{{ old('name') }}"
                            class="appearance-none block w-full px-4 py-2.5 border border-gray-200 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#FD6600]/20 focus:border-[#FD6600] sm:text-sm bg-gray-50 focus:bg-white transition-all duration-200 font-medium text-gray-900" 
                            placeholder="John Doe">
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <!-- Input Email -->
                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-1.5">Alamat Email</label>
                        <input id="email" name="email" type="email" autocomplete="username" required value="{{ old('email') }}"
                            class="appearance-none block w-full px-4 py-2.5 border border-gray-200 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#FD6600]/20 focus:border-[#FD6600] sm:text-sm bg-gray-50 focus:bg-white transition-all duration-200 font-medium text-gray-900" 
                            placeholder="nama@email.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Input Password -->
                        <div>
                            <label for="password" class="block text-sm font-bold text-gray-700 mb-1.5">Password</label>
                            <input id="password" name="password" type="password" autocomplete="new-password" required 
                                class="appearance-none block w-full px-4 py-2.5 border border-gray-200 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#FD6600]/20 focus:border-[#FD6600] sm:text-sm bg-gray-50 focus:bg-white transition-all duration-200 font-medium text-gray-900" 
                                placeholder="Min. 8 karakter">
                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>

                        <!-- Input Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-1.5">Ulangi Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required 
                                class="appearance-none block w-full px-4 py-2.5 border border-gray-200 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#FD6600]/20 focus:border-[#FD6600] sm:text-sm bg-gray-50 focus:bg-white transition-all duration-200 font-medium text-gray-900" 
                                placeholder="Ketik ulang">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" 
                            class="w-full flex justify-center items-center gap-2 py-3.5 px-4 border border-transparent rounded-xl shadow-lg shadow-orange-500/25 text-base font-bold text-white bg-[linear-gradient(86deg,#FD6700_4.98%,#FF944B_94.22%)] hover:shadow-xl hover:shadow-orange-500/35 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FD6600] transition-all duration-200">
                            Daftar Sekarang
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>
