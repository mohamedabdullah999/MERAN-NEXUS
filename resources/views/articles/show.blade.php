@extends('layouts.app')

@section('title', $article->{'title_' . app()->getLocale()} . ' | Miran Nexus')

@section('content')
@php $locale = app()->getLocale(); @endphp

<article class="container mx-auto px-6 pt-32 pb-24 relative z-10 text-left rtl:text-right">

    <div class="mb-8">
        <a href="{{ route('articles') }}" class="inline-flex items-center gap-2 text-gray-400 hover:text-purple-400 transition-colors group">
            <svg class="w-5 h-5 rtl:rotate-180 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            {{ $locale == 'ar' ? 'العودة للمقالات' : 'Back to Articles' }}
        </a>
    </div>

    <header class="max-w-4xl mb-12">
        <div class="flex items-center gap-4 mb-6 text-xs font-bold tracking-[0.2em] uppercase text-purple-400">
            <span class="w-12 h-[1px] bg-purple-500"></span>
            {{-- {{ $article->created_at->format('M j, Y') }} --}}
        </div>

        <h1 class="text-4xl md:text-6xl font-black text-white leading-tight mb-8 uppercase tracking-tighter">
            {{ $article->{'title_' . $locale} }}
        </h1>
    </header>

    @if($article->cover_image)
    <div class="w-full h-[300px] md:h-[500px] rounded-xl overflow-hidden mb-12 border border-white/5 shadow-2xl">
        <img src="{{ Storage::url($article->cover_image) }}" class="w-full h-full object-cover" alt="{{ $article->{'title_' . $locale} }}">
    </div>
    @endif

    <div class="max-w-4xl mx-auto">
        <div class="prose prose-invert prose-lg max-w-none text-gray-300 leading-relaxed article-content">
            {!! $article->{'description_' . $locale} !!}
        </div>

        @if($article->media_type !== 'text')
        <div class="mt-16 p-8 border border-purple-500/20 bg-purple-500/5 rounded-xl flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <h3 class="text-white font-bold text-xl mb-2">
                    {{ $article->media_type === 'video' ? ($locale == 'ar' ? 'محتوى مرئي متاح' : 'Video Content Available') : ($locale == 'ar' ? 'رابط خارجي متاح' : 'External Link Available') }}
                </h3>
                <p class="text-gray-400 text-sm italic">{{ $locale == 'ar' ? 'يمكنك الوصول للملحقات من خلال الزر الجانبي' : 'You can access the attachments via the button.' }}</p>
            </div>

            @if($article->media_type === 'video' && $article->file_path)
                <a href="{{ Storage::url($article->file_path) }}" target="_blank" class="px-8 py-4 bg-purple-600 text-white font-black uppercase tracking-widest text-xs hover:bg-pink-600 transition-all shadow-lg shadow-purple-500/20">
                    {{ $locale == 'ar' ? 'تشغيل الفيديو' : 'Watch Briefing' }}
                </a>
            @elseif($article->media_type === 'link' && $article->external_link)
                <a href="{{ $article->external_link }}" target="_blank" class="px-8 py-4 bg-cyan-600 text-white font-black uppercase tracking-widest text-xs hover:bg-cyan-500 transition-all shadow-lg shadow-cyan-500/20">
                    {{ $locale == 'ar' ? 'زيارة الرابط' : 'Visit Link' }}
                </a>
            @endif
        </div>
        @endif
    </div>
</article>

<style>
    /* تنسيقات إضافية للمحتوى لضمان ظهوره بشكل ممتاز */
    .article-content h2, .article-content h3 { color: white; font-weight: 800; margin-top: 2.5rem; margin-bottom: 1rem; text-transform: uppercase; }
    .article-content p { margin-bottom: 1.5rem; font-size: 1.125rem; }
    .article-content ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1.5rem; }
    .article-content li { margin-bottom: 0.5rem; }
    .article-content a { color: #a855f7; text-decoration: underline; }
    .article-content img { border-radius: 0.75rem; border: 1px solid rgba(255,255,255,0.05); margin: 2rem 0; }
    .article-content blockquote { border-left: 4px solid #a855f7; padding-left: 1.5rem; font-style: italic; color: #d1d5db; margin: 2rem 0; }
</style>
@endsection
