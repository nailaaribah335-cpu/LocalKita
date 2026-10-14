<x-admin-layout>
    <x-slot name="header">
        Manajemen Pengguna
    </x-slot>

    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <p class="text-gray-500 text-sm font-medium">Kelola akun Admin, Penjual (Seller), dan Pembeli (Buyer).</p>
        
        <div class="flex bg-gray-200 rounded-lg p-1">
            <a href="{{ route('admin.users.index') }}" class="px-4 py-1.5 rounded-md text-sm font-bold transition-colors {{ !request('role') ? 'bg-white text-gray-900 shadow-sm' : 'text-gray-600 hover:text-gray-900' }}">Semua</a>
            <a href="{{ route('admin.users.index', ['role' => 'admin']) }}" class="px-4 py-1.5 rounded-md text-sm font-bold transition-colors {{ request('role') === 'admin' ? 'bg-white text-red-600 shadow-sm' : 'text-gray-600 hover:text-gray-900' }}">Admin</a>
            <a href="{{ route('admin.users.index', ['role' => 'seller']) }}" class="px-4 py-1.5 rounded-md text-sm font-bold transition-colors {{ request('role') === 'seller' ? 'bg-white text-orange-600 shadow-sm' : 'text-gray-600 hover:text-gray-900' }}">Seller</a>
            <a href="{{ route('admin.users.index', ['role' => 'buyer']) }}" class="px-4 py-1.5 rounded-md text-sm font-bold transition-colors {{ request('role') === 'buyer' ? 'bg-white text-blue-600 shadow-sm' : 'text-gray-600 hover:text-gray-900' }}">Buyer</a>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-xs uppercase font-bold text-gray-500">
                    <tr>
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Role</th>
                        <th class="px-6 py-4">Info Toko</th>
                        <th class="px-6 py-4">Bergabung</th>
                        <th class="px-6 py-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($users as $user)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-bold text-gray-900">
                            {{ $user->name }}
                            @if($user->id === Auth::id())
                                <span class="ml-2 text-[10px] bg-gray-200 text-gray-600 px-1.5 py-0.5 rounded uppercase">You</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-500">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            @if($user->role === 'admin')
                                <span class="px-2.5 py-1 bg-red-100 text-red-700 rounded text-xs font-bold uppercase">Admin</span>
                            @elseif($user->role === 'seller')
                                <span class="px-2.5 py-1 bg-orange-100 text-orange-700 rounded text-xs font-bold uppercase">Seller</span>
                            @else
                                <span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded text-xs font-bold uppercase">Buyer</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($user->role === 'seller')
                                @if($user->store)
                                    <div class="flex flex-col gap-0.5">
                                        <span class="font-bold text-gray-800 text-xs">{{ $user->store->name }}</span>
                                        @if($user->store->is_approved)
                                            <span class="inline-flex items-center gap-1 text-[10px] font-bold text-green-700 bg-green-100 px-1.5 py-0.5 rounded w-fit">
                                                ✅ Disetujui
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 text-[10px] font-bold text-yellow-700 bg-yellow-100 px-1.5 py-0.5 rounded w-fit">
                                                ⏳ Pending
                                            </span>
                                        @endif
                                    </div>
                                @else
                                    <span class="text-gray-400 text-xs italic">Belum punya toko</span>
                                @endif
                            @else
                                <span class="text-gray-300 text-xs">—</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-400 text-xs">{{ $user->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            @if($user->id !== Auth::id())
                                @php
                                    $confirmMsg = $user->role === 'seller' && $user->store
                                        ? 'Hapus akun "' . $user->name . '" beserta toko "' . $user->store->name . '" dan semua produknya secara permanen?'
                                        : 'Hapus akun "' . $user->name . '" secara permanen?';
                                @endphp
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ $confirmMsg }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-bold text-xs uppercase hover:underline">Hapus</button>
                                </form>
                            @else
                                <span class="text-gray-300 text-xs">-</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500 font-medium">
                            Tidak ada pengguna ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-gray-100">
            {{ $users->links() }}
        </div>
    </div>
</x-admin-layout>
