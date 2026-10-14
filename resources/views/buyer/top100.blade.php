@extends('layouts.buyer')

@section('content')
<div class="bg-gray-50 py-12 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">Top 100 UMKM</h1>
            <p class="text-gray-500 font-medium text-lg">Peringkat UMKM terbaik di Tanah Seratus berdasarkan kelengkapan katalog produk.</p>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            @foreach($stores as $index => $store)
            <a href="{{ route('buyer.stores.show', $store->slug) }}" class="flex items-center gap-4 md:gap-6 p-4 md:p-6 hover:bg-brand-50 transition-colors border-b border-gray-50 last:border-0 group">
                
                {{-- Rank Badge --}}
                <div class="w-12 h-12 shrink-0 flex items-center justify-center font-black text-xl rounded-2xl
                    @if($index === 0) bg-yellow-100 text-yellow-600 shadow-sm
                    @elseif($index === 1) bg-gray-100 text-gray-500 shadow-sm
                    @elseif($index === 2) bg-orange-100 text-orange-700 shadow-sm
                    @else text-gray-400 bg-transparent
                    @endif">
                    #{{ $index + 1 }}
                </div>

                {{-- Store Image --}}
                <div class="w-16 h-16 md:w-20 md:h-20 shrink-0 rounded-2xl overflow-hidden bg-gray-200">
                    <img src="{{ $store->image ?? 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=200&q=80' }}" class="w-full h-full object-cover">
                </div>

                {{-- Store Info --}}
                <div class="flex-grow min-w-0">
                    <h3 class="font-bold text-gray-900 text-lg mb-1 truncate group-hover:text-brand-600 transition-colors">{{ $store->name }}</h3>
                    <p class="text-sm text-gray-500 truncate flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                        {{ $store->landmark }}
                    </p>
                </div>

                {{-- Stats --}}
                <div class="hidden md:flex flex-col items-end text-right">
                    <span class="text-sm font-bold text-gray-700">{{ $store->products_count }} Produk</span>
                    <span class="text-xs font-semibold px-2.5 py-1 rounded-full mt-2 {{ $store->status === 'open' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-600' }}">
                        {{ $store->status === 'open' ? 'Buka' : 'Tutup' }}
                    </span>
                </div>
            </a>
            @endforeach
        </div>

    </div>
</div>
@endsection
