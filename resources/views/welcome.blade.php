@extends('layouts.app')

@section('content')
    @php
        $locale = app()->getLocale();
    @endphp

   <section class="hero-bg min-h-screen flex items-center pt-20">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-center -mt-24">
            <div class="text-left rtl:text-right">
                <h1 class="text-5xl md:text-7xl font-bold mb-4 leading-tight hero-title text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500 drop-shadow-[0_0_15px_rgba(168,85,247,0.4)]">
                    {{ $settings->{'hero_title_' . $locale} ?? ($locale == 'ar' ? 'نبني عوالم رقمية آمنة' : 'Building Secure Digital Worlds') }}
                </h1>
                <p class="text-gray-300 text-lg mb-8 tracking-wide">
                    {{ $settings->{'hero_brief_' . $locale} ?? ($locale == 'ar' ? 'الأمن السيبراني | البنية التحتية | التحول الرقمي' : 'Cybersecurity | Infrastructure | Digital Transformation') }}
                </p>

                <div class="flex gap-4">
                    <a href="{{ route('inquiry.create') }}" class="px-6 py-3 border border-purple-500/50 hover:bg-purple-900/30 hover:border-pink-400 transition-all rounded text-sm font-bold text-center group flex items-center justify-center">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500 group-hover:drop-shadow-[0_0_8px_rgba(236,72,153,0.8)]">
                            {{ $locale == 'ar' ? 'احجز استشارتك' : 'Book Consultation' }}
                        </span>
                    </a>
                    <a href="{{ route('case-studies') }}" class="px-6 py-3 rounded text-sm font-bold border border-gray-500 hover:border-white transition text-center flex items-center justify-center text-white">
                        {{ $locale == 'ar' ? 'شاهد أعمالي' : 'View My Work' }}
                    </a>
                </div>
            </div>

            <div class="flex justify-center relative items-center mt-12 md:mt-0">
                <div class="absolute inset-0 bg-purple-500/10 blur-[100px] rounded-full z-0 w-64 h-64 md:w-full md:h-full mx-auto"></div>

                @if(isset($settings->hero_image))
                    <img src="{{ Storage::url($settings->hero_image) }}" alt="Hero Image"
                         class="w-64 h-64 md:w-96 md:h-96 rounded-full object-cover border-4 border-white/10 relative z-10 drop-shadow-[0_0_30px_rgba(236,72,153,0.3)]">
                @endif
            </div>
        </div>
    </section>

    <section id="services" class="py-20 container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold inline-block border-b-2 border-purple-500 pb-2">
                {{ $locale == 'ar' ? 'ماذا أقدم' : 'What I Do' }}
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            @foreach($services as $service)
                <div class="neon-card flex flex-col items-center text-center p-8 md:p-10 group h-full min-h-[320px] relative overflow-hidden justify-between bg-[#111216] border border-white/5 hover:bg-[#15161A] transition-all duration-500">

                    <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-purple-500 to-pink-500 transform origin-left rtl:origin-right scale-x-0 group-hover:scale-x-100 transition-transform duration-500 z-20"></div>

                    <div class="flex-grow flex flex-col items-center justify-start w-full mt-2">

                        <div class="relative w-48 h-48 mb-8 flex items-center justify-center opacity-85 group-hover:opacity-100 group-hover:scale-110 group-hover:-translate-y-2 transition-all duration-500 rounded-full border-2 border-white/10 group-hover:border-purple-500/50 shadow-[0_0_20px_rgba(0,0,0,0.5)] overflow-hidden bg-[#0A0A0C]">

                            <div class="absolute inset-0 bg-gradient-to-tr from-purple-500/20 to-transparent group-hover:from-pink-500/30 transition duration-500 z-0"></div>

                            @if($service->image_path)
                                <img src="{{ Storage::url($service->image_path) }}" alt="{{ $service->{'name_' . $locale} }}" class="w-full h-full object-cover relative z-10 transition-transform duration-700 group-hover:scale-110">
                            @endif
                        </div>

                        <h3 class="font-bold text-2xl mb-3 text-white">{{ $service->{'name_' . $locale} }}</h3>

                        @if(isset($service->{'description_' . $locale}))
                            <p class="text-gray-400 text-sm leading-relaxed line-clamp-3">
                                {!! strip_tags($service->{'description_' . $locale}) !!}
                            </p>
                        @endif
                    </div>

                    <a href="{{ url('/services') }}" class="mt-8 text-sm font-bold text-purple-400 opacity-80 group-hover:opacity-100 group-hover:-translate-y-1 transition-all flex items-center gap-2">
                        {{ $locale == 'ar' ? 'اقرأ المزيد' : 'Read More' }}
                        <svg class="w-4 h-4 rtl:scale-x-[-1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <section class="py-20 container mx-auto px-6 bg-black/20">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold inline-block border-b-2 border-purple-500 pb-2">
                {{ $locale == 'ar' ? 'النتائج والتأثير' : 'Results & Impact' }}
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($impacts->take(3) as $index => $impact)
                @php
                    $themes = [
                        ['color' => 'text-cyan-400', 'line' => 'bg-cyan-400', 'bar' => 'from-cyan-400 to-blue-500'],
                        ['color' => 'text-yellow-400', 'line' => 'bg-yellow-400', 'bar' => 'from-yellow-400 to-orange-500'],
                        ['color' => 'text-pink-500', 'line' => 'bg-pink-500', 'bar' => 'from-pink-500 to-rose-500'],
                    ];
                    $theme = $themes[$index % 3];
                    $colorClass = $theme['color'];
                    $lineColorClass = $theme['line'];
                    $barClass = $theme['bar'];
                @endphp

                <div class="bg-[#111216] border border-white/5 p-8 md:p-10 relative group hover:bg-[#15161A] transition-all duration-500 overflow-hidden flex flex-col justify-between min-h-[320px] h-full text-left rtl:text-right">

                    <div class="absolute top-0 left-0 rtl:left-auto rtl:right-0 h-1.5 bg-gradient-to-r {{ $barClass }} w-0 group-hover:w-full transition-all duration-500 ease-out z-20"></div>

                    <div class="flex-grow">
                        <div class="flex justify-between items-start mb-6 rtl:flex-row-reverse">
                            <h3 class="{{ $colorClass }} text-6xl lg:text-[5rem] font-black tracking-tighter leading-none drop-shadow-[0_0_15px_currentColor]" dir="ltr">
                                {{ $impact->{'value_' . $locale} }}
                            </h3>

                            <div class="text-white/10 w-12 h-12 shrink-0 ml-4 rtl:ml-0 rtl:mr-4 group-hover:text-white/20 transition-colors duration-300">
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

                        <div class="w-full h-[2px] {{ $lineColorClass }} opacity-80 mb-6"></div>

                        @if(isset($impact->{'description_' . $locale}))
                            <p class="text-gray-400 text-sm leading-relaxed line-clamp-3">
                                {!! strip_tags($impact->{'description_' . $locale}) !!}
                            </p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="media" class="py-20 container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold inline-block border-b-2 border-purple-500 pb-2">
                {{ $locale == 'ar' ? 'الاعلام والظهور' : 'Media & Appearances' }}
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($media as $item)
                @php
                    $itemType = $item->type;
                    $imgSrc = $itemType === 'image' ? $item->file_path : $item->cover_image;

                    if ($itemType === 'link') {
                        $url = $item->external_link;
                        $target = 'target="_blank"';
                        $onClick = '';
                    } elseif ($itemType === 'video') {
                        $url = 'javascript:void(0)';
                        $target = '';
                        $videoPath = str_replace('\\', '/', Storage::url($item->file_path));
                        $onClick = 'onclick="openVideoModal(\'' . $videoPath . '\')"';
                    } else {
                        $url = url('/media/' . $item->id);
                        $target = '';
                        $onClick = '';
                    }
                @endphp
                <div class="neon-card p-0 group flex flex-col h-full relative">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-purple-500 to-pink-500 transform origin-left rtl:origin-right scale-x-0 group-hover:scale-x-100 transition-transform duration-500 z-20"></div>

                    <a href="{{ $url }}" {!! $target !!} {!! $onClick !!} class="block relative w-full aspect-video bg-gray-900 overflow-hidden cursor-pointer">
                        @if($imgSrc)
                            <img src="{{ Storage::url($imgSrc) }}" class="w-full h-full object-cover opacity-70 group-hover:opacity-100 group-hover:scale-110 transition duration-500">
                        @endif
                        @if($itemType === 'video')
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-14 h-14 bg-white/10 border border-white/20 rounded-full flex items-center justify-center backdrop-blur-md group-hover:bg-purple-500/80 transition duration-300 shadow-[0_0_15px_rgba(0,0,0,0.5)] group-hover:scale-110">
                                    <svg class="w-6 h-6 text-white ml-1 rtl:mr-1 rtl:ml-0 rtl:scale-x-[-1]" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6z"></path></svg>
                                </div>
                            </div>
                        @endif
                    </a>

                    <div class="p-6 flex flex-col justify-between flex-grow bg-[#05050A] text-left rtl:text-right">
                        <h3 class="font-bold text-lg mb-4 line-clamp-2">{{ $item->{'title_' . $locale} }}</h3>
                        <a href="{{ $url }}" {!! $target !!} {!! $onClick !!} class="mt-auto text-sm font-bold text-purple-400 opacity-80 group-hover:opacity-100 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-all flex items-center gap-1 w-max">
                            {{ $itemType === 'video' ? ($locale == 'ar' ? 'تشغيل الفيديو' : 'Play Video') : ($locale == 'ar' ? 'عرض التفاصيل' : 'View Details') }}
                            <svg class="w-4 h-4 rtl:scale-x-[-1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="articles" class="py-20 container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold inline-block border-b-2 border-purple-500 pb-2">
                {{ $locale == 'ar' ? 'المقالات' : 'Articles' }}
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($articles as $article)
                @php
                    $articleType = $article->media_type;
                    $imgSrc = $articleType === 'image' ? $article->file_path : $article->cover_image;

                    if ($articleType === 'external_link') {
                        $url = $article->external_link;
                        $target = 'target="_blank"';
                        $onClick = '';
                    } elseif ($articleType === 'video') {
                        $url = 'javascript:void(0)';
                        $target = '';
                        $videoPath = str_replace('\\', '/', Storage::url($article->file_path));
                        $onClick = 'onclick="openVideoModal(\'' . $videoPath . '\')"';
                    } else {
                        $url = url('/articles');
                        $target = '';
                        $onClick = '';
                    }
                @endphp
                <div class="neon-card p-0 group flex flex-col h-full relative">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-purple-500 to-pink-500 transform origin-left rtl:origin-right scale-x-0 group-hover:scale-x-100 transition-transform duration-500 z-20"></div>

                    <a href="{{ $url }}" {!! $target !!} {!! $onClick !!} class="block relative w-full aspect-video bg-gray-900 overflow-hidden cursor-pointer">
                        @if($imgSrc)
                            <img src="{{ Storage::url($imgSrc) }}" class="w-full h-full object-cover opacity-70 group-hover:opacity-100 group-hover:scale-110 transition duration-500">
                        @endif
                        @if($articleType === 'video')
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-14 h-14 bg-white/10 border border-white/20 rounded-full flex items-center justify-center backdrop-blur-md group-hover:bg-purple-500/80 transition duration-300 shadow-[0_0_15px_rgba(0,0,0,0.5)] group-hover:scale-110">
                                    <svg class="w-6 h-6 text-white ml-1 rtl:mr-1 rtl:ml-0 rtl:scale-x-[-1]" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6z"></path></svg>
                                </div>
                            </div>
                        @else
                            <div class="absolute inset-0 bg-gradient-to-t from-[#05050A] via-transparent to-transparent"></div>
                        @endif
                    </a>

                    <div class="p-6 flex flex-col justify-between flex-grow bg-[#05050A] -mt-2 z-10 text-left rtl:text-right">
                        <div>
                            <h3 class="text-xl font-bold mb-3 line-clamp-2">{{ $article->{'title_' . $locale} }}</h3>
                            <div class="text-gray-400 text-sm line-clamp-3 mb-6">{!! strip_tags($article->{'description_' . $locale}) !!}</div>
                        </div>
                        <a href="{{ $url }}" {!! $target !!} {!! $onClick !!} class="mt-auto text-sm font-bold text-purple-400 opacity-80 group-hover:opacity-100 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-all flex items-center gap-1 w-max">
                            {{ $articleType === 'video' ? ($locale == 'ar' ? 'تشغيل الفيديو' : 'Play Video') : ($locale == 'ar' ? 'قراءة المقال' : 'Read Article') }}
                            <svg class="w-4 h-4 rtl:scale-x-[-1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <div id="videoModal" class="fixed inset-0 z-[100] hidden bg-black/95 backdrop-blur-md flex items-center justify-center opacity-0 transition-opacity duration-300">
        <div class="relative w-full max-w-5xl p-4">
            <button onclick="closeVideoModal()" class="absolute -top-12 right-4 rtl:right-auto rtl:left-4 text-white hover:text-red-500 text-4xl font-bold transition">&times;</button>

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
                player.play().catch(error => console.log("Auto-play blocked by browser:", error));
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
            if (e.target === this) {
                closeVideoModal();
            }
        });
    </script>
@endsection
