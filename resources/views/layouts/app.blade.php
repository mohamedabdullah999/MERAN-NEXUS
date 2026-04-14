<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Miran Nexus')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#05050A] text-white antialiased font-sans overflow-x-hidden">

    <nav class="absolute w-full z-50 top-0 py-6">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold tracking-wider">MIRAN <span class="text-blue-500">NEXUS</span></a>
            <div class="hidden md:flex gap-8 text-sm text-gray-300">
                <a href="{{ route('about') }}" class="hover:text-white transition">About</a>
                <a href="{{ route('services') }}" class="hover:text-white transition">Services</a>
                <a href="{{ route('case-studies') }}" class="hover:text-white transition">Case Studies</a>
                <a href="{{ route('media') }}" class="hover:text-white transition">Media</a>
                <a href="{{ route('contact') }}" class="hover:text-white transition">Contact</a>
            </div>
        </div>
    </nav>

    <canvas id="spaceCanvas" class="fixed top-0 left-0 w-full h-full z-0 pointer-events-none"></canvas>

    <main class="relative z-10 w-full">
        @yield('content')
    </main>

</body>
</html>
