<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Portfolio {{ $about->name ?? 'Ahmad Farid' }} - {{ $about->title ?? 'Fullstack Developer' }}">
    
    <title>{{ $about->name ?? 'Ahmad Farid' }} | Portfolio</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@1&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Montserrat Font */
        .font-montserrat {
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
        }
        /* DM Serif Display Font */
        .font-dm-serif {
            font-family: "DM Serif Display", serif;
            font-weight: 400;
            font-style: italic;
        }
    </style>
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-primary-50 text-secondary-800">
    <!-- Navigation -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-white/80 backdrop-blur-md shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="#" class="text-xl font-bold gradient-text font-montserrat">
                    {{ $about->name ?? 'Ahmad Farid' }}
                </a>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="text-secondary-700 hover:text-accent-500 transition-colors font-medium">Home</a>
                    <a href="#about" class="text-secondary-700 hover:text-accent-500 transition-colors font-medium">About</a>
                    <a href="#projects" class="text-secondary-700 hover:text-accent-500 transition-colors font-medium">Projects</a>
                    <a href="#contact" class="text-secondary-700 hover:text-accent-500 transition-colors font-medium">Contact</a>
                </div>
                
                <!-- Auth Links -->
                <!-- <div class="hidden md:flex items-center space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-accent-500 text-white rounded-lg hover:bg-accent-600 transition-colors font-medium">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-secondary-700 hover:text-accent-500 transition-colors font-medium">
                                Login
                            </a>
                        @endauth
                    @endif
                </div> -->
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg hover:bg-primary-100 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
            
            <!-- Mobile Menu -->
            {{-- 
            <div id="mobile-menu" class="hidden md:hidden pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="#home" class="text-secondary-700 hover:text-accent-500 transition-colors font-medium py-2">Home</a>
                    <a href="#about" class="text-secondary-700 hover:text-accent-500 transition-colors font-medium py-2">About</a>
                    <a href="#projects" class="text-secondary-700 hover:text-accent-500 transition-colors font-medium py-2">Projects</a>
                    <a href="#contact" class="text-secondary-700 hover:text-accent-500 transition-colors font-medium py-2">Contact</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-accent-500 text-white rounded-lg hover:bg-accent-600 transition-colors font-medium text-center">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-secondary-700 hover:text-accent-500 transition-colors font-medium py-2">
                                Login
                            </a>
                        @endauth
                    @endif
                </div>
            </div> 
            --}}
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen relative overflow-hidden flex items-center pt-16 bg-gradient-to-br from-orange-100 via-white to-blue-200">
        <!-- Decorative blobs -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-orange-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-32 left-20 w-96 h-96 bg-pink-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-4000"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Text Content -->
                <div class="animate-slide-up">
                    <div class="inline-block px-4 py-2 rounded-full bg-white shadow-sm border border-gray-100 mb-6">
                        <p class="text-accent-500 font-medium">👋 Halo, saya</p>
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-secondary-900 mb-6 leading-tight font-montserrat">
                        @php
                            $nameParts = explode(' ', $about->name ?? 'Ahmad Farid');
                            $firstName = $nameParts[0] ?? '';
                            $lastName = isset($nameParts[1]) ? implode(' ', array_slice($nameParts, 1)) : '';
                        @endphp
                        {{ $firstName }} <span class="gradient-text font-dm-serif">{{ $lastName }}</span>
                    </h1>
                    
                    <div class="text-lg sm:text-xl text-secondary-700 mb-8 leading-relaxed h-8">
                         <span class="typing-effect inline-block">{{ $about->title ?? 'Fullstack Developer' }}</span>
                    </div>

                    <p class="text-gray-600 mb-8 max-w-lg leading-relaxed">
                        @if($about && $about->bio)
                            {{ Str::limit($about->bio, 200) }}
                        @else
                            Membangun aplikasi web modern yang cepat, scalable, dan user-friendly. Berpengalaman dengan ekosistem Laravel dan Modern JavaScript.
                        @endif
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#projects" class="group px-8 py-4 bg-accent-500 text-white rounded-xl hover:bg-accent-600 transition-all hover:shadow-lg hover:shadow-accent-500/30 font-semibold text-center relative overflow-hidden">
                            <span class="relative z-10">Lihat Project</span>
                            <div class="absolute inset-0 h-full w-full scale-0 rounded-2xl transition-all duration-300 group-hover:scale-100 group-hover:bg-accent-600/50"></div>
                        </a>
                        <a href="#contact" class="px-8 py-4 bg-white border-2 border-gray-100 text-secondary-800 rounded-xl hover:border-accent-500 hover:text-accent-500 transition-all font-semibold text-center shadow-sm hover:shadow-md">
                            Hubungi Saya
                        </a>
                    </div>
                </div>
                
                <!-- Illustration/Image -->
                <div class="hidden lg:flex justify-center relative">
                    <!-- Glass Card Background -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-accent-100 to-purple-100 rounded-[2rem] transform rotate-6 scale-90 opacity-60 blur-sm"></div>
                    
                    <div class="relative w-96 h-[32rem] bg-white/30 backdrop-blur-md border border-white/50 rounded-[2rem] shadow-2xl overflow-hidden p-4 transform transition-transform hover:scale-[1.02] duration-500">
                        <div class="w-full h-full rounded-3xl overflow-hidden relative group">
                            @if(isset($about) && $about->hero_image)
                                <img src="{{ asset('storage/' . $about->hero_image) }}" alt="Hero Image" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-accent-500 to-purple-600 flex items-center justify-center">
                                    <svg class="w-32 h-32 text-white opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Floating Badge (CV Download) -->
                    <a href="{{ asset('CV_Ahmad_Farid.pdf') }}" download class="absolute -right-4 bottom-10 bg-white/90 backdrop-blur shadow-xl p-4 rounded-2xl animate-float animation-delay-2000 hover:scale-105 transition-transform cursor-pointer group">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600 group-hover:bg-green-600 group-hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 font-medium">Resume</p>
                                <p class="text-sm font-bold text-gray-800">Download CV</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Wave Shape -->
        <div class="absolute bottom-0 left-0 right-0 z-0 pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full h-auto text-white fill-current">
                <path fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-secondary-900 mb-4">
                    Tentang <span class="gradient-text">Saya</span>
                </h2>
                <p class="text-secondary-700 max-w-2xl mx-auto">
                    Mengenal lebih dekat tentang latar belakang dan keahlian saya
                </p>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- About Text -->
                <div>
                    <h3 class="text-2xl font-semibold text-secondary-900 mb-4 font-montserrat">
                        Hi! Saya {{ $about->name ?? 'Ahmad Farid' }}
                    </h3>
                    <p class="text-secondary-700 mb-6 leading-relaxed">
                        @if($about && $about->bio)
                            {{ $about->bio }}
                        @else
                            Saya adalah seorang Fullstack Developer dengan passion yang kuat dalam pengembangan web. 
                            Saya senang membangun aplikasi yang tidak hanya fungsional tetapi juga memiliki tampilan yang menarik dan user-friendly.
                        @endif
                    </p>
                    
                    <!-- Skills -->
                    @if($about && is_array($about->skills) && count($about->skills) > 0)
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                        @foreach($about->skills as $skill)
                        <div class="glass-card rounded-xl p-4 text-center card-hover">
                            <div class="w-12 h-12 bg-accent-500/10 rounded-lg flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-secondary-700">{{ $skill }}</span>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                        @foreach(['Laravel', 'MySQL', 'Tailwind', 'JavaScript', 'REST API', 'Vue.js'] as $skill)
                        <div class="glass-card rounded-xl p-4 text-center card-hover">
                            <div class="w-12 h-12 bg-accent-500/10 rounded-lg flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-secondary-700">{{ $skill }}</span>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                
                <!-- Info Cards -->
                <div class="space-y-6">
                    <div class="glass-card rounded-2xl p-6 card-hover">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-accent-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-secondary-900 mb-1">Nama Lengkap</h4>
                                <p class="text-secondary-700">{{ $about->name ?? 'Ahmad Farid' }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="glass-card rounded-2xl p-6 card-hover">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-accent-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-secondary-900 mb-1">Telepon</h4>
                                <p class="text-secondary-700">{{ $about->phone ?? $contact->phone ?? '081280965725' }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="glass-card rounded-2xl p-6 card-hover">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-accent-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-secondary-900 mb-1">Alamat</h4>
                                <p class="text-secondary-700">{!! nl2br(e($about->address ?? $contact->address ?? 'Jalan Kalibaru Barat IV Rt 002 Rw 012, Kel. Kalibaru, Kec. Cilincing, Jakarta Utara')) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-20 hero-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-secondary-900 mb-4">
                    Project <span class="gradient-text">Saya</span>
                </h2>
                <p class="text-secondary-700 max-w-2xl mx-auto mb-8">
                    Beberapa project yang telah saya kerjakan
                </p>

                <!-- Category Filter -->
                <div class="flex flex-wrap justify-center gap-2 sm:gap-4 mb-8">
                    <a 
                        href="{{ route('landing') }}"
                        class="filter-btn px-6 py-2 rounded-full border-2 border-accent-500 hover:bg-accent-500 hover:text-white transition-all font-medium {{ !request('category') || request('category') == 'all' ? 'bg-accent-500 text-white' : 'text-accent-500' }}"
                    >
                        All
                    </a>
                    @foreach($categories as $category)
                        <a 
                            href="{{ route('landing', ['category' => $category]) }}"
                            class="filter-btn px-6 py-2 rounded-full border-2 border-accent-500 hover:bg-accent-500 hover:text-white transition-all font-medium {{ request('category') == $category ? 'bg-accent-500 text-white' : 'text-accent-500' }}"
                        >
                            {{ $category }}
                        </a>
                    @endforeach
                </div>
            </div>
            
            <!-- Project Cards Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12" id="projects-grid">
                @forelse($projects as $index => $project)
                    <div 
                        class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover project-item group" 
                    >
                        <!-- Project Image/Placeholder -->
                        @if($project->image)
                            <div class="h-48 overflow-hidden">
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                            </div>
                        @else
                            <div class="h-48 bg-gradient-to-br {{ $project->color }} flex items-center justify-center">
                                <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        @endif
                        
                        <!-- Project Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-secondary-900 mb-3">
                                {{ $project->title }}
                            </h3>
                            <p class="text-secondary-700 text-sm mb-4 leading-relaxed">
                                {{ $project->description }}
                            </p>
                            
                            <!-- Tech Stack -->
                            <div class="flex flex-wrap gap-2 mb-4">
                                @if(is_array($project->tech))
                                    @foreach($project->tech as $tech)
                                        <span class="px-3 py-1 bg-accent-500/10 text-accent-600 text-xs font-medium rounded-full">
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                @endif
                            </div>
                            
                            <!-- Detail Button -->
                            <button 
                                onclick="openProjectModal({{ $index }})"
                                class="w-full px-4 py-3 bg-accent-500 text-white rounded-xl hover:bg-accent-600 transition-all hover:shadow-lg font-medium flex items-center justify-center gap-2"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                        <p class="text-gray-500">Belum ada project{{ request('category') ? ' di kategori ini' : '' }}.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-8">
                {{ $projects->links() }}
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-secondary-900 mb-4">
                    Hubungi <span class="gradient-text">Saya</span>
                </h2>
                <p class="text-secondary-700 max-w-2xl mx-auto">
                    Tertarik untuk berkolaborasi? Jangan ragu untuk menghubungi saya
                </p>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-8 max-w-6xl mx-auto">
                <!-- Contact Cards -->
                <div class="grid sm:grid-cols-2 gap-6">
                    <!-- Phone -->
                    <a href="tel:{{ $contact->phone ?? '081280965725' }}" class="glass-card rounded-2xl p-6 text-center card-hover group">
                        <div class="w-14 h-14 bg-accent-500 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <h3 class="text-base font-semibold text-secondary-900 mb-1">Telepon</h3>
                        <p class="text-secondary-700 text-sm">{{ $contact->phone ?? '081280965725' }}</p>
                    </a>
                    
                    <!-- WhatsApp -->
                    <a href="https://wa.me/{{ $contact->whatsapp ?? '6281280965725' }}" target="_blank" class="glass-card rounded-2xl p-6 text-center card-hover group">
                        <div class="w-14 h-14 bg-green-500 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </div>
                        <h3 class="text-base font-semibold text-secondary-900 mb-1">WhatsApp</h3>
                        <p class="text-secondary-700 text-sm">Chat via WhatsApp</p>
                    </a>
                    
                    <!-- Email -->
                    <a href="mailto:{{ $contact->email ?? 'nataliefariz69@gmail.com' }}" class="glass-card rounded-2xl p-6 text-center card-hover group">
                        <div class="w-14 h-14 bg-red-500 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-base font-semibold text-secondary-900 mb-1">Email</h3>
                        <p class="text-secondary-700 text-sm break-all">{{ $contact->email ?? 'nataliefariz69@gmail.com' }}</p>
                    </a>
                    
                    <!-- Location -->
                    <button onclick="openMapModal()" class="glass-card rounded-2xl p-6 text-center card-hover group">
                        <div class="w-14 h-14 bg-accent-500 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-base font-semibold text-secondary-900 mb-1">Lokasi</h3>
                        <p class="text-secondary-700 text-sm">Lihat di Maps</p>
                    </button>
                </div>
                
                <!-- Map Preview -->
                <div class="glass-card rounded-2xl overflow-hidden card-hover">
                    <div class="h-full min-h-[300px]">
                        <iframe 
                            src="{{ $contact->map_embed_url ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2!2d106.9!3d-6.1!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1f0000000001%3A0x0!2sKalibaru%2C%20Cilincing%2C%20Jakarta%20Utara!5e0!3m2!1sid!2sid!4v1703291000000!5m2!1sid!2sid' }}"
                            width="100%" 
                            height="100%" 
                            style="border:0; min-height: 300px;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            class="rounded-2xl"
                        ></iframe>
                    </div>
                </div>
            </div>
            
            <!-- Full Address Card -->
            <div class="max-w-6xl mx-auto mt-8">
                <div class="glass-card rounded-2xl p-6 card-hover">
                    <div class="flex flex-col md:flex-row items-start md:items-center gap-4">
                        <div class="w-12 h-12 bg-accent-500 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-semibold text-secondary-900 mb-1">Alamat Lengkap</h4>
                            <p class="text-secondary-700">
                                {{ $contact->address ?? 'Jalan Kalibaru Barat IV Rt 002 Rw 012, Kelurahan Kalibaru, Kecamatan Cilincing, Jakarta Utara, DKI Jakarta' }}
                            </p>
                        </div>
                        <a 
                            href="{{ $contact->map_link ?? 'https://www.google.com/maps/search/Jalan+Kalibaru+Barat+IV+Cilincing+Jakarta+Utara' }}" 
                            target="_blank"
                            class="px-6 py-3 bg-accent-500 text-white rounded-xl hover:bg-accent-600 transition-all font-medium flex items-center gap-2"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                            Buka di Google Maps
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-secondary-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <a href="#" class="text-2xl font-bold gradient-text font-montserrat">
                        {{ $about->name ?? 'Ahmad Farid' }}
                    </a>
                    <p class="text-gray-400 mt-2">{{ $about->title ?? 'Fullstack Developer' }}</p>
                </div>
                
                <div class="flex flex-col items-center md:items-end gap-6">
                    <div class="flex space-x-6">
                        <a href="#home" class="text-gray-400 hover:text-white transition-colors">Home</a>
                        <a href="#about" class="text-gray-400 hover:text-white transition-colors">About</a>
                        <a href="#projects" class="text-gray-400 hover:text-white transition-colors">Projects</a>
                        <a href="#contact" class="text-gray-400 hover:text-white transition-colors">Contact</a>
                    </div>

                    @if(isset($contact->social_links) && is_array($contact->social_links))
                        <div class="flex space-x-4">
                            @foreach($contact->social_links as $platform => $link)
                                @if($link)
                                    <a href="{{ $link }}" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-white transition-colors">
                                        @if($platform === 'instagram')
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                        @elseif($platform === 'github')
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                                        @elseif($platform === 'linkedin')
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                        @elseif($platform === 'facebook')
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385h-3.047v-3.47h3.047v-2.641c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953h-1.513c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385c5.737-.9 10.125-5.864 10.125-11.854z"/></svg>
                                        @elseif($platform === 'tiktok')
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                                        @endif
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center">
                <p class="text-gray-400 text-sm">
                    &copy; {{ date('Y') }} {{ $about->name ?? 'Ahmad Farid' }}. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- Project Detail Modal -->
    <div id="projectModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity bg-secondary-900/75 backdrop-blur-sm" onclick="closeProjectModal()"></div>
            
            <!-- Modal content -->
            <div class="relative inline-block w-full max-w-2xl p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white rounded-2xl shadow-xl">
                <!-- Close button -->
                <button onclick="closeProjectModal()" class="absolute top-4 right-4 p-2 rounded-full hover:bg-gray-100 transition-colors">
                    <svg class="w-6 h-6 text-secondary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                
                <!-- Modal header with gradient/image -->
                <div id="modalHeader" class="h-48 -mx-6 -mt-6 mb-6 bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center rounded-t-2xl overflow-hidden">
                    <img id="modalImage" src="" alt="" class="hidden w-full h-full object-cover">
                    <svg id="modalIcon" class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                </div>
                
                <!-- Title -->
                <h3 id="modalTitle" class="text-2xl font-bold text-secondary-900 mb-2">Project Title</h3>
                
                <!-- Year badge -->
                <span id="modalYear" class="inline-block px-3 py-1 bg-accent-500/10 text-accent-600 text-sm font-medium rounded-full mb-4">2024</span>
                
                <!-- Description -->
                <div id="modalDescription" class="text-secondary-700 mb-6 whitespace-pre-line leading-relaxed"></div>
                
                <!-- Features -->
                <div class="mb-6">
                    <h4 class="font-semibold text-secondary-900 mb-3">Fitur Utama:</h4>
                    <div id="modalFeatures" class="flex flex-wrap gap-2"></div>
                </div>
                
                <!-- Tech Stack -->
                <div class="mb-6">
                    <h4 class="font-semibold text-secondary-900 mb-3">Teknologi:</h4>
                    <div id="modalTech" class="flex flex-wrap gap-2"></div>
                </div>

                <!-- Project Link Button -->
                <div id="modalLinkContainer" class="hidden pt-4 border-t border-gray-100">
                    <a id="modalLink" href="" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-accent-500 text-white rounded-xl hover:bg-accent-600 transition-all font-medium shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        Lihat Project
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Modal -->
    <div id="mapModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity bg-secondary-900/75 backdrop-blur-sm" onclick="closeMapModal()"></div>
            
            <!-- Modal content -->
            <div class="relative inline-block w-full max-w-4xl p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white rounded-2xl shadow-xl">
                <!-- Close button -->
                <button onclick="closeMapModal()" class="absolute top-4 right-4 z-10 p-2 rounded-full bg-white shadow-md hover:bg-gray-100 transition-colors">
                    <svg class="w-6 h-6 text-secondary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                
                <!-- Title -->
                <h3 class="text-xl font-bold text-secondary-900 mb-4">📍 Lokasi Saya</h3>
                
                <!-- Address -->
                <p class="text-secondary-700 mb-4">
                    {{ $contact->address ?? 'Jalan Kalibaru Barat IV Rt 002 Rw 012, Kelurahan Kalibaru, Kecamatan Cilincing, Jakarta Utara' }}
                </p>
                
                <!-- Map -->
                <div class="rounded-xl overflow-hidden mb-4" style="height: 400px;">
                    <iframe 
                        src="{{ $contact->map_embed_url ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2!2d106.9!3d-6.1!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1f0000000001%3A0x0!2sKalibaru%2C%20Cilincing%2C%20Jakarta%20Utara!5e0!3m2!1sid!2sid!4v1703291000000!5m2!1sid!2sid' }}"
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                    ></iframe>
                </div>
                
                <!-- Open in Maps button -->
                <a 
                    href="{{ $contact->map_link ?? 'https://www.google.com/maps/search/Jalan+Kalibaru+Barat+IV+Cilincing+Jakarta+Utara' }}" 
                    target="_blank"
                    class="inline-flex items-center gap-2 px-6 py-3 bg-accent-500 text-white rounded-xl hover:bg-accent-600 transition-all font-medium"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    Buka di Google Maps
                </a>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Project data for modal
        const projects = {!! $projects->map(function($p) {
            return [
                'title' => $p->title,
                'description' => $p->description,
                'full_description' => $p->full_description,
                'tech' => $p->tech,
                'features' => $p->features,
                'color' => $p->color,
                'year' => $p->year,
                'image' => $p->image ? asset('storage/' . $p->image) : null,
                'project_url' => $p->project_url,
            ];
        })->values()->toJson() !!};
        
        function openProjectModal(index) {
            const project = projects[index];
            const modal = document.getElementById('projectModal');
            const modalImage = document.getElementById('modalImage');
            const modalIcon = document.getElementById('modalIcon');
            const modalHeader = document.getElementById('modalHeader');
            
            // Update modal content
            document.getElementById('modalTitle').textContent = project.title;
            document.getElementById('modalYear').textContent = project.year;
            document.getElementById('modalDescription').textContent = project.full_description || project.description;
            
            // Update header - show image or gradient
            if (project.image) {
                modalImage.src = project.image;
                modalImage.alt = project.title;
                modalImage.classList.remove('hidden');
                modalIcon.classList.add('hidden');
                modalHeader.className = 'h-48 -mx-6 -mt-6 mb-6 rounded-t-2xl overflow-hidden';
            } else {
                modalImage.classList.add('hidden');
                modalIcon.classList.remove('hidden');
                modalHeader.className = `h-48 -mx-6 -mt-6 mb-6 bg-gradient-to-br ${project.color} flex items-center justify-center rounded-t-2xl overflow-hidden`;
            }
            
            // Update features
            const featuresContainer = document.getElementById('modalFeatures');
            if (project.features && Array.isArray(project.features)) {
                featuresContainer.innerHTML = project.features.map(feature => 
                    `<span class="px-3 py-1 bg-green-100 text-green-700 text-sm font-medium rounded-full">${feature}</span>`
                ).join('');
            } else {
                featuresContainer.innerHTML = '';
            }
            
            // Update tech stack
            const techContainer = document.getElementById('modalTech');
            if (project.tech && Array.isArray(project.tech)) {
                techContainer.innerHTML = project.tech.map(tech => 
                    `<span class="px-3 py-1 bg-accent-500/10 text-accent-600 text-sm font-medium rounded-full">${tech}</span>`
                ).join('');
            } else {
                techContainer.innerHTML = '';
            }

            // Update project link
            const linkContainer = document.getElementById('modalLinkContainer');
            const linkElement = document.getElementById('modalLink');
            if (project.project_url) {
                linkElement.href = project.project_url;
                linkContainer.classList.remove('hidden');
            } else {
                linkContainer.classList.add('hidden');
            }
            
            // Show modal
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        
        function closeProjectModal() {
            document.getElementById('projectModal').classList.add('hidden');
            document.body.style.overflow = '';
        }
        
        function openMapModal() {
            document.getElementById('mapModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        
        function closeMapModal() {
            document.getElementById('mapModal').classList.add('hidden');
            document.body.style.overflow = '';
        }
        
        // Close modals on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeProjectModal();
                closeMapModal();
            }
        });
        
        // Mobile menu functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
                
                // Close mobile menu when clicking on a link
                const mobileLinks = mobileMenu.querySelectorAll('a');
                mobileLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        mobileMenu.classList.add('hidden');
                    });
                });
            }
            
            // Navbar scroll effect
            const navbar = document.getElementById('navbar');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('shadow-md');
                } else {
                    navbar.classList.remove('shadow-md');
                }
            });
        });

        // Filter functionality
        function filterProjects(category) {
            // Update buttons
            document.querySelectorAll('.filter-btn').forEach(btn => {
                if (btn.dataset.category === category) {
                    btn.setAttribute('data-active', 'true');
                    btn.classList.add('bg-accent-500', 'text-white');
                    btn.classList.remove('text-accent-500');
                } else {
                    btn.setAttribute('data-active', 'false');
                    btn.classList.remove('bg-accent-500', 'text-white');
                    btn.classList.add('text-accent-500');
                }
            });

            // Filter items
            const projects = document.querySelectorAll('.project-item');
            projects.forEach(project => {
                if (category === 'all') {
                    project.style.display = 'block';
                    return;
                }

                const techStack = JSON.parse(project.dataset.tech || '[]');
                if (techStack.includes(category)) {
                    project.style.display = 'block';
                } else {
                    project.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>
