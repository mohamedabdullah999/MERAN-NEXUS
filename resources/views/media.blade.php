@extends('layouts.app')

@section('title', app()->getLocale() == 'ar' ? ' الاعلام | Miran Nexus' : 'Media | Miran Nexus')

@section('content')
@php
    $locale = app()->getLocale();
@endphp
<div class="container mx-auto px-6 pt-16 pb-24 relative z-10 text-left rtl:text-right">

    <div class="pt-8 pb-16 text-left rtl:text-right">
        <h1 class="text-6xl md:text-8xl font-black tracking-tighter mb-6 uppercase leading-tight">
            @if($locale == 'ar')
                 مشاركة المعرفة  <br>   <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white">وإلهام الابتكار</span>
            @else
                Sharing Knowledge   <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white">Inspiring Innovation</span>
            @endif
        </h1>

        <p class="text-gray-400 text-sm md:text-base leading-relaxed max-w-xl mb-12">
            {{ $locale == 'ar' ? ' أبرز مشاركاتي الإعلامية ولقاءاتي ومداخلاتي في المؤتمرات المتخصصة في التكنولوجيا والتحول الرقمي' : 'Highlights from my media appearances, conferences, and professional talks in technology and digital transformation.' }}
        </p>
    </div>

    @foreach($categories as $index => $category)
        <div class="mb-24 relative">

            <div class="flex items-center mb-10 pb-6 border-b border-white/5 relative rtl:flex-row-reverse">
                <h2 class="text-2xl font-black text-white uppercase tracking-widest">{{ $category->{'name_' . $locale} }}</h2>
                <div class="flex-grow h-[1px] bg-white/10 ml-6 rtl:ml-0 rtl:mr-6"></div>
            </div>

            <div class="absolute right-0 rtl:left-0 rtl:right-auto top-20 bottom-0 w-24 bg-gradient-to-l rtl:bg-gradient-to-r from-[#0A0A0C] to-transparent z-10 pointer-events-none"></div>

            <div class="relative group/slider">

                <button onclick="scrollCarousel('media-carousel-{{ $index }}', -1)" class="absolute left-0 rtl:left-auto rtl:right-0 top-1/2 -translate-y-1/2 -translate-x-4 md:-translate-x-6 rtl:translate-x-4 rtl:md:translate-x-6 z-30 w-12 h-12 bg-[#111216] border border-purple-500/50 rounded-full flex items-center justify-center text-purple-400 hover:bg-purple-500 hover:text-white transition-all shadow-[0_0_15px_rgba(168,85,247,0.3)] opacity-0 group-hover/slider:opacity-100">
                    <svg class="w-6 h-6 rtl:scale-x-[-1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>

                <div id="media-carousel-{{ $index }}" class="flex gap-6 overflow-x-auto rtl:flex-row-reverse snap-x snap-mandatory scroll-smooth hide-scrollbar pb-6 px-2 -mx-2">
                    @foreach($category->media as $item)
                        <div class="snap-start shrink-0 w-[350px] md:w-[450px] bg-[#111216] border border-white/5 p-0 relative group hover:bg-[#15161A] transition-all duration-500 min-h-[300px] flex flex-col overflow-hidden">

                            <div class="absolute top-0 left-0 rtl:left-auto rtl:right-0 h-1.5 bg-gradient-to-r from-purple-500 to-pink-500 w-0 group-hover:w-full transition-all duration-500 ease-out z-50"></div>

                            @php $onClickAction = ''; @endphp
                            @if($item->type === 'video' && $item->file_path)
                                @php
                                    $videoPath = str_replace('\\', '/', Storage::url($item->file_path));
                                    $onClickAction = 'onclick="openVideoModal(\'' . $videoPath . '\')"';
                                @endphp
                            @elseif($item->type === 'link' && $item->external_link)
                                @php $onClickAction = 'onclick="window.open(\'' . $item->external_link . '\', \'_blank\')"'; @endphp
                            @endif

                            <div class="relative w-full aspect-video bg-black overflow-hidden cursor-pointer" {!! $onClickAction !!}>
                                @if($item->cover_image)
                                    <img src="{{ Storage::url($item->cover_image) }}" alt="{{ $item->{'title_' . $locale} }}" class="w-full h-full object-cover grayscale opacity-70 group-hover:grayscale-0 group-hover:opacity-100 group-hover:scale-105 transition duration-500">
                                @else
                                    <div class="w-full h-full bg-[#1A1C23] flex items-center justify-center grayscale opacity-70 group-hover:grayscale-0 group-hover:opacity-100 transition duration-500">
                                        <svg class="w-16 h-16 text-gray-700" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                                    </div>
                                @endif

                                @if($item->type === 'video')
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="w-14 h-14 bg-white/10 border border-white/20 rounded-full flex items-center justify-center backdrop-blur-md group-hover:bg-purple-500 group-hover:shadow-[0_0_15px_rgba(168,85,247,0.5)] transition duration-300">
                                            <svg class="w-6 h-6 text-white ml-1 rtl:mr-1 rtl:ml-0 rtl:scale-x-[-1] group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6z"></path></svg>
                                        </div>
                                    </div>
                                @elseif($item->type === 'link')
                                    <div class="absolute top-4 right-4 rtl:right-auto rtl:left-4 bg-black/50 p-2 rounded backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <svg class="w-4 h-4 text-purple-400 rtl:scale-x-[-1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    </div>
                                @endif
                            </div>

                            <div class="p-8 flex flex-col flex-grow text-left rtl:text-right">
                                <h3 class="font-bold text-lg mb-2 line-clamp-2 group-hover:text-purple-400 transition-colors w-full break-words break-all">{{ $item->{'title_' . $locale} }}</h3>

                                <div class="mt-auto pt-6 flex justify-between items-center rtl:flex-row-reverse text-[10px] text-gray-500 uppercase tracking-widest opacity-70 group-hover:opacity-100 transition-opacity">
                                    <span>{{ $item->type === 'video' ? ($locale == 'ar' ? 'ميديا داخلية' : 'INTERNAL MEDIA') : ($locale == 'ar' ? 'رابط آمن خارجي' : 'EXTERNAL SECURE LINK') }}</span>
                                    <span>{{ $item->created_at->format('M j, Y') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button onclick="scrollCarousel('media-carousel-{{ $index }}', 1)" class="absolute right-0 rtl:right-auto rtl:left-0 top-1/2 -translate-y-1/2 translate-x-4 md:translate-x-6 rtl:-translate-x-4 rtl:md:-translate-x-6 z-30 w-12 h-12 bg-[#111216] border border-purple-500/50 rounded-full flex items-center justify-center text-purple-400 hover:bg-purple-500 hover:text-white transition-all shadow-[0_0_15px_rgba(168,85,247,0.3)] opacity-0 group-hover/slider:opacity-100">
                    <svg class="w-6 h-6 rtl:scale-x-[-1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>
    @endforeach

    <div class="border border-white/5 bg-[#111216] p-12 text-center max-w-4xl mx-auto my-24 relative overflow-hidden group">
        <div class="absolute top-0 left-0 rtl:left-auto rtl:right-0 h-[2px] bg-gradient-to-r from-purple-500 to-pink-500 w-0 group-hover:w-full transition-all duration-500 ease-out z-20"></div>

        <div class="mb-6 flex justify-center">
            <svg class="w-8 h-8 text-purple-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/></svg>
        </div>

        <h2 class="text-2xl md:text-3xl font-black uppercase tracking-tight mb-4 leading-relaxed">
            {{ $locale == 'ar' ? 'وحرصا منا على استمرار نشر المعرفة والاراء المنبية على المنطق العلمي والممارسة العملية  نضيف دوما باستمرار بعض المقالات والفيديوهات لمشاركتكم التجارب المخلتفة ع مدار سنوات من الانخراط بسوق العمل بمختلف قطاعاته وتنوع مجالاته .. يمكنكم الاطلاع على جزء المقالات ومشاركتنا ارائكم الفعالة ' : 'In our commitment to continuously disseminating knowledge and opinions grounded in scientific logic and practical experience' }}
        </h2>
       <p class="text-gray-400 text-lg max-w-md mx-auto mb-10 leading-relaxed mt-4">
    {{ $locale == 'ar' ? 'هل تحتاج إلى استخبارات متخصصة أو استشارة مباشرة؟ قم بإنشاء قناة مشفرة مع فريق العمليات الأساسي لدينا.' : 'we regularly add articles and videos to share diverse experiences gained over years of working in various sectors and fields of the job market. You can review the articles and share your valuable feedback with us.' }}
</p>
        <div class="flex justify-center">
            <a href="{{ route('inquiry.create') }}" class="bg-purple-500 text-white font-black text-xs uppercase tracking-widest px-10 py-4 hover:bg-pink-500 hover:shadow-[0_0_20px_rgba(236,72,153,0.5)] transition-all duration-300">
                {{ $locale == 'ar' ? 'تواصل معي' : 'Contact me' }}
            </a>
        </div>
    </div>
    </div>

</div>

<div id="videoModal" class="fixed inset-0 z-[100] hidden bg-black/95 backdrop-blur-md flex items-center justify-center opacity-0 transition-opacity duration-300">
    <div class="relative w-full max-w-5xl p-4">
        <button onclick="closeVideoModal()" class="absolute -top-12 right-4 rtl:right-auto rtl:left-4 text-white hover:text-purple-500 text-4xl font-bold transition">&times;</button>

        <div class="relative w-full aspect-video rounded-xl overflow-hidden border border-white/20 shadow-[0_0_40px_rgba(168,85,247,0.2)] bg-black">
            <video id="modalVideoPlayer" controls class="w-full h-full outline-none">
                <source src="" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
</div>

<script>
    function scrollCarousel(id, direction) {
        const carousel = document.getElementById(id);
        if (carousel) {
            const scrollAmount = window.innerWidth > 768 ? 470 : 370;
            const isRtl = document.documentElement.dir === 'rtl';
            const finalDirection = isRtl ? -direction : direction;

            carousel.scrollBy({ left: finalDirection * scrollAmount, behavior: 'smooth' });
        }
    }

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
