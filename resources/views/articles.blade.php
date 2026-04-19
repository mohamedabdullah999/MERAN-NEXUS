@extends('layouts.app')

@section('title', app()->getLocale() == 'ar' ? 'المقالات | Miran Nexus' : 'Articles | Miran Nexus')

@section('content')
@php
    $locale = app()->getLocale();
@endphp
<div class="container mx-auto px-6 pt-32 pb-24 relative z-10 text-left rtl:text-right">

    <div class="pt-8 pb-16 text-center md:text-left rtl:md:text-right">
        <h1 class="text-5xl md:text-7xl font-black tracking-tighter mb-6 uppercase leading-tight">
            @if($locale == 'ar')
                رؤى تقنية  <br> <span class="text-purple-400 drop-shadow-[0_0_15px_rgba(168,85,247,0.5)]"> تبسط التعقيد
                </span>
            @else
                Insights That<br><span class="text-purple-400 drop-shadow-[0_0_15px_rgba(168,85,247,0.5)]">Simplify Technology</span>
            @endif
        </h1>

        <p class="text-gray-400 text-sm md:text-base leading-relaxed max-w-2xl mb-12">
            {{ $locale == 'ar' ? 'آراء وتوصيات من عملاء وشركاء ومديرين تعاملت معهم في مشاريع مختلفة.' : 'Practical articles and expert perspectives on cybersecurity, IT strategy, digital transformation and career coaching.' }}
        </p>
    </div>

    @if($articles->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-6 gap-6 mb-24">
        @foreach($articles as $index => $article)
            @php
                $mod = $index % 5;
                $gridClass = '';
                $imageHeight = '';
                $titleSize = '';
                $showDescription = false;

                if ($mod === 0) {
                    $gridClass = 'md:col-span-4 md:row-span-2';
                    $imageHeight = 'h-[300px] md:h-[450px]';
                    $titleSize = 'text-3xl md:text-4xl';
                    $showDescription = true;
                } elseif ($mod === 1 || $mod === 2) {
                    $gridClass = 'md:col-span-2 md:row-span-1';
                    $imageHeight = 'h-[180px]';
                    $titleSize = 'text-lg md:text-xl';
                    $showDescription = false;
                } else {
                    $gridClass = 'md:col-span-3 md:row-span-1';
                    $imageHeight = 'h-[250px]';
                    $titleSize = 'text-xl md:text-2xl';
                    $showDescription = true;
                }

                $badgeColors = ['text-cyan-300 bg-cyan-900/50 border-cyan-300/30', 'text-pink-400 bg-pink-950/50 border-pink-500/30', 'text-purple-400 bg-purple-950/50 border-purple-500/30'];
                $badgeStyle = $badgeColors[$index % 3];

                $onClickAction = '';
                if($article->media_type === 'video' && $article->file_path) {
                    $videoPath = str_replace('\\', '/', Storage::url($article->file_path));
                    $onClickAction = 'onclick="openVideoModal(\'' . $videoPath . '\')"';
                } elseif($article->media_type === 'link' && $article->external_link) {
                    $onClickAction = 'onclick="window.open(\'' . $article->external_link . '\', \'_blank\')"';
                }
            @endphp

            <div class="{{ $gridClass }} bg-[#111216] border border-white/5 relative group hover:bg-[#15161A] transition-all duration-300 flex flex-col h-full hover:-translate-y-2 hover:shadow-[0_15px_30px_rgba(168,85,247,0.15)] cursor-pointer" {!! $onClickAction !!}>

                <div class="absolute top-0 left-0 rtl:left-auto rtl:right-0 h-1 bg-gradient-to-r from-purple-500 to-pink-500 w-0 group-hover:w-full transition-all duration-500 ease-out z-20"></div>

                <div class="relative w-full {{ $imageHeight }} bg-black overflow-hidden shrink-0">

                    <div class="absolute top-4 left-4 rtl:left-auto rtl:right-4 z-10 border text-[9px] font-black uppercase tracking-[0.2em] px-3 py-1 rounded-sm backdrop-blur-sm {{ $badgeStyle }}">
                        {{ $article->media_type === 'link' ? ($locale == 'ar' ? 'رابط آمن خارجي' : 'EXTERNAL SECURE LINK') : ($article->media_type === 'video' ? ($locale == 'ar' ? 'موجز فيديو' : 'VIDEO BRIEFING') : ($locale == 'ar' ? 'تقرير استخباراتي' : 'INTEL REPORT')) }}
                    </div>

                    @if($article->cover_image)
                        <img src="{{ Storage::url($article->cover_image) }}" loading="lazy" alt="{{ $article->{'title_' . $locale} }}" class="w-full h-full object-cover grayscale opacity-60 group-hover:grayscale-0 group-hover:opacity-100 group-hover:scale-105 transition-all duration-700">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-[#1A1C23] to-[#0A0A0C] flex items-center justify-center grayscale opacity-60 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-700">
                            <svg class="w-16 h-16 text-gray-700" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                        </div>
                    @endif

                    @if($article->media_type === 'video')
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 bg-black/40 border border-white/20 rounded-full flex items-center justify-center backdrop-blur-md group-hover:bg-purple-500 group-hover:border-purple-400 group-hover:shadow-[0_0_20px_rgba(168,85,247,0.5)] transition-all duration-300 z-10">
                                <svg class="w-6 h-6 text-white ml-1 rtl:ml-0 rtl:mr-1 rtl:scale-x-[-1] group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6z"></path></svg>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="p-6 md:p-8 flex flex-col flex-grow">
                    <h3 class="{{ $titleSize }} font-bold text-white mb-4 line-clamp-2 leading-snug group-hover:text-purple-400 transition-colors duration-300 flex items-start gap-3">
                        <span class="flex-grow">{{ $article->{'title_' . $locale} }}</span>
                        @if($article->media_type === 'link')
                            <svg class="w-5 h-5 shrink-0 text-cyan-300 opacity-0 group-hover:opacity-100 transition-opacity duration-300 mt-1 rtl:scale-x-[-1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        @endif
                    </h3>

                    @if($showDescription)
                        <p class="text-gray-400 text-sm leading-relaxed line-clamp-3 mb-6 flex-grow">{!! strip_tags($article->{'description_' . $locale}) !!}</p>
                    @endif

                    <div class="mt-auto border-t border-white/5 pt-5 flex justify-between items-center text-[10px] text-gray-500 uppercase tracking-widest font-semibold opacity-70 group-hover:opacity-100 transition-opacity">
                        <div class="flex items-center gap-2">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ $article->created_at->format('M j, Y') }}
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ $article->media_type === 'video' ? ($locale == 'ar' ? 'سجل فيديو' : 'VIDEO LOG') : rand(4, 15) . ($locale == 'ar' ? ' دقائق للقراءة' : ' MIN READ') }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-20">
        <p class="text-gray-500 tracking-widest uppercase">
            {{ $locale == 'ar' ? 'لا توجد تقارير استخبارات التهديدات متاحة في الوقت الحالي.' : 'No Threat Intelligence reports available at the moment.' }}
        </p>
    </div>
    @endif

    <div class="border border-white/5 bg-[#111216] p-12 text-center max-w-4xl mx-auto my-24 relative overflow-hidden group">
        <div class="absolute top-0 left-0 rtl:left-auto rtl:right-0 h-[2px] bg-gradient-to-r from-purple-500 to-pink-500 w-0 group-hover:w-full transition-all duration-500 ease-out z-20"></div>

        <div class="mb-6 flex justify-center">
            <svg class="w-8 h-8 text-purple-400" fill="currentColor" viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
        </div>

        <h2 class="text-3xl md:text-5xl font-black uppercase tracking-tight mb-4 leading-tight">
            {{ $locale == 'ar' ? ' هل كل هذا حقيقي ام كلام تسويقي ؟ يمكنك قراءة اراء المدراء والخبراء الذي تم التعامل معهم خلال السنوات الماضية من خلال ال Testimonials وتحقق بنفسك ..  ' : "Is all this real or just marketing hype? You can read the testimonials of managers and who worked with over the years and see for yourself." }}
        </h2>

       <div class="flex flex-col sm:flex-row justify-center gap-6">
    <a href="{{ route('inquiry.create') }}" class="bg-purple-500 text-white font-black text-xs uppercase tracking-widest px-10 py-4 hover:bg-pink-500 hover:shadow-[0_0_20px_rgba(236,72,153,0.5)] transition-all duration-300">
        {{ $locale == 'ar' ? 'تواصل معي' : 'Contact me' }}
    </a>
