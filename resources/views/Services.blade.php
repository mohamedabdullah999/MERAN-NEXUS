@extends('layouts.app')

@section('title', app()->getLocale() == 'ar' ? 'الخدمات | Miran Nexus' : 'Core Services | Miran Nexus')

@section('content')
@php
    $locale = app()->getLocale();
@endphp
<div class="container mx-auto px-6 text-left rtl:text-right">

    <div class="mb-16 mt-12 max-w-2xl">
        <h1 class="text-5xl md:text-6xl font-black tracking-tight mb-6 uppercase">
            @if($locale == 'ar')
                حلول تقنيه <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white drop-shadow-[0_0_15px_rgba(103,232,249,0.5)]">تحقق نتائج حقيقيه</span>
            @else
                Core <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white drop-shadow-[0_0_15px_rgba(103,232,249,0.5)]">Services</span>
            @endif
        </h1>
        <p class="text-gray-400 text-sm md:text-base leading-relaxed max-w-lg">
            {{ $locale == 'ar' ? ' بنبني أنظمة تقنية آمنة، قابلة للتوسع، وجاهزة للمستقبل تمكن الشركات بحلول تقنية ذكية وآمنة عن طريق تصميم وبناء بيئات تقنية موثوقة وآمنة وقابلة للتوسع تحمي مستقبلك الرقمي… وتدفع نمو أعمالك' : 'Where Technology Meets Security, Performance, and Growth, it can empower businesses with Smart, Technology Solutions and Transforming Businesses Through Secure Digital Innovation, which secures your digital futureand  Powering Your Business Growth' }}
        </p>
    </div>

 @if($featuredServices->count() > 0)
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-20">
        @foreach($featuredServices as $index => $service)
            @php
                $glowColor = 'rgba(168,85,247,0.15)';
            @endphp

            <div class="relative bg-[#111216] border border-white/10 p-10 flex flex-col min-h-[400px] overflow-hidden group transition-all duration-500 hover:border-purple-500/40 hover:-translate-y-2 hover:shadow-[0_20px_50px_{{$glowColor}}]" style="box-shadow: 0 0 30px {{ $glowColor }};">

                <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-purple-500 to-pink-500 transform origin-left rtl:origin-right scale-x-0 group-hover:scale-x-100 transition-transform duration-500 z-20"></div>

                <div class="flex justify-between items-start mb-6 z-10 relative rtl:flex-row-reverse">
                    <div class="flex-1 pr-4 rtl:pr-0 rtl:pl-4">
                        <div class="flex items-center gap-4 mb-4 text-[10px] font-bold tracking-[0.2em] uppercase text-purple-400">
                            <span class="w-10 h-[1px] bg-purple-500"></span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-black text-white uppercase tracking-wide group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-purple-400 group-hover:to-pink-400 transition-all duration-300">
                            {{ $service->{'name_' . $locale} }}
                        </h2>
                    </div>

                   <div class="relative w-48 h-48 shrink-0 flex items-center justify-center opacity-85 group-hover:opacity-100 group-hover:scale-110 group-hover:-translate-y-2 transition-all duration-500 rounded-full border-2 border-white/10 group-hover:border-purple-500/50 shadow-[0_0_20px_rgba(0,0,0,0.5)] overflow-hidden bg-[#0A0A0C]">

                        <div class="absolute inset-0 bg-gradient-to-tr from-purple-500/20 to-transparent group-hover:from-pink-500/30 transition duration-500 z-0"></div>

                        @if($service->image_path)
                            <img src="{{ Storage::url($service->image_path) }}" alt="{{ $service->{'name_' . $locale} }}" class="w-full h-full object-cover relative z-10 transition-transform duration-700 group-hover:scale-110">
                        @else
                            <div class="w-full h-full text-purple-500 flex justify-center items-center relative z-10">
                                <svg class="w-24 h-24 drop-shadow-[0_0_15px_{{ $glowColor }}]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L3 6v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V6l-9-4z"/></svg>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="z-10 relative flex-grow mb-8">
                    <p class="text-gray-400 text-base leading-relaxed max-w-md line-clamp-5">
                        {!! strip_tags($service->{'description_' . $locale}) !!}
                    </p>
                </div>

                <div class="mt-auto z-10 relative">
                    <a href="{{ route('inquiry.create') }}" class="inline-block border border-purple-500 text-purple-400 hover:text-white hover:bg-gradient-to-r hover:from-purple-500 hover:to-pink-500 hover:border-transparent text-xs font-bold uppercase tracking-widest px-10 py-4 hover:scale-105 transition-all duration-300">
                        {{ $locale == 'ar' ? 'احجز الخدمة' : 'Book Service' }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>
 @endif

 <div class="border border-cyan-300/30 bg-gradient-to-b from-[#111216] to-[#0A0A0C] p-16 text-center max-w-5xl mx-auto my-24 relative overflow-hidden group">
        <div class="absolute inset-0 bg-cyan-300/5 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>

        <h2 class="text-3xl md:text-4xl font-black uppercase tracking-tight mb-6 relative z-10 leading-relaxed">
            @if($locale == 'ar')
            هل تريد معرفة كيف تحولت هذه<br> الخدمات <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white drop-shadow-[0_0_15px_rgba(103,232,249,0.4)]">لتأثير فعال وحقيقي ؟ تحقق من ال  use cases</span>
            @else
                Do you want to know how these services <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white drop-shadow-[0_0_15px_rgba(103,232,249,0.4)]">led to an effective impact? <br/> Check the use cases</span>
            @endif
        </h2>
        <div class="flex flex-col sm:flex-row justify-center gap-6 relative z-10 mt-8">
            <a href="{{ route('inquiry.create') }}" class="bg-cyan-300 text-black font-black text-sm uppercase tracking-widest px-10 py-5 hover:bg-white hover:shadow-[0_0_20px_rgba(103,232,249,0.6)] transition-all duration-300">
                {{ $locale == 'ar' ? 'احجز خدمه' : 'Book Service' }}
            </a>
        </div>
    </div>

</div>
@endsection
