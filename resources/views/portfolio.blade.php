@extends('layouts.app')

@section('title', app()->getLocale() == 'ar' ? 'الخبرات | Miran Nexus' : 'Portfolio | Miran Nexus')

@section('content')
@php
    $locale = app()->getLocale();
@endphp
<div class="container mx-auto px-6 text-left rtl:text-right">

    <div class="pt-20 pb-24 text-center max-w-4xl mx-auto">

        <h1 class="text-5xl md:text-7xl font-black tracking-tighter mb-6 uppercase leading-none">
            @if($locale == 'ar')
                مبنية على الخبرة   <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white">وموجهة</span><br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500">بالنتائج </span>
            @else
                Built on expertise   <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white">Driven</span><br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500">by results</span>
            @endif
        </h1>
        <p class="text-gray-400 text-sm md:text-base leading-relaxed max-w-2xl mx-auto">
            {{ $locale == 'ar' ? 'عرض لأهم التقنيات والأدوات والحلول التي قمت بتنفيذها لدعم وتطوير أعمال مختلفة' : 'A showcase of the technologies, tools, and solutions I’ve implemented for businesses across different industries,Where Technology Meets Security, Performance, and Growth' }}
        </p>
    </div>

    @if($technologies->count() > 0)
    <div class="mb-32">
        <div class="flex items-center mb-8 rtl:flex-row-reverse">
            <h2 class="text-xl md:text-2xl font-black text-white uppercase tracking-widest">
                {{ $locale == 'ar' ? 'التقنيات' : 'Technologies' }}
            </h2>
            <div class="flex-grow h-[1px] bg-white/10 ml-6 rtl:ml-0 rtl:mr-6"></div>
        </div>

        <div class="relative group/slider">
            <button onclick="scrollCarousel('tech-carousel', -1)" class="absolute left-0 rtl:left-auto rtl:right-0 top-1/2 -translate-y-1/2 -translate-x-4 md:-translate-x-6 rtl:translate-x-4 rtl:md:translate-x-6 z-30 w-12 h-12 bg-[#111216] border border-cyan-300/50 rounded-full flex items-center justify-center text-cyan-300 hover:bg-cyan-300 hover:text-black transition-all shadow-[0_0_15px_rgba(103,232,249,0.3)] opacity-0 group-hover/slider:opacity-100">
                <svg class="w-6 h-6 rtl:scale-x-[-1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>

            <div id="tech-carousel" class="flex gap-6 overflow-x-auto rtl:flex-row-reverse snap-x snap-mandatory scroll-smooth hide-scrollbar py-4 px-2">
                @foreach($technologies as $tech)
                    <div class="snap-start shrink-0 w-[85%] sm:w-[400px] bg-[#111216] border border-white/5 p-8 md:p-10 relative group hover:bg-[#15161A] transition-all duration-500 min-h-[350px] flex flex-col items-center text-center">

                        <div class="absolute top-0 left-0 rtl:left-auto rtl:right-0 h-1.5 bg-gradient-to-r from-purple-500 to-pink-500 w-0 group-hover:w-full transition-all duration-500 ease-out z-20"></div>

                        <div class="relative w-32 h-32 mb-8 flex items-center justify-center opacity-85 group-hover:opacity-100 group-hover:scale-110 group-hover:-translate-y-2 transition-all duration-500 rounded-full border-2 border-white/10 group-hover:border-purple-500/50 shadow-[0_0_20px_rgba(0,0,0,0.5)] overflow-hidden bg-[#0A0A0C]">
                            <div class="absolute inset-0 bg-gradient-to-tr from-purple-500/20 to-transparent group-hover:from-pink-500/30 transition duration-500 z-0"></div>
                            @if($tech->image_path)
