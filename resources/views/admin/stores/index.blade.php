<x-admin-layout>
    <x-slot name="header">
        Verifikasi Toko
    </x-slot>

    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <p class="text-gray-500 text-sm font-medium">Tinjau dan setujui pendaftaran UMKM baru untuk ditampilkan di direktori publik.</p>
        
        <div class="flex bg-white rounded-xl p-1.5 shadow-sm border border-[#E8DCCF]">
            <a href="{{ route('admin.stores.index', ['status' => 'pending']) }}" class="px-5 py-2 rounded-lg text-sm font-black transition-all {{ $status === 'pending' ? 'bg-[#FF4500] text-white shadow-md' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">Menunggu (Pending)</a>
            <a href="{{ route('admin.stores.index', ['status' => 'approved']) }}" class="px-5 py-2 rounded-lg text-sm font-black transition-all {{ $status === 'approved' ? 'bg-[#22C55E] text-white shadow-md' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">Telah Disetujui</a>
        </div>
    </div>

    {{-- The Table container with a very subtle elegant shadow --}}
    <div class="bg-white rounded-[24px] shadow-[0_4px_40px_rgba(0,0,0,0.03)] border border-[#E8DCCF] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-[#FAF5EE] border-b border-[#E8DCCF] text-xs uppercase font-black text-gray-500 tracking-wider">
                    <tr>
                        <th class="px-6 py-5">Tanggal Daftar</th>
                        <th class="px-6 py-5">Nama Toko</th>
                        <th class="px-6 py-5">Kategori Usaha</th>
                        <th class="px-6 py-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#F0E6D8] text-sm">
                    @forelse($stores as $store)
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        
                        {{-- Tanggal Daftar --}}
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-2">
                                <span class="text-gray-400">📅</span>
                                <span class="font-bold text-gray-700">{{ $store->created_at ? $store->created_at->format('d M Y') : 'Hari ini' }}</span>
                            </div>
                        </td>
                        
                        {{-- Nama Toko --}}
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gray-100 overflow-hidden border border-gray-200 shrink-0 shadow-sm">
                                    <img src="{{ $store->image ?? 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=100' }}" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-black text-gray-900 text-base group-hover:text-[#FF4500] transition-colors">{{ $store->name }}</p>
                                    <p class="text-xs font-medium text-gray-500 flex items-center gap-1 mt-0.5">
                                        <span class="text-[#FF4500]">📍</span> {{ Str::limit($store->address ?? 'Alamat belum lengkap', 30) }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        {{-- Kategori Usaha --}}
                        <td class="px-6 py-5">
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-stone-100 text-stone-700 text-xs font-bold border border-stone-200 shadow-sm">
                                {{ $store->category->name ?? 'UMKM Umum' }}
                            </span>
                        </td>

                        {{-- Aksi --}}
                        <td class="px-6 py-5">
                            @if(!$store->is_approved)
                                <div class="flex justify-end gap-2">
                                    <form action="{{ route('admin.stores.approve', $store->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-[#22C55E] hover:bg-[#16A34A] text-white px-4 py-2 rounded-xl text-xs font-black shadow-md shadow-green-500/20 transition-all hover:-translate-y-0.5 active:scale-95 flex items-center gap-1.5">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                            Approve
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.stores.reject', $store->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menolak toko ini? Data akan dihapus permanen.');">
                                        @csrf
                                        <button type="submit" class="bg-white border border-red-200 hover:border-red-500 hover:bg-red-50 text-red-500 hover:text-red-600 px-4 py-2 rounded-xl text-xs font-black shadow-sm transition-all flex items-center gap-1.5">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                                            Reject
                                        </button>
                                    </form>
                                </div>
                            @else
                                <div class="flex justify-end">
                                    <span class="px-4 py-2 bg-green-50 text-green-600 rounded-xl text-xs font-black border border-green-200 flex items-center gap-1.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                        Disetujui
                                    </span>
                                </div>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-16 text-center">
                            <div class="w-16 h-16 bg-[#FFF1ED] text-[#FF4500] rounded-full flex items-center justify-center text-3xl mx-auto mb-4">✨</div>
                            @if($status === 'pending')
                                <p class="text-gray-900 font-black text-lg mb-1">Semua Beres!</p>
                                <p class="text-gray-500 font-medium text-sm">Tidak ada pendaftaran UMKM baru saat ini.</p>
                            @else
                                <p class="text-gray-900 font-black text-lg mb-1">Masih Kosong</p>
                                <p class="text-gray-500 font-medium text-sm">Belum ada UMKM yang disetujui.</p>
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($stores->hasPages())
        <div class="p-5 border-t border-[#E8DCCF] bg-gray-50/50">
            {{ $stores->links() }}
        </div>
        @endif
    </div>
</x-admin-layout>
