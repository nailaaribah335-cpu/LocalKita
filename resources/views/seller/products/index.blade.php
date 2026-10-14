<x-seller-layout>
    <x-slot name="header">
        Manajemen Toko
    </x-slot>

    <div class="flex flex-col gap-8 pb-8">
        
        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl relative font-bold shadow-sm" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        {{-- KARTU STATUS TOKO (TOGGLE) --}}
        <div class="bg-white rounded-[24px] p-6 sm:p-8 shadow-sm border border-[#E8DCCF] flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-full bg-[#FFF1ED] text-[#FF4500] flex items-center justify-center text-2xl shrink-0 shadow-sm border border-[#FFC2B0]">
                    🏪
                </div>
                <div>
                    <h3 class="font-black text-xl text-gray-900 mb-1">Status Operasional Toko</h3>
                    <p class="text-sm text-gray-500 font-medium">Buka atau tutup toko Anda agar pembeli tahu apakah Anda menerima pesanan hari ini.</p>
                </div>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-2 px-4 border border-gray-100 flex items-center shrink-0">
                <form action="{{ route('seller.store.toggle-status') }}" method="POST" id="storeStatusForm" class="m-0">
                    @csrf
                    <label class="relative inline-flex items-center cursor-pointer group m-0">
                        <input type="checkbox" onChange="document.getElementById('storeStatusForm').submit();" class="sr-only peer" {{ auth()->user()->store->status === 'open' ? 'checked' : '' }}>
                        
                        <div class="w-16 h-8 bg-gray-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-8 peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-[#22C55E] shadow-inner transition-colors duration-300"></div>
                        
                        <span class="ml-4 text-sm font-black text-gray-400 peer-checked:hidden">TUTUP</span>
                        <span class="ml-4 text-sm font-black text-[#22C55E] hidden peer-checked:block">BUKA</span>
                    </label>
                </form>
            </div>
        </div>

        {{-- TABEL KATALOG PRODUK --}}
        <div class="bg-white rounded-[24px] shadow-sm border border-[#E8DCCF] overflow-hidden flex flex-col">
            
            {{-- Header Tabel --}}
            <div class="p-6 sm:p-8 border-b border-[#F0E6D8] flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white">
                <div>
                    <h3 class="font-black text-xl text-gray-900 mb-1 flex items-center gap-2">
                        <span>🛍️</span> Katalog Produk
                    </h3>
                    <p class="text-sm text-gray-500 font-medium">Kelola daftar menu, barang, atau jasa yang Anda tawarkan.</p>
                </div>
                <a href="{{ route('seller.products.create') }}" class="bg-[#FF4500] hover:bg-[#E63900] text-white font-black py-3 px-6 rounded-xl shadow-md shadow-orange-500/20 transition-all hover:-translate-y-0.5 active:scale-95 flex items-center gap-2 w-full sm:w-auto justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
                    Tambah Baru
                </a>
            </div>

            {{-- Isi Tabel --}}
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-[#FAF5EE] border-b border-[#E8DCCF] text-xs uppercase font-black text-gray-500 tracking-wider">
                        <tr>
                            <th class="px-6 py-5">Info Produk</th>
                            <th class="px-6 py-5">Harga</th>
                            <th class="px-6 py-5">Status</th>
                            <th class="px-6 py-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#F0E6D8] text-sm">
                        @forelse($products as $product)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            
                            {{-- Info Produk (Thumbnail + Nama) --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-16 h-16 rounded-xl bg-gray-100 overflow-hidden shrink-0 border border-gray-200 shadow-sm relative group-hover:border-[#FFC2B0] transition-colors">
                                        <img src="{{ $product->image ?? 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=200' }}" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <p class="font-black text-gray-900 text-base mb-0.5 group-hover:text-[#FF4500] transition-colors">{{ $product->name }}</p>
                                        <span class="inline-block px-2.5 py-0.5 bg-stone-100 text-stone-600 rounded-md text-[10px] font-bold border border-stone-200">
                                            {{ $product->category->name ?? 'Tanpa Kategori' }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            
                            {{-- Harga --}}
                            <td class="px-6 py-4">
                                <span class="font-black text-gray-900 text-base">
                                    {{ $product->formatted_price }}
                                </span>
                            </td>
                            
                            {{-- Status Tersedia/Habis --}}
                            <td class="px-6 py-4">
                                @if($product->is_available)
                                    <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-xs font-bold border border-green-200">Tersedia</span>
                                @else
                                    <span class="px-3 py-1 bg-stone-100 text-stone-600 rounded-full text-xs font-bold border border-stone-300">Habis</span>
                                @endif
                            </td>
                            
                            {{-- Aksi (Edit/Hapus) --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('seller.products.edit', $product->id) }}" class="w-10 h-10 rounded-xl bg-white border border-[#E8DCCF] text-gray-500 hover:text-blue-600 hover:border-blue-300 hover:bg-blue-50 flex items-center justify-center transition-all shadow-sm group-hover:shadow" title="Edit Produk">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    </a>
                                    
                                    {{-- Tombol Hapus --}}
                                    <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-10 h-10 rounded-xl bg-white border border-[#E8DCCF] text-gray-500 hover:text-red-600 hover:border-red-300 hover:bg-red-50 flex items-center justify-center transition-all shadow-sm group-hover:shadow" title="Hapus Produk">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-16 text-center">
                                <div class="w-20 h-20 bg-[#FFF1ED] text-[#FF4500] rounded-full flex items-center justify-center text-4xl mx-auto mb-4">🍽️</div>
                                <p class="text-gray-900 font-black text-xl mb-2">Belum Ada Produk</p>
                                <p class="text-gray-500 font-medium text-sm max-w-sm mx-auto mb-6">Toko Anda masih kosong. Yuk, tambahkan produk pertama Anda agar pembeli bisa mulai memesan!</p>
                                <a href="{{ route('seller.products.create') }}" class="inline-flex bg-[#FF4500] hover:bg-[#E63900] text-white font-black py-2.5 px-6 rounded-xl shadow-md transition-all hover:-translate-y-0.5 active:scale-95 items-center gap-2">
                                    <span>+</span> Tambah Produk Sekarang
                                </a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($products->hasPages())
            <div class="p-5 border-t border-[#E8DCCF] bg-gray-50/50">
                {{ $products->links() }}
            </div>
            @endif
        </div>

    </div>
</x-seller-layout>
