<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Project Baru') }}
            </h2>
            <a href="{{ route('admin.projects.index') }}" class="text-gray-600 hover:text-gray-900">
                &larr; Kembali ke Daftar Projects
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="grid gap-6">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul Project *</label>
                                <input type="text" name="title" id="title" 
                                    value="{{ old('title') }}"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                    placeholder="Contoh: E-Commerce Platform"
                                    required>
                                @error('title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Singkat *</label>
                                <input type="text" name="description" id="description" 
                                    value="{{ old('description') }}"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                    placeholder="Deskripsi singkat untuk card (max 500 karakter)"
                                    maxlength="500"
                                    required>
                                @error('description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Full Description -->
                            <div>
                                <label for="full_description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Lengkap</label>
                                <textarea name="full_description" id="full_description" rows="6"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                    placeholder="Deskripsi detail project untuk modal popup...">{{ old('full_description') }}</textarea>
                                @error('full_description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Image Upload -->
                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Gambar Project</label>
                                <div class="flex items-center gap-4">
                                    <div id="image-preview" class="hidden w-32 h-20 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                                        <img id="preview-img" src="" alt="Preview" class="w-full h-full object-cover">
                                    </div>
                                    <div class="flex-1">
                                        <input type="file" name="image" id="image" 
                                            accept="image/jpeg,image/png,image/jpg,image/gif,image/webp"
                                            class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-green-50 file:text-green-700 hover:file:bg-green-100"
                                            onchange="previewImage(this)">
                                        <p class="mt-1 text-sm text-gray-500">JPG, PNG, GIF, WebP. Max 2MB</p>
                                    </div>
                                </div>
                                @error('image')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tech & Features -->
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="tech" class="block text-sm font-medium text-gray-700 mb-2">Tech Stack (pisahkan dengan koma)</label>
                                    <input type="text" name="tech" id="tech" 
                                        value="{{ old('tech') }}"
                                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 mb-2"
                                        placeholder="Laravel, Vue.js, MySQL">
                                    
                                    @if(isset($existingTechs) && count($existingTechs) > 0)
                                        <div class="mb-2">
                                            <p class="text-xs text-gray-500 mb-1">Quick Select:</p>
                                            <div class="flex flex-wrap gap-2">
                                                @foreach($existingTechs as $tech)
                                                    <button type="button" 
                                                        onclick="addTag('{{ $tech }}')"
                                                        class="px-2 py-1 text-xs bg-gray-100 hover:bg-green-100 hover:text-green-700 text-gray-600 rounded transition-colors border border-gray-200">
                                                        + {{ $tech }}
                                                    </button>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif



                                    <p class="text-xs text-gray-500 mt-1">
                                        💡 Tip: Ketik kategori baru secara manual lalu simpan. Kategori tersebut akan otomatis muncul di Quick Select selanjutnya.
                                    </p>

                                    @error('tech')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="features" class="block text-sm font-medium text-gray-700 mb-2">Fitur Utama (pisahkan dengan koma)</label>
                                    <input type="text" name="features" id="features" 
                                        value="{{ old('features') }}"
                                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                        placeholder="Shopping Cart, Payment Gateway">
                                    @error('features')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <script>
                                function addTag(tag) {
                                    const input = document.getElementById('tech');
                                    let currentVal = input.value.trim();
                                    
                                    if (currentVal === '') {
                                        input.value = tag;
                                    } else {
                                        // Check if tag already exists
                                        const tags = currentVal.split(',').map(t => t.trim());
                                        if (!tags.includes(tag)) {
                                            input.value = currentVal + ', ' + tag;
                                        }
                                    }
                                }
                            </script>

                            <!-- Color & Year -->
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="color" class="block text-sm font-medium text-gray-700 mb-2">Gradient Color *</label>
                                    <select name="color" id="color" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500" required>
                                        <option value="from-blue-500 to-indigo-600" {{ old('color') == 'from-blue-500 to-indigo-600' ? 'selected' : '' }}>Blue → Indigo</option>
                                        <option value="from-emerald-500 to-teal-600" {{ old('color') == 'from-emerald-500 to-teal-600' ? 'selected' : '' }}>Emerald → Teal</option>
                                        <option value="from-orange-500 to-red-600" {{ old('color') == 'from-orange-500 to-red-600' ? 'selected' : '' }}>Orange → Red</option>
                                        <option value="from-purple-500 to-pink-600" {{ old('color') == 'from-purple-500 to-pink-600' ? 'selected' : '' }}>Purple → Pink</option>
                                        <option value="from-cyan-500 to-blue-600" {{ old('color') == 'from-cyan-500 to-blue-600' ? 'selected' : '' }}>Cyan → Blue</option>
                                        <option value="from-amber-500 to-orange-600" {{ old('color') == 'from-amber-500 to-orange-600' ? 'selected' : '' }}>Amber → Orange</option>
                                        <option value="from-rose-500 to-pink-600" {{ old('color') == 'from-rose-500 to-pink-600' ? 'selected' : '' }}>Rose → Pink</option>
                                        <option value="from-green-500 to-emerald-600" {{ old('color') == 'from-green-500 to-emerald-600' ? 'selected' : '' }}>Green → Emerald</option>
                                    </select>
                                    @error('color')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="year" class="block text-sm font-medium text-gray-700 mb-2">Tahun</label>
                                    <input type="text" name="year" id="year" 
                                        value="{{ old('year', date('Y')) }}"
                                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                        placeholder="2024"
                                        maxlength="4">
                                    @error('year')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Sort Order & Active -->
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Urutan Tampil</label>
                                    <input type="number" name="sort_order" id="sort_order" 
                                        value="{{ old('sort_order', 0) }}"
                                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                        min="0">
                                    <p class="mt-1 text-sm text-gray-500">Angka lebih kecil = tampil lebih dulu</p>
                                    @error('sort_order')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex items-center pt-8">
                                    <input type="checkbox" name="is_active" id="is_active" value="1"
                                        class="rounded border-gray-300 text-green-500 focus:ring-green-500"
                                        {{ old('is_active', true) ? 'checked' : '' }}>
                                    <label for="is_active" class="ml-2 text-sm text-gray-700">
                                        Aktif (tampilkan di landing page)
                                    </label>
                                </div>
                            </div>

                            <!-- Submit Buttons -->
                            <div class="flex justify-end gap-4 pt-4">
                                <a href="{{ route('admin.projects.index') }}" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors font-medium">
                                    Batal
                                </a>
                                <button type="submit" class="px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors font-medium">
                                    Simpan Project
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const previewContainer = document.getElementById('image-preview');
            const previewImg = document.getElementById('preview-img');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                previewContainer.classList.add('hidden');
            }
        }
    </script>
</x-app-layout>