<img src="{{ Storage::url($tech->image_path) }}" class="w-full h-full object-cover relative z-10 transition-transform duration-700 group-hover:scale-110">                            @else
                                <svg class="w-16 h-16 text-purple-500 relative z-10" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L3 5v6c0 5.5 3.8 10.7 9 12 5.2-1.3 9-6.5 9-12V5l-9-3z"/></svg>
                            @endif
                        </div>

                        <h3 class="text-white font-black text-2xl uppercase tracking-wider mb-4 group-hover:text-purple-400 transition-colors w-full break-words break-all">{{ $tech->{'name_' . $locale} }}</h3>

                        <p class="text-gray-400 text-sm leading-relaxed line-clamp-4 break-words w-full">{!! strip_tags($tech->{'description_' . $locale}) !!}</p>
                    </div>
                @endforeach
            </div>

            <button onclick="scrollCarousel('tech-carousel', 1)" class="absolute right-0 rtl:right-auto rtl:left-0 top-1/2 -translate-y-1/2 translate-x-4 md:translate-x-6 rtl:-translate-x-4 rtl:md:-translate-x-6 z-30 w-12 h-12 bg-[#111216] border border-cyan-300/50 rounded-full flex items-center justify-center text-cyan-300 hover:bg-cyan-300 hover:text-black transition-all shadow-[0_0_15px_rgba(103,232,249,0.3)] opacity-0 group-hover/slider:opacity-100">
                <svg class="w-6 h-6 rtl:scale-x-[-1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
        </div>
    </div>
    @endif

    @if($tools->count() > 0)
    <div class="mb-32">
        <div class="flex justify-between items-end mb-8 border-b border-white/5 pb-6">
            <div class="max-w-xl">
                <h2 class="text-xl md:text-2xl font-black text-white uppercase tracking-widest mb-2">
                    {{ $locale == 'ar' ? 'الأدوات' : 'Tools' }}
                </h2>
                <p class="text-gray-500 text-xs leading-relaxed">
                    {{ $locale == 'ar' ? 'مجموعة أدواتنا مختارة لتحقيق أقصى كفاءة وأمان قوي. من بيئات التطوير إلى البنية التحتية السحابية، نستخدم فقط أفضل الأساسيات في الصناعة.' : 'Our toolkit is selected for maximum efficiency and hardened security. From IDEs to cloud infrastructure, we only use industry-best primitives.' }}
                </p>
            </div>
        </div>

        <div class="relative group/slider">
            <button onclick="scrollCarousel('tools-carousel', -1)" class="absolute left-0 rtl:left-auto rtl:right-0 top-1/2 -translate-y-1/2 -translate-x-4 md:-translate-x-6 rtl:translate-x-4 rtl:md:translate-x-6 z-30 w-12 h-12 bg-[#111216] border border-purple-500/50 rounded-full flex items-center justify-center text-purple-400 hover:bg-purple-500 hover:text-white transition-all shadow-[0_0_15px_rgba(168,85,247,0.3)] opacity-0 group-hover/slider:opacity-100">
                <svg class="w-6 h-6 rtl:scale-x-[-1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>

            <div id="tools-carousel" class="flex gap-6 overflow-x-auto rtl:flex-row-reverse snap-x snap-mandatory scroll-smooth hide-scrollbar py-4 px-2">
                @foreach($tools as $tool)
                    <div class="snap-start shrink-0 w-[85%] sm:w-[400px] bg-[#111216] border border-white/5 p-8 md:p-10 relative group hover:bg-[#15161A] transition-all duration-500 min-h-[350px] flex flex-col items-center text-center">

                        <div class="absolute top-0 left-0 rtl:left-auto rtl:right-0 h-1.5 bg-gradient-to-r from-purple-500 to-pink-500 w-0 group-hover:w-full transition-all duration-500 ease-out z-20"></div>

                        <div class="relative w-32 h-32 mb-8 flex items-center justify-center opacity-85 group-hover:opacity-100 group-hover:scale-110 group-hover:-translate-y-2 transition-all duration-500 rounded-full border-2 border-white/10 group-hover:border-purple-500/50 shadow-[0_0_20px_rgba(0,0,0,0.5)] overflow-hidden bg-[#0A0A0C]">
                            <div class="absolute inset-0 bg-gradient-to-tr from-purple-500/20 to-transparent group-hover:from-pink-500/30 transition duration-500 z-0"></div>
                            @if($tool->image_path)
                                <img src="{{ Storage::url($tool->image_path) }}" class="w-full h-full object-cover relative z-10 transition-transform duration-700 group-hover:scale-110">
                            @else
                                <svg class="w-16 h-16 text-purple-500 relative z-10" fill="currentColor" viewBox="0 0 24 24"><path d="M22.7 19l-9.1-9.1c.9-2.3.4-5-1.5-6.9-2-2-5-2.4-7.4-1.3L9 6 6 9 1.6 4.7C.5 7.1.9 10.1 2.9 12.1c1.9 1.9 4.6 2.4 6.9 1.5l9.1 9.1c.4.4 1 .4 1.4 0l2.4-2.4c.4-.4.4-1 0-1.4z"/></svg>
                            @endif
                        </div>

                        <h3 class="text-white font-black text-2xl uppercase tracking-widest mb-4 group-hover:text-purple-400 transition-colors w-full break-words break-all">{{ $tool->{'name_' . $locale} }}</h3>

                        <p class="text-gray-400 text-sm leading-relaxed line-clamp-4 break-words w-full">{!! strip_tags($tool->{'description_' . $locale}) !!}</p>
                    </div>
                @endforeach
            </div>

            <button onclick="scrollCarousel('tools-carousel', 1)" class="absolute right-0 rtl:right-auto rtl:left-0 top-1/2 -translate-y-1/2 translate-x-4 md:translate-x-6 rtl:-translate-x-4 rtl:md:-translate-x-6 z-30 w-12 h-12 bg-[#111216] border border-purple-500/50 rounded-full flex items-center justify-center text-purple-400 hover:bg-purple-500 hover:text-white transition-all shadow-[0_0_15px_rgba(168,85,247,0.3)] opacity-0 group-hover/slider:opacity-100">
                <svg class="w-6 h-6 rtl:scale-x-[-1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
        </div>
    </div>
    @endif

    @if($methodologies->count() > 0)
    <div class="mb-32">
        <h2 class="text-xl md:text-2xl font-black text-white uppercase tracking-widest text-center mb-16">
            {{ $locale == 'ar' ? 'المنهجية التكتيكية' : 'Tactical Methodology' }}
        </h2>

        <div class="relative group/slider">
            <button onclick="scrollCarousel('method-carousel', -1)" class="absolute left-0 rtl:left-auto rtl:right-0 top-1/2 -translate-y-1/2 -translate-x-4 md:-translate-x-6 rtl:translate-x-4 rtl:md:translate-x-6 z-30 w-12 h-12 bg-[#111216] border border-cyan-300/50 rounded-full flex items-center justify-center text-cyan-300 hover:bg-cyan-300 hover:text-black transition-all shadow-[0_0_15px_rgba(103,232,249,0.3)] opacity-0 group-hover/slider:opacity-100">
                <svg class="w-6 h-6 rtl:scale-x-[-1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>

            <div class="absolute hidden md:block w-full h-[1px] border-t border-dashed border-white/10 top-1/2 -z-10"></div>

            <div id="method-carousel" class="flex gap-8 overflow-x-auto rtl:flex-row-reverse snap-x snap-mandatory scroll-smooth hide-scrollbar py-12 px-4">
                @foreach($methodologies as $index => $method)
                    <div class="snap-start shrink-0 w-[85%] sm:w-[400px] bg-[#111216] border border-white/5 p-8 md:p-10 relative group hover:bg-[#15161A] transition-all duration-500 min-h-[350px] flex flex-col items-center text-center {{ $index % 2 == 0 ? 'md:-translate-y-6' : 'md:translate-y-6' }}">

                        <div class="absolute top-0 left-0 rtl:left-auto rtl:right-0 h-1.5 bg-gradient-to-r from-purple-500 to-pink-500 w-0 group-hover:w-full transition-all duration-500 ease-out z-20"></div>

                        <div class="relative w-32 h-32 mb-8 flex items-center justify-center opacity-85 group-hover:opacity-100 group-hover:scale-110 group-hover:-translate-y-2 transition-all duration-500 rounded-full border-2 border-white/10 group-hover:border-purple-500/50 shadow-[0_0_20px_rgba(0,0,0,0.5)] overflow-hidden bg-[#0A0A0C]">
                            <div class="absolute inset-0 bg-gradient-to-tr from-purple-500/20 to-transparent group-hover:from-pink-500/30 transition duration-500 z-0"></div>
                            @if($method->image_path)
                                <img src="{{ Storage::url($method->image_path) }}" class="w-full h-full object-cover relative z-10 transition-transform duration-700 group-hover:scale-110">
                            @endif
                        </div>

                        <h3 class="text-white font-black text-2xl uppercase tracking-widest mb-4 group-hover:text-purple-400 transition-colors w-full break-words break-all">{{ $method->{'name_' . $locale} }}</h3>

                        <p class="text-gray-400 text-sm leading-relaxed line-clamp-4 break-words w-full">{!! strip_tags($method->{'description_' . $locale}) !!}</p>
                    </div>
                @endforeach
            </div>

            <button onclick="scrollCarousel('method-carousel', 1)" class="absolute right-0 rtl:right-auto rtl:left-0 top-1/2 -translate-y-1/2 translate-x-4 md:translate-x-6 rtl:-translate-x-4 rtl:md:-translate-x-6 z-30 w-12 h-12 bg-[#111216] border border-cyan-300/50 rounded-full flex items-center justify-center text-cyan-300 hover:bg-cyan-300 hover:text-black transition-all shadow-[0_0_15px_rgba(103,232,249,0.3)] opacity-0 group-hover/slider:opacity-100">
                <svg class="w-6 h-6 rtl:scale-x-[-1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
        </div>
    </div>
    @endif

    @if($clients->count() > 0)
    <div class="mb-32">
        <div class="flex items-center justify-center mb-12 relative">
            <div class="w-full h-[1px] bg-gradient-to-r from-transparent via-white/10 to-transparent absolute"></div>
            <h2 class="text-xl md:text-2xl font-black text-white uppercase tracking-widest bg-[#0A0A0C] px-6 relative z-10">
                {{ $locale == 'ar' ? 'العملاء' : 'Clients' }}
            </h2>
        </div>

        <div class="relative group/slider">
            <button onclick="scrollCarousel('clients-carousel', -1)" class="absolute left-0 rtl:left-auto rtl:right-0 top-1/2 -translate-y-1/2 -translate-x-4 md:-translate-x-6 rtl:translate-x-4 rtl:md:translate-x-6 z-30 w-12 h-12 bg-[#111216] border border-cyan-300/50 rounded-full flex items-center justify-center text-cyan-300 hover:bg-cyan-300 hover:text-black transition-all shadow-[0_0_15px_rgba(103,232,249,0.3)] opacity-0 group-hover/slider:opacity-100">
                <svg class="w-6 h-6 rtl:scale-x-[-1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>

            <div id="clients-carousel" class="flex gap-6 overflow-x-auto rtl:flex-row-reverse snap-x snap-mandatory scroll-smooth hide-scrollbar py-4 px-2">
                @foreach($clients as $client)
                    <div class="snap-start shrink-0 w-[85%] md:w-[450px] bg-[#111216] border border-white/5 p-8 flex items-center gap-6 relative group hover:bg-[#15161A] transition-all duration-300">

                        <div class="absolute top-0 left-0 rtl:left-auto rtl:right-0 h-1.5 bg-gradient-to-r from-purple-500 to-pink-500 w-0 group-hover:w-full transition-all duration-500 ease-out z-20"></div>

                        <div class="w-24 h-24 shrink-0 bg-[#0A0A0C] rounded-full border-2 border-white/10 flex items-center justify-center overflow-hidden group-hover:border-purple-500/50 shadow-[0_0_15px_rgba(0,0,0,0.3)] group-hover:scale-105 transition-all">
                            @if($client->image_path)
                                <img src="{{ Storage::url($client->image_path) }}" class="w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all">
                            @else
                                <svg class="w-10 h-10 text-gray-500 group-hover:text-purple-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                            @endif
                        </div>

                        <div class="flex-grow text-left rtl:text-right">
                            <h4 class="text-gray-500 text-[10px] font-black uppercase tracking-[0.2em] mb-1">
                                {{ $locale == 'ar' ? 'شريك' : 'Partner' }}
                            </h4>

                            <h3 class="text-white font-black text-lg uppercase tracking-wider mb-2 group-hover:text-purple-400 transition-colors w-full break-words break-all">{{ $client->{'name_' . $locale} }}</h3>

                            <p class="text-gray-400 text-sm leading-relaxed line-clamp-3 mb-4 break-words w-full">{!! strip_tags($client->{'description_' . $locale}) !!}</p>

                        </div>
                    </div>
                @endforeach
            </div>

            <button onclick="scrollCarousel('clients-carousel', 1)" class="absolute right-0 rtl:right-auto rtl:left-0 top-1/2 -translate-y-1/2 translate-x-4 md:translate-x-6 rtl:-translate-x-4 rtl:md:-translate-x-6 z-30 w-12 h-12 bg-[#111216] border border-cyan-300/50 rounded-full flex items-center justify-center text-cyan-300 hover:bg-cyan-300 hover:text-black transition-all shadow-[0_0_15px_rgba(103,232,249,0.3)] opacity-0 group-hover/slider:opacity-100">
                <svg class="w-6 h-6 rtl:scale-x-[-1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
        </div>
    </div>
    @endif

    <div class="border border-cyan-300/30 bg-[#111216] p-12 text-center max-w-4xl mx-auto my-24 relative overflow-visible mt-32">
        <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-[#0A0A0C] border-2 border-purple-500 w-16 h-16 flex items-center justify-center rounded-xl shadow-[0_0_20px_rgba(168,85,247,0.4)] z-10">
            <svg class="w-8 h-8 text-purple-400 drop-shadow-[0_0_8px_rgba(168,85,247,0.8)]" fill="currentColor" viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
        </div>

        <h2 class="text-3xl md:text-4xl font-black uppercase tracking-tight mb-4 mt-6">
            {{ $locale == 'ar' ? 'وبما اننا نؤمن ان الخبره الحقيقية والمعرفة يجب ان يتم مشاركتها لكل المهتمين .. يمكنك رؤية لقائتنا التفيزيونية والصحفية والمؤتمرات عبر الجانب الاعلامي Media' : 'As we believe that real experiences and knowledge should be shared in Public, you can visit the Media Section containing our TV Interview and conference speaking ' }}
        </h2>

      <div class="flex flex-col sm:flex-row justify-center gap-6">
    <a href="{{ route('inquiry.create') }}" class="bg-cyan-500 text-white font-black text-[12px] uppercase tracking-widest px-8 py-4 hover:bg-cyan-400 hover:shadow-[0_0_15px_rgba(34,211,238,0.5)] transition-all">
        {{ $locale == 'ar' ? 'احجز استشاره' : 'Book Consultation' }}
    </a>
</div>
    </div>

</div>

<script>
    function scrollCarousel(id, direction) {
        const carousel = document.getElementById(id);
        if (carousel) {
            const scrollAmount = window.innerWidth > 768 ? 420 : 320;
            const isRtl = document.documentElement.dir === 'rtl';
            const finalDirection = isRtl ? -direction : direction;

            carousel.scrollBy({ left: finalDirection * scrollAmount, behavior: 'smooth' });
        }
    }
</script>
@endsection
