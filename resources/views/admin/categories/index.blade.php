<x-admin-layout>
    <x-slot name="header">
        Manajemen Kategori
    </x-slot>

    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <p class="text-gray-500 text-sm font-medium">Kategori ini akan tampil di Beranda dan filter Peta.</p>
        
        {{-- Simpel Create Form (Inline) --}}
        <form action="{{ route('admin.categories.store') }}" method="POST" class="flex gap-2">
            @csrf
            <input type="text" name="name" placeholder="Nama Kategori Baru" required class="w-64 text-sm border-gray-300 rounded-lg focus:ring-brand-500 focus:border-brand-500">
            <button type="submit" class="bg-brand-500 hover:bg-brand-600 text-white px-4 py-2 rounded-lg text-sm font-bold transition-colors">Tambah</button>
        </form>
    </div>
    
    @error('name') <p class="text-red-500 text-xs mb-4 text-right">{{ $message }}</p> @enderror

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-xs uppercase font-bold text-gray-500">
                    <tr>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Slug (URL)</th>
                        <th class="px-6 py-4">Total Produk</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($categories as $category)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-bold text-gray-900">
                            {{ $category->name }}
                        </td>
                        <td class="px-6 py-4 text-gray-500 text-xs">
                            {{ $category->slug }}
                        </td>
                        <td class="px-6 py-4 font-medium text-brand-600">
                            {{ $category->products_count }} produk
                        </td>
                        <td class="px-6 py-4 text-right flex justify-end gap-3 items-center">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-blue-500 hover:text-blue-700 font-bold text-xs uppercase hover:underline">Edit</a>
                            
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-bold text-xs uppercase hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500 font-medium">
                            Belum ada kategori.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-gray-100">
            {{ $categories->links() }}
        </div>
    </div>
</x-admin-layout>
