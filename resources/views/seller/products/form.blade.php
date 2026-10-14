<x-seller-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight flex items-center gap-2">
            <a href="{{ route('seller.products.index') }}" class="text-brand-500 hover:underline">Katalog</a> 
            <span class="text-gray-400">/</span> 
            {{ isset($product) ? 'Edit Produk' : 'Tambah Produk' }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8">
                    
                    <form action="{{ isset($product) ? route('seller.products.update', $product->id) : route('seller.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @if(isset($product))
                            @method('PUT')
                        @endif

                        <div>
                            <label class="block text-sm font-bold text-gray-700">Nama Produk / Menu</label>
                            <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 sm:text-sm" placeholder="Misal: Nasi Goreng Spesial" required>
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700">Kategori</label>
                                <select name="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 sm:text-sm" required>
                                    <option value="" disabled {{ !isset($product) ? 'selected' : '' }}>Pilih Kategori...</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700">Harga (Rp)</label>
                                <input type="number" name="price" value="{{ old('price', $product->price ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 sm:text-sm" placeholder="15000" min="0" required>
                                @error('price') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700">Deskripsi Produk</label>
                            <textarea name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 sm:text-sm" placeholder="Jelaskan detail, komposisi, atau keunggulan produk ini..." required>{{ old('description', $product->description ?? '') }}</textarea>
                            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700">Foto Produk</label>
                            @if(isset($product) && $product->image)
                                <div class="mt-2 mb-2 w-32 h-32 rounded-lg bg-gray-100 overflow-hidden border">
                                    <img src="{{ $product->image }}" class="w-full h-full object-cover">
                                </div>
                            @endif
                            <input type="file" name="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100" {{ !isset($product) ? 'required' : '' }}>
                            <p class="text-xs text-gray-500 mt-1">Gunakan foto persegi (1:1) agar terlihat rapi di katalog.</p>
                            @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-center mt-4">
                            <input type="checkbox" id="is_available" name="is_available" value="1" class="h-4 w-4 text-brand-600 focus:ring-brand-500 border-gray-300 rounded" {{ old('is_available', $product->is_available ?? true) ? 'checked' : '' }}>
                            <label for="is_available" class="ml-2 block text-sm font-bold text-gray-700">
                                Stok Tersedia
                            </label>
                        </div>
                        <p class="text-xs text-gray-500 mt-1 ml-6">Jika dihilangkan centangnya, produk akan dilabeli "Habis" dan tidak bisa dipesan sementara.</p>

                        <div class="flex justify-end pt-6 border-t border-gray-100 mt-6 gap-3">
                            <a href="{{ route('seller.products.index') }}" class="bg-white border border-gray-300 text-gray-700 font-bold py-2 px-6 rounded-lg hover:bg-gray-50 transition-colors">
                                Batal
                            </a>
                            <button type="submit" class="bg-brand-500 hover:bg-brand-600 text-white font-bold py-2 px-6 rounded-lg shadow transition-colors">
                                {{ isset($product) ? 'Simpan Perubahan' : 'Tambah Produk' }}
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</x-seller-layout>
