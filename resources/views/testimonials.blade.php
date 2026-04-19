@extends('layouts.app')

@section('title', app()->getLocale() == 'ar' ? 'اراء وشكر | Miran Nexus' : ' Testimonials | Miran Nexus')

@section('content')
@php
    $locale = app()->getLocale();
@endphp
<div class="container mx-auto px-6 pt-32 pb-24 relative z-10 text-left rtl:text-right">

    <div class="pt-8 pb-16 text-center md:text-left rtl:md:text-right">
        <h1 class="text-5xl md:text-7xl font-black tracking-tighter mb-6 uppercase leading-tight">
            @if($locale == 'ar')
                ثقة المهنيين <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white drop-shadow-[0_0_15px_rgba(103,232,249,0.5)]">وتقدير العملاء </span>
            @else
                Trusted by Professionals <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white drop-shadow-[0_0_15px_rgba(103,232,249,0.5)]">Valued by Clients</span>
            @endif
        </h1>

        <p class="text-gray-400 text-sm md:text-base leading-relaxed max-w-2xl mb-12">
            {{ $locale == 'ar' ? 'آراء وتوصيات من عملاء وشركاء ومديرين تعاملت معهم في مشاريع مختلف' : 'Feedback and recommendations from clients, partners, and leaders I’ve worked with.' }}
        </p>
    </div>

    @if($testimonials->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-24">
        @foreach($testimonials as $index => $testimonial)
            @php
                $glowColors = ['text-cyan-300/20', 'text-purple-500/20', 'text-pink-500/20'];
                $quoteColor = $glowColors[$index % 3];
            @endphp

            <div class="bg-[#111216] border border-white/5 relative group hover:bg-[#15161A] transition-all duration-500 flex flex-col min-h-[350px] p-8 md:p-10 hover:-translate-y-2 hover:shadow-[0_15px_30px_rgba(168,85,247,0.1)]">

                <div class="absolute top-0 left-0 rtl:left-auto rtl:right-0 h-1 bg-gradient-to-r from-purple-500 to-pink-500 w-0 group-hover:w-full transition-all duration-500 ease-out z-20"></div>

                <div class="relative z-10 flex-grow mb-10 text-left rtl:text-right">
                    <div class="w-8 h-[2px] bg-cyan-300 mb-6 opacity-50"></div>
                    <p class="text-gray-300 text-sm md:text-base leading-loose italic relative z-10">
                        {!! strip_tags($testimonial->{'description_' . $locale}) !!}
                    </p>
                </div>

                <div class="mt-auto border-t border-white/5 pt-6 flex items-center rtl:flex-row-reverse gap-4 relative z-10">

                    <div class="w-14 h-14 shrink-0 rounded-full border border-white/10 bg-[#0A0A0C] overflow-hidden group-hover:border-purple-500/50 transition-colors duration-300">
                        @if($testimonial->image_path)
                            <img src="{{ Storage::url($testimonial->image_path) }}" loading="lazy" alt="{{ $testimonial->{'name_' . $locale} }}" class="w-full h-full object-cover grayscale opacity-80 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-600">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg>
                            </div>
                        @endif
                    </div>

                    <div class="flex-grow text-left rtl:text-right rtl:pl-4">
                        <h3 class="text-white font-bold text-base group-hover:text-cyan-300 transition-colors duration-300 line-clamp-1">
                            {{ $testimonial->{'name_' . $locale} }}
                        </h3>
                        <div class="flex items-center gap-1 mt-1 rtl:flex-row-reverse w-max">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                            <span class="text-[9px] text-green-500/80 uppercase tracking-widest">
                                {{ $testimonial->{'title_' . $locale} ?? ($locale == 'ar' ? 'هوية موثقة' : 'Verified Identity') }}
                            </span>
                        </div>
                    </div>

                    @if($testimonial->reference_link)
                        <a href="{{ $testimonial->reference_link }}" target="_blank" class="w-10 h-10 shrink-0 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-gray-400 hover:bg-cyan-300 hover:text-black hover:border-cyan-300 hover:shadow-[0_0_15px_rgba(103,232,249,0.5)] transition-all duration-300 z-20">
                            <svg class="w-4 h-4 rtl:scale-x-[-1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        </a>
                    @endif

                </div>
            </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-20">
        <p class="text-gray-500 tracking-widest uppercase">
            {{ $locale == 'ar' ? 'لم يتم العثور على إرسالات موثقة.' : 'No verified transmissions found.' }}
        </p>
    </div>
    @endif

  <div class="border border-white/5 bg-[#111216] p-12 text-center max-w-4xl mx-auto my-24 relative overflow-hidden group">
        <div class="absolute top-0 left-0 rtl:left-auto rtl:right-0 h-[2px] bg-gradient-to-r from-purple-500 to-pink-500 w-0 group-hover:w-full transition-all duration-500 ease-out z-20"></div>

        <div class="mb-6 flex justify-center">
            <svg class="w-8 h-8 text-cyan-300" fill="currentColor" viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
        </div>

        <h6 class="text-xl md:text-2xl font-black uppercase tracking-tight mb-8 leading-relaxed">
            {{ $locale == 'ar' ? 'اشكرك جدا لتصفحك ووصولك لهنا .. ويسعدني اهتمامك وان تكون من ضمن دائره المعارف القيمة لدينا في Miran Nexus تواصل معي وشاركني خبراتك ايضا' : "Thank you so much for browsing and coming this far. I'm delighted by your interest and hope to be a part of our valuable network at Miran Nexus. Please get in touch and share your experiences with me as well" }}
        </h6>

     <div class="flex flex-col sm:flex-row justify-center gap-6">
    <a href="{{ route('inquiry.create') }}" class="bg-purple-500 text-white font-black text-xs uppercase tracking-widest px-10 py-4 hover:bg-pink-500 hover:shadow-[0_0_20px_rgba(236,72,153,0.5)] transition-all duration-300">
        {{ $locale == 'ar' ? 'تواصل معي' : 'Contact me' }}
    </a>
</div>
    </div>

</div>
@endsection
