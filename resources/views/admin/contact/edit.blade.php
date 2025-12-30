<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Contact') }}
            </h2>
            <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-900">
                &larr; Kembali ke Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Flash Message -->
            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.contact.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid gap-6">
                            <!-- Phone & WhatsApp -->
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Telepon</label>
                                    <input type="text" name="phone" id="phone" 
                                        value="{{ old('phone', $contact->phone) }}"
                                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                        placeholder="081234567890">
                                    @error('phone')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="whatsapp" class="block text-sm font-medium text-gray-700 mb-2">WhatsApp (dengan kode negara)</label>
                                    <input type="text" name="whatsapp" id="whatsapp" 
                                        value="{{ old('whatsapp', $contact->whatsapp) }}"
                                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                        placeholder="6281234567890">
                                    <p class="mt-1 text-sm text-gray-500">Contoh: 6281234567890 (tanpa + atau spasi)</p>
                                    @error('whatsapp')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" name="email" id="email" 
                                    value="{{ old('email', $contact->email) }}"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                    placeholder="email@example.com">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                                <textarea name="address" id="address" rows="3"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                    placeholder="Alamat lengkap...">{{ old('address', $contact->address) }}</textarea>
                                @error('address')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Map Embed URL -->
                            <div>
                                <label for="map_embed_url" class="block text-sm font-medium text-gray-700 mb-2">Google Maps Embed URL</label>
                                <textarea name="map_embed_url" id="map_embed_url" rows="3"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                    placeholder="https://www.google.com/maps/embed?pb=...">{{ old('map_embed_url', $contact->map_embed_url) }}</textarea>
                                <p class="mt-1 text-sm text-gray-500">Copy URL dari Google Maps → Share → Embed a map</p>
                                @error('map_embed_url')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Map Link -->
                            <div>
                                <label for="map_link" class="block text-sm font-medium text-gray-700 mb-2">Link Google Maps</label>
                                <input type="text" name="map_link" id="map_link" 
                                    value="{{ old('map_link', $contact->map_link) }}"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                    placeholder="https://www.google.com/maps/...">
                                <p class="mt-1 text-sm text-gray-500">Link untuk tombol "Buka di Google Maps"</p>
                                @error('map_link')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end pt-4">
                                <button type="submit" class="px-6 py-3 bg-purple-500 text-white rounded-lg hover:bg-purple-600 transition-colors font-medium">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