</div>
    </div>

</div>

<div id="videoModal" class="fixed inset-0 z-[100] hidden bg-black/95 backdrop-blur-md flex items-center justify-center opacity-0 transition-opacity duration-300">
    <div class="relative w-full max-w-5xl p-4">
        <button onclick="closeVideoModal()" class="absolute -top-12 right-4 rtl:right-auto rtl:left-4 text-white hover:text-cyan-300 text-4xl font-bold transition">&times;</button>
        <div class="relative w-full aspect-video rounded-xl overflow-hidden border border-white/20 shadow-[0_0_40px_rgba(168,85,247,0.3)] bg-black">
            <video id="modalVideoPlayer" controls class="w-full h-full outline-none">
                <source src="" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
</div>

<script>
    function openVideoModal(videoSrc) {
        const modal = document.getElementById('videoModal');
        const player = document.getElementById('modalVideoPlayer');
        player.src = videoSrc;
        player.load();
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            player.play().catch(e => console.log(e));
        }, 50);
    }

    function closeVideoModal() {
        const modal = document.getElementById('videoModal');
        const player = document.getElementById('modalVideoPlayer');
        player.pause();
        player.src = "";
        player.load();
        modal.classList.add('opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    document.getElementById('videoModal').addEventListener('click', function(e) {
        if (e.target === this) closeVideoModal();
    });
</script>
@endsection
