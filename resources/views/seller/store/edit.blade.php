<x-seller-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Pengaturan Profil Toko') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('seller.store.update') }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-8 space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        {{-- Left Column: Basic Info --}}
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-bold text-gray-700">Nama Toko</label>
                                <input type="text" name="name" value="{{ old('name', $store->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 sm:text-sm" required>
                                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700">Nomor WhatsApp</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">+62</span>
                                    <input type="text" name="phone_number" value="{{ old('phone_number', str_replace('+62', '', $store->phone_number)) }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-brand-500 focus:ring-brand-500 sm:text-sm" placeholder="81234567890" required>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Gunakan nomor aktif untuk menerima pesanan.</p>
                                @error('phone_number') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700">Deskripsi Toko</label>
                                <textarea name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 sm:text-sm" required>{{ old('description', $store->description) }}</textarea>
                                @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700">Foto Toko / Banner</label>
                                @if($store->image)
                                    <div class="mt-2 mb-2 w-32 h-32 rounded-lg bg-gray-100 overflow-hidden border">
                                        <img src="{{ $store->image }}" class="w-full h-full object-cover">
                                    </div>
                                @endif
                                <input type="file" name="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100">
                                @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700">Status Operasional</label>
                                <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 sm:text-sm">
                                    <option value="open" {{ old('status', $store->status) == 'open' ? 'selected' : '' }}>🟢 Buka Sekarang</option>
                                    <option value="closed" {{ old('status', $store->status) == 'closed' ? 'selected' : '' }}>🔴 Sedang Tutup</option>
                                </select>
                            </div>
                        </div>

                        {{-- Right Column: Location & Map --}}
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-bold text-gray-700">Alamat Lengkap</label>
                                <textarea name="address" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 sm:text-sm" required>{{ old('address', $store->address) }}</textarea>
                                @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700">Patokan Jalan (Landmark)</label>
                                <input type="text" name="landmark" value="{{ old('landmark', $store->landmark) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 sm:text-sm" placeholder="Misal: Depan masjid Al-Barkah" required>
                                @error('landmark') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Titik Peta (Pin Lokasi)</label>
                                <p class="text-xs text-gray-500 mb-2">Geser penanda merah pada peta untuk menentukan lokasi presisi tokomu agar mudah dicari pembeli.</p>
                                
                                <div id="map" class="w-full h-64 rounded-xl border border-gray-300 mb-2 z-10"></div>
                                
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <label class="text-xs text-gray-500">Latitude</label>
                                        <input type="text" id="latitude" name="latitude" value="{{ old('latitude', $store->latitude) }}" class="w-full text-xs rounded border-gray-300 bg-gray-50" readonly>
                                    </div>
                                    <div>
                                        <label class="text-xs text-gray-500">Longitude</label>
                                        <input type="text" id="longitude" name="longitude" value="{{ old('longitude', $store->longitude) }}" class="w-full text-xs rounded border-gray-300 bg-gray-50" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="flex justify-end pt-4 border-t border-gray-100">
                        <button type="submit" class="bg-brand-500 hover:bg-brand-600 text-white font-bold py-2 px-6 rounded-lg shadow transition-colors">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>

    {{-- Leaflet JS for Map Picker --}}
    @push('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Default to Tanah Seratus if no coordinates
            var initialLat = {{ old('latitude', $store->latitude) ?? -6.223 }};
            var initialLng = {{ old('longitude', $store->longitude) ?? 106.702 }};

            var map = L.map('map').setView([initialLat, initialLng], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);

            var marker = L.marker([initialLat, initialLng], {
                draggable: true
            }).addTo(map);

            marker.on('dragend', function(e) {
                var pos = marker.getLatLng();
                document.getElementById('latitude').value = pos.lat.toFixed(6);
                document.getElementById('longitude').value = pos.lng.toFixed(6);
            });

            // Allow clicking map to move marker
            map.on('click', function(e) {
                marker.setLatLng(e.latlng);
                document.getElementById('latitude').value = e.latlng.lat.toFixed(6);
                document.getElementById('longitude').value = e.latlng.lng.toFixed(6);
            });
        });
    </script>
    @endpush
</x-seller-layout>
