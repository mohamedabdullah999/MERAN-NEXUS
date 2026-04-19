@extends('layouts.app')

@section('title', app()->getLocale() == 'ar' ? 'سابقه الاعمال | Miran Nexus' : 'Case Studies | Miran Nexus')

@section('content')
@php
    $locale = app()->getLocale();
@endphp
<div class="container mx-auto px-6 text-left rtl:text-right">

    <div class="pt-20 pb-24 text-center max-w-4xl mx-auto">
        <h1 class="text-5xl md:text-7xl font-black tracking-tighter mb-8 uppercase leading-tight">
            @if($locale == 'ar')
                تحديات حقيقية <br/> حلول ذكية <br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white">ونتائج قابلة للقياس</span>
            @else
                Real Challenges <br/>  Smart Solutions <br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white">Measurable Impact</span>
            @endif
        </h1>
        <p class="text-gray-400 text-base md:text-lg leading-relaxed max-w-2xl mx-auto">
            {{ $locale == 'ar' ? 'نظرة تفصيلية على مشاريع حقيقية، من التحديات إلى الحلول والنتائج المحققة.' : 'A deeper look into real projects - the challenges faced, solutions delivered, and results achieved.' }}
        </p>
    </div>

  @if($impacts->count() > 0)
    <div class="mb-32">
        <div class="flex justify-between items-end mb-8 border-b border-cyan-300/30 pb-4">
            <h2 class="text-2xl font-black text-cyan-300 uppercase tracking-widest">
                {{ $locale == 'ar' ? 'تأثير النظام' : 'System Impact' }}
            </h2>
        </div>

        <div class="relative overflow-hidden">
            <div class="absolute right-0 rtl:left-0 rtl:right-auto top-0 bottom-0 w-16 bg-gradient-to-l rtl:bg-gradient-to-r from-[#0A0A0C] to-transparent z-10 pointer-events-none"></div>

            <div id="impact-carousel" class="flex rtl:flex-row-reverse gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth hide-scrollbar pb-4">
                @foreach($impacts as $index => $impact)
                    <div class="snap-start shrink-0 w-[85%] sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] bg-[#111216] border border-white/5 p-8 md:p-10 relative group hover:bg-[#15161A] transition-all duration-500 overflow-hidden flex flex-col justify-between min-h-[320px]">

                        <div class="absolute top-0 left-0 rtl:left-auto rtl:right-0 h-1.5 bg-gradient-to-r from-purple-500 to-pink-500 w-0 group-hover:w-full transition-all duration-500 ease-out z-20"></div>

                        <div class="flex-grow">
                            <div class="flex justify-between items-start mb-6 rtl:flex-row-reverse">
                                <h3 class="text-cyan-300 text-6xl lg:text-[5rem] font-black tracking-tighter leading-none drop-shadow-[0_0_15px_currentColor]" dir="ltr">
                                    {{ $impact->{'value_' . $locale} }}
                                </h3>

                                <div class="text-white/10 w-12 h-12 shrink-0 ml-4 rtl:ml-0 rtl:mr-4">
                                    @if($index % 3 == 0)
                                        <svg fill="currentColor" viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l9-4z"/></svg>
                                    @elseif($index % 3 == 1)
                                        <svg fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/></svg>
                                    @else
                                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                                    @endif
                                </div>
                            </div>

                            <h4 class="text-white text-xs font-bold uppercase tracking-widest mb-4">
                                {{ $impact->{'label_' . $locale} }}
                            </h4>

                            <div class="w-full h-[2px] bg-cyan-300 opacity-80 mb-6"></div>

                            <p class="text-gray-400 text-sm leading-relaxed line-clamp-3">
                                {!! strip_tags($impact->{'description_' . $locale} ?? '') !!}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
  @endif

  @if($caseStudies->count() > 0)
    <div class="mb-32 space-y-24">
        @foreach($caseStudies as $index => $study)
            @php
                $isReversed = $index % 2 != 0;
                $layoutClass = $isReversed ? 'lg:flex-row-reverse rtl:lg:flex-row' : 'rtl:lg:flex-row-reverse';
            @endphp

            <div class="flex flex-col lg:flex-row {{ $layoutClass }} bg-[#0D0E12] border border-white/5 relative group overflow-hidden">

                <div class="absolute top-0 left-0 rtl:left-auto rtl:right-0 h-1.5 bg-gradient-to-r from-purple-500 to-pink-500 w-0 group-hover:w-full transition-all duration-700 ease-out z-30"></div>

                <div class="w-full lg:w-1/2 h-[300px] lg:h-auto relative overflow-hidden">
                    <div class="absolute inset-0 bg-black/40 group-hover:bg-transparent transition-colors duration-500 z-10"></div>
                    @if($study->image_path)
                        <img src="{{ Storage::url($study->image_path) }}" alt="{{ $study->{'name_' . $locale} }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 grayscale group-hover:grayscale-0">
                    @else
                        <div class="w-full h-full bg-[#1A1C23] flex items-center justify-center">
                            <span class="text-gray-600 tracking-widest">NO IMAGE DATA</span>
                        </div>
                    @endif
                </div>

                <div class="w-full lg:w-1/2 p-10 md:p-16 flex flex-col justify-center relative">

                    <h2 class="text-3xl md:text-4xl font-black text-white uppercase tracking-wide mb-6 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-purple-400 group-hover:to-pink-400 transition-all duration-300">
                        {{ $study->{'name_' . $locale} }}
                    </h2>

                    <div class="text-gray-400 text-sm md:text-base leading-relaxed line-clamp-5 mb-8">
                        {!! strip_tags($study->{'description_' . $locale}) !!}
                    </div>

                    <div class="flex flex-wrap gap-3 mt-auto">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
  @endif

    <div class="border-t border-cyan-300/30 py-20 text-center max-w-4xl mx-auto">
        <h2 class="text-4xl md:text-5xl font-black uppercase tracking-tight mb-8">
            @if($locale == 'ar')
                ماهي الطرق والادوات والاساليب العلمية المستخدمة<span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white drop-shadow-[0_0_15px_rgba(103,232,249,0.4)]">لتحقيق هذه النتائج الفعالة ؟  القي نظرة على  ال  Portofilio</span>
            @else
                SO, how this scuscces stories being built,<span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white drop-shadow-[0_0_15px_rgba(103,232,249,0.4)]"> tools, and technologies used? Have A look into the Portfolio</span>
            @endif
        </h2>
       <div class="flex flex-col sm:flex-row justify-center gap-6">
    <a href="{{ route('inquiry.create') }}" class="bg-cyan-500 border border-cyan-400 text-white font-bold text-xs uppercase tracking-widest px-10 py-4 hover:bg-cyan-400 hover:-translate-y-1 hover:shadow-[0_0_20px_rgba(34,211,238,0.5)] transition-all duration-300">
        {{ $locale == 'ar' ? ' احجز استشاره' : 'Book consultation' }}
    </a>
</div>
    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const carousel = document.getElementById('impact-carousel');
        if (!carousel) return;

        const isRtl = document.documentElement.dir === 'rtl';

        setInterval(() => {
            const clientWidth = carousel.clientWidth;

            if (isRtl) {
                if (Math.abs(carousel.scrollLeft) + clientWidth >= carousel.scrollWidth - 10) {
                    carousel.scrollTo({ left: 0, behavior: 'smooth' });
                } else {
                    carousel.scrollBy({ left: -clientWidth, behavior: 'smooth' });
                }
            } else {
                if (carousel.scrollLeft + clientWidth >= carousel.scrollWidth - 10) {
                    carousel.scrollTo({ left: 0, behavior: 'smooth' });
                } else {
                    carousel.scrollBy({ left: clientWidth, behavior: 'smooth' });
                }
            }
        }, 3000);
    });
</script>
@endsection
