@extends('layouts.app')

@section('title', 'Miran Nexus | Home')

@section('content')
    <section class="hero-bg min-h-screen flex items-center pt-20">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

            <div class="text-left">
                <h1 class="text-5xl md:text-7xl font-bold mb-4 leading-tight hero-title">
                    Building Secure <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">Digital Worlds</span>
                </h1>
                <p class="text-gray-300 text-lg mb-8 tracking-wide">
                    Cybersecurity | Infrastructure | Digital Transformation
                </p>
                <div class="flex gap-4">
                    <a href="{{ route('contact') }}" class="btn-primary px-6 py-3 rounded text-sm font-bold transition text-center">Book Consultation</a>
                    <a href="{{ route('case-studies') }}" class="btn-outline px-6 py-3 rounded text-sm font-bold border border-gray-500 hover:border-white transition text-center">View My Work</a>
                </div>
            </div>

            <div class="hidden md:flex justify-center relative">
                <div class="absolute inset-0 bg-blue-500/10 blur-[100px] rounded-full z-0"></div>
                <img src="/images/consultant.png" alt="Miran Nexus" class="max-w-md relative z-10 drop-shadow-[0_0_30px_rgba(6,182,212,0.3)]">
            </div>

        </div>
    </section>

    <section class="py-20 container mx-auto px-6 text-center">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <div class="neon-card flex items-center justify-center gap-3"><span class="text-blue-400 text-xl">🛡️</span> Cybersecurity</div>
            <div class="neon-card flex items-center justify-center gap-3"><span class="text-blue-400 text-xl">🌐</span> Network Solutions</div>
            <div class="neon-card flex items-center justify-center gap-3"><span class="text-blue-400 text-xl">🏗️</span> IT Infrastructure</div>
            <div class="neon-card flex items-center justify-center gap-3"><span class="text-blue-400 text-xl">📈</span> Digital Transformation</div>
        </div>

        <div class="mt-6">
             <a href="{{ route('services') }}" class="text-blue-400 hover:text-blue-300 transition border-b border-blue-400 pb-1">See All Services ➔</a>
        </div>
    </section>
@endsection
