<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" class="scroll-smooth bg-[#0A0A0C]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Miran Nexus')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="{{ asset('favicon.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.jpg') }}">
    @if(app()->getLocale() == 'ar')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700;900&display=swap" rel="stylesheet">
        <style>
            body { font-family: 'Cairo', sans-serif; }
        </style>
    @endif

    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="text-white antialiased relative flex flex-col min-h-screen bg-[#0A0A0C] selection:bg-pink-500 selection:text-white">

<canvas id="spaceCanvas" class="fixed inset-0 w-full h-full pointer-events-none opacity-50 z-0"></canvas>

   <nav class="fixed w-full z-50 bg-[#0A0A0C]/90 backdrop-blur-md border-b border-white/5">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">

            @php
                $siteName = isset($settings) ? $settings->{'site_name_' . app()->getLocale()} : 'MIRAN NEXUS';
            @endphp
            <a href="/" class="text-xl md:text-2xl font-bold tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500 uppercase">
                {{ $siteName }}
            </a>

            <div class="hidden lg:flex items-center gap-6 xl:gap-8 text-xs font-semibold tracking-[0.2em] uppercase">
                <a href="{{ route('services') }}" class="transition-colors duration-300 {{ request()->routeIs('services') ? 'text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500 drop-shadow-[0_0_8px_rgba(236,72,153,0.5)]' : 'text-gray-400 hover:text-pink-400' }}">
                    {{ app()->getLocale() == 'ar' ? 'الخدمات' : 'Services' }}
                </a>

                <a href="{{ route('case-studies') }}" class="transition-colors duration-300 {{ request()->routeIs('case-studies') ? 'text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500 drop-shadow-[0_0_8px_rgba(236,72,153,0.5)]' : 'text-gray-400 hover:text-pink-400' }}">
                    {{ app()->getLocale() == 'ar' ? 'سابقه الاعمال' : 'Case Studies' }}
                </a>

                <a href="{{ route('portfolio') }}" class="transition-colors duration-300 {{ request()->routeIs('portfolio') ? 'text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500 drop-shadow-[0_0_8px_rgba(236,72,153,0.5)]' : 'text-gray-400 hover:text-pink-400' }}">
                    {{ app()->getLocale() == 'ar' ? 'الخبرات' : 'Portfolio' }}
                </a>

                <a href="{{ route('media') }}" class="transition-colors duration-300 {{ request()->routeIs('media') ? 'text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500 drop-shadow-[0_0_8px_rgba(236,72,153,0.5)]' : 'text-gray-400 hover:text-pink-400' }}">
                    {{ app()->getLocale() == 'ar' ? 'الاعلام' : 'Media' }}
                </a>

                <a href="{{ route('articles') }}" class="transition-colors duration-300 {{ request()->routeIs('articles') ? 'text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500 drop-shadow-[0_0_8px_rgba(236,72,153,0.5)]' : 'text-gray-400 hover:text-pink-400' }}">
                    {{ app()->getLocale() == 'ar' ? 'المقالات' : 'Articles' }}
                </a>

                <a href="{{ route('testimonials') }}" class="transition-colors duration-300 {{ request()->routeIs('testimonials') ? 'text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500 drop-shadow-[0_0_8px_rgba(236,72,153,0.5)]' : 'text-gray-400 hover:text-pink-400' }}">
                    {{ app()->getLocale() == 'ar' ? 'اراء وشكر' : 'Testimonials' }}
                </a>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('lang.switch', app()->getLocale() == 'ar' ? 'en' : 'ar') }}" class="text-xs font-bold tracking-widest uppercase text-gray-400 hover:text-white transition-colors">
                    {{ app()->getLocale() == 'ar' ? 'EN' : 'AR' }}
                </a>

                <a href="{{ route('inquiry.create') }}" class="text-xs font-bold tracking-widest uppercase px-5 py-2.5 border border-purple-500/50 text-pink-400 hover:bg-purple-900/30 hover:border-pink-400 transition-all rounded-sm hidden sm:block">
                    {{ app()->getLocale() == 'ar' ? 'تواصل معي' : 'Contact Me' }}
                </a>
            </div>
        </div>
    </nav>

 <main class="flex-grow pt-24 pb-12 relative z-10">
    @yield('content')
</main>

 <footer class="border-t border-white/5 bg-[#0A0A0C] pt-12 pb-8 mt-auto relative z-10">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-8">

            <div class="flex items-center gap-4">
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full blur opacity-40 group-hover:opacity-75 transition duration-500"></div>
                    @if(isset($settings) && $settings->footer_logo)
                        <img src="{{ Storage::url($settings->footer_logo) }}" alt="Logo" class="relative w-56 h-56 rounded-full object-contain p-2 border border-white/10 bg-[#111216]">
                    @else
                        <div class="relative w-56 h-56 rounded-full border border-white/10 bg-[#111216] flex items-center justify-center text-pink-400 font-bold tracking-widest text-7xl">
                            {{ strtoupper(substr($siteName, 0, 2)) }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-4 md:gap-8">
                @if(isset($settings) && !empty($settings->contact_email))
                    <a href="mailto:{{ $settings->contact_email }}" class="flex items-center gap-2 text-gray-400 hover:text-cyan-400 transition-colors text-sm font-mono group rtl:flex-row-reverse">
                        <div class="w-8 h-8 rounded-full bg-[#111216] border border-white/5 flex items-center justify-center group-hover:border-cyan-400/50 group-hover:shadow-[0_0_10px_rgba(34,211,238,0.3)] transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        {{ $settings->contact_email }}
                    </a>
                @endif

                @if(isset($settings) && !empty($settings->contact_phone))
                    <a href="tel:{{ $settings->contact_phone }}" class="flex items-center gap-2 text-gray-400 hover:text-purple-400 transition-colors text-sm font-mono group rtl:flex-row-reverse">
                        <div class="w-8 h-8 rounded-full bg-[#111216] border border-white/5 flex items-center justify-center group-hover:border-purple-500/50 group-hover:shadow-[0_0_10px_rgba(168,85,247,0.3)] transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <span dir="ltr">{{ $settings->contact_phone }}</span>
                    </a>
                @endif
            </div>

            <div class="flex space-x-4 rtl:space-x-reverse">
                @if(isset($settings) && is_array($settings->social_links))
                    @foreach($settings->social_links as $social)
                        @php
                            $platform = strtolower($social['platform'] ?? '');
                            $url = $social['url'] ?? '#';
                        @endphp
                        <a href="{{ $url }}" target="_blank" class="w-10 h-10 rounded-full bg-[#111216] border border-white/5 flex items-center justify-center text-gray-400 hover:text-pink-400 hover:border-pink-400/50 hover:shadow-[0_0_15px_rgba(236,72,153,0.3)] hover:-translate-y-1 transition-all duration-300">
                            @if(str_contains($platform, 'linkedin'))
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            @elseif(str_contains($platform, 'x') || str_contains($platform, 'twitter'))
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            @elseif(str_contains($platform, 'facebook') || str_contains($platform, 'fb'))
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                            @elseif(str_contains($platform, 'insta') || str_contains($platform, 'ig'))
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4s1.791-4 4-4 4 1.79 4 4-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            @else
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                            @endif
                        </a>
                    @endforeach
                @endif
            </div>

        </div>

        <div class="mt-10 pt-8 border-t border-white/5 text-center text-[10px] uppercase tracking-widest text-gray-600">
            &copy; {{ date('Y') }} {{ $siteName }}
        </div>
    </div>
</footer>

    <script>
    </script>
</body>
</html>
