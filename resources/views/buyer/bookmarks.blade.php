@extends('layouts.buyer')

@section('content')
<div class="bg-warm-100 py-6 min-h-screen font-sans">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-8">
            <h1 class="text-3xl font-black text-gray-900 tracking-tight mb-2">Favorit Saya ❤️</h1>
            <p class="text-gray-500 font-medium">Daftar UMKM dan tempat nongkrong yang udah kamu simpan.</p>
        </div>

        @if($bookmarks->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($bookmarks as $bookmark)
                @if($bookmark->store)
                <div class="bg-white rounded-[32px] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-50 overflow-hidden hover:shadow-[0_20px_40px_rgb(253,103,0,0.08)] transition-all hover:-translate-y-1 relative group flex flex-col">
                    
                    {{-- Bookmark Button (Remove) --}}
                    <form action="{{ route('buyer.bookmarks.toggle', $bookmark->store->id) }}" method="POST" class="absolute top-4 right-4 z-10">
                        @csrf
                        <button type="submit" class="w-12 h-12 rounded-full bg-white/90 backdrop-blur-md shadow-sm flex items-center justify-center hover:bg-white hover:scale-110 transition-all" title="Hapus dari Favorit">
                            <svg class="w-6 h-6 text-red-500 fill-current" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                        </button>
                    </form>

                    <div class="absolute top-4 left-4 z-10">
                        @if($bookmark->store->status === 'open')
                            <span class="bg-[#22C55E] text-white text-[11px] font-black px-3 py-1.5 rounded-full shadow-sm tracking-wide">🟢 GAS BUKA</span>
                        @else
                            <span class="bg-gray-800 text-white text-[11px] font-black px-3 py-1.5 rounded-full shadow-sm tracking-wide">💤 LAGI REBAHAN</span>
                        @endif
                    </div>

                    <div class="h-48 bg-gray-100 overflow-hidden relative p-2">
                        <img src="{{ $bookmark->store->image ?? 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=800&q=80' }}" loading="lazy" alt="{{ $bookmark->store->name }}" class="w-full h-full object-cover rounded-[24px] group-hover:scale-105 transition-transform duration-700 ease-out">
                    </div>
                    
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="font-black text-gray-900 text-xl mb-1.5 truncate tracking-tight">{{ $bookmark->store->name }}</h3>
                        <p class="text-[13px] text-gray-500 mb-5 flex items-center gap-1.5 truncate font-medium">
                            <span class="text-orange-400">📍</span> {{ $bookmark->store->landmark }}
                        </p>
                        
                        <div class="mt-auto">
                            <a href="{{ route('buyer.stores.show', $bookmark->store->slug) }}" class="block w-full py-3.5 px-4 bg-gray-50 hover:bg-[#FD6700] text-gray-700 hover:text-white rounded-[20px] text-center text-sm font-bold transition-colors">
                                Gas Kesini 🚀
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>

        <div class="mt-10">
            {{ $bookmarks->links() }}
        </div>
        @else
        <div class="bg-white rounded-[40px] p-16 text-center border border-gray-50 shadow-[0_8px_30px_rgb(0,0,0,0.04)] flex flex-col items-center mt-10">
            <div class="w-24 h-24 bg-orange-50 rounded-full flex items-center justify-center text-5xl mb-6">💔</div>
            <h3 class="font-black text-gray-900 text-2xl mb-2">Belum Ada Favorit</h3>
            <p class="text-gray-500 font-medium mb-8">Kamu belum menyimpan toko atau UMKM apapun.</p>
            <a href="{{ route('buyer.index') }}" class="bg-gradient-to-r from-[#FD6700] to-[#FF944B] text-white px-8 py-4 rounded-full font-black hover:shadow-lg hover:shadow-orange-500/30 transition-all hover:-translate-y-1">Mulai Eksplorasi Sekarang</a>
        </div>
        @endif

    </div>
</div>
@endsection
