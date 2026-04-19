@extends('layouts.app')

@section('title', app()->getLocale() == 'ar' ? 'القناة الآمنة | Miran Nexus' : 'Secure Channel | Miran Nexus')

@section('content')
@php
    $locale = app()->getLocale();
@endphp

<div class="relative min-h-screen bg-[#0A0A0C] bg-[linear-gradient(to_right,#ffffff05_1px,transparent_1px),linear-gradient(to_bottom,#ffffff05_1px,transparent_1px)] bg-[size:40px_40px] pt-32 pb-24 z-10 text-left rtl:text-right">

    <div class="container mx-auto px-6 relative z-10">

        @if(session('success'))
            <div class="max-w-5xl mx-auto mb-8 border border-green-500/50 bg-green-900/20 p-4 flex items-center gap-4 rtl:flex-row-reverse">
                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                <p class="text-green-400 font-mono text-sm uppercase tracking-widest">
                    {{ $locale == 'ar' ? 'تم استلام الإرسال بنجاح. انتظر الرد.' : session('success') }}
                </p>
            </div>
        @endif

        <div class="flex flex-col lg:flex-row gap-16 lg:gap-8 max-w-6xl mx-auto items-start rtl:flex-row-reverse">

            <div class="w-full lg:w-5/12 pt-8">

                <h1 class="text-5xl md:text-6xl font-black uppercase tracking-tighter mb-6 leading-tight">
                    @if($locale == 'ar')
                        ابق علي <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white drop-shadow-[0_0_15px_rgba(103,232,249,0.4)]">تواصل</span>
                    @else
                        Keep in <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white drop-shadow-[0_0_15px_rgba(103,232,249,0.4)]">touch</span>
                    @endif
                </h1>

                <div class="w-full h-[1px] bg-gradient-to-r from-cyan-300 to-transparent mb-8 rtl:bg-gradient-to-l"></div>

                <p class="text-gray-400 text-base md:text-lg leading-relaxed mb-12">
                    {{ $locale == 'ar'
                        ? 'اشكرك جدا لتصحفك ووصولك لهنا .. ويسعدني اهتمامك وان تكون من ضمن دائره المعارف القيمة لدينا في Miran Nexus تواصل معي وشاركني خبراتك ايضا '
                        : "Thank you so much for browsing and coming this far. I'm delighted by your interest and hope to be a part of our valuable network at Miran Nexus. Please get in touch and share your experiences with me as well"
                    }}
                </p>

                <div class="space-y-6 mb-16">
                    <div class="bg-[#111216] border border-white/5 border-l-2 rtl:border-l-0 rtl:border-r-2 border-cyan-300 p-6 flex items-center gap-5 relative group hover:bg-[#15161A] transition-colors rtl:flex-row-reverse">
                        <div class="text-cyan-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                        </div>
                        <div>
                            <p class="text-cyan-300/70 font-mono text-[10px] uppercase tracking-widest mb-1">> {{ $locale == 'ar' ? 'الاتصال الرئيسي' : 'PRIMARY COMM' }}</p>
                            <p class="text-white font-bold tracking-wider text-lg" dir="ltr">{{ $settings->contact_email ?? 'connect@mirannexus.com' }}</p>
                        </div>
                    </div>

                    <div class="bg-[#111216] border border-white/5 border-l-2 rtl:border-l-0 rtl:border-r-2 border-purple-500 p-6 flex items-center gap-5 relative group hover:bg-[#15161A] transition-colors rtl:flex-row-reverse">
                        <div class="text-purple-400">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-1 14H5V6h14v12zM6 10h2v2H6zm0 4h8v2H6z"/></svg>
                        </div>
                        <div>
                            <p class="text-purple-400/70 font-mono text-[10px] uppercase tracking-widest mb-1">> {{ $locale == 'ar' ? 'الخط المشفر' : 'ENCRYPTED LINE' }}</p>
                            <p class="text-white font-bold tracking-wider text-lg" dir="ltr">{{ $settings->contact_phone ?? '+1-0x-NEXUS' }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-3 font-mono text-gray-500 text-xs uppercase tracking-widest rtl:flex-row-reverse">
                    <span class="w-3 h-3 rounded-full bg-cyan-300 shadow-[0_0_10px_rgba(103,232,249,0.8)] animate-pulse"></span>
                    {{ $locale == 'ar' ? 'النظام جاهز. في انتظار البيانات.' : 'SYSTEM READY. WAITING FOR INPUT.' }}
                </div>
            </div>

            <div class="w-full lg:w-7/12 relative mt-10 lg:mt-0">

                <div class="absolute -top-6 -right-6 rtl:right-auto rtl:-left-6 w-24 h-24 border-t border-r rtl:border-r-0 rtl:border-l border-purple-500/50 pointer-events-none z-0"></div>

                <div class="absolute -bottom-6 -left-6 rtl:left-auto rtl:-right-6 w-24 h-24 border-b border-l rtl:border-l-0 rtl:border-r border-cyan-300/50 pointer-events-none z-0"></div>

                <div class="bg-[#111216]/90 backdrop-blur-md border border-white/5 p-8 md:p-12 relative z-10 shadow-2xl">

                    <form action="{{ route('inquiry.store') }}" method="POST" class="space-y-10">
                        @csrf

                        <div class="relative">
                            <label for="name" class="block w-fit text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white font-mono text-xl md:text-2xl font-black uppercase tracking-widest mb-3">
                                {{ $locale == 'ar' ? 'الاسم' : 'NAME' }}
                            </label>
                            <input type="text" id="name" name="name" required value="{{ old('name') }}" placeholder="{{ $locale == 'ar' ? 'أدخل الاسم أو المسمى...' : 'Enter designation...' }}"
                                class="w-full bg-transparent border-0 border-b border-white/10 text-white font-sans text-base md:text-lg pb-3 focus:ring-0 focus:border-cyan-300 transition-colors placeholder:text-gray-600 outline-none">
                            @error('name') <span class="text-red-500 font-mono text-[10px] mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="relative">
                            <label for="email" class="block w-fit text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white font-mono text-xl md:text-2xl font-black uppercase tracking-widest mb-3">
                                {{ $locale == 'ar' ? 'البريد الإلكتروني' : 'EMAIL' }}
                            </label>
                            <input type="email" id="email" name="email" required value="{{ old('email') }}" placeholder="agent@domain.com"
                                class="w-full bg-transparent border-0 border-b border-white/10 text-white font-sans text-base md:text-lg pb-3 focus:ring-0 focus:border-cyan-300 transition-colors placeholder:text-gray-600 outline-none" dir="ltr">
                            @error('email') <span class="text-red-500 font-mono text-[10px] mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="relative">
                            <label for="phone" class="block w-fit text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white font-mono text-xl md:text-2xl font-black uppercase tracking-widest mb-3">
                                {{ $locale == 'ar' ? 'الهاتف' : 'PHONE' }}
                            </label>
                            <input type="tel" id="phone" name="phone" required value="{{ old('phone') }}" placeholder="+1 (000) 000-0000"
                                class="w-full bg-transparent border-0 border-b border-white/10 text-white font-sans text-base md:text-lg pb-3 focus:ring-0 focus:border-cyan-300 transition-colors placeholder:text-gray-600 outline-none" dir="ltr">
                            @error('phone') <span class="text-red-500 font-mono text-[10px] mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="relative">
                            <label for="request_type" class="block w-fit text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white font-mono text-xl md:text-2xl font-black uppercase tracking-widest mb-3">
                                {{ $locale == 'ar' ? 'نوع الطلب' : 'REQUEST TYPE' }}
                            </label>
                            <div class="relative">
                               <select id="request_type" name="request_type" required
                                    class="w-full bg-transparent border-0 border-b border-white/10 text-white font-sans text-base md:text-lg pb-3 focus:ring-0 focus:border-cyan-300 transition-colors appearance-none outline-none">

                                    <option value="" disabled {{ old('request_type') ? '' : 'selected' }} class="bg-[#111216] text-gray-500">
                                        {{ $locale == 'ar' ? 'حدد الغرض من الاتصال...' : 'Select Intent...' }}
                                    </option>
                                    <option value="book service" class="bg-[#111216] text-white" {{ old('request_type') == 'book service' ? 'selected' : '' }}>{{ $locale == 'ar' ? 'حجز خدمة' : 'Book Service' }}</option>
                                    <option value="book consultant" class="bg-[#111216] text-white" {{ old('request_type') == 'book consultant' ? 'selected' : '' }}>{{ $locale == 'ar' ? 'حجز استشارة' : 'Book Consultant' }}</option>
                                    <option value="ask for speaker" class="bg-[#111216] text-white" {{ old('request_type') == 'ask for speaker' ? 'selected' : '' }}>{{ $locale == 'ar' ? 'طلب متحدث' : 'Ask for Speaker' }}</option>
                                    <option value="attend gathering" class="bg-[#111216] text-white" {{ old('request_type') == 'attend gathering' ? 'selected' : '' }}>{{ $locale == 'ar' ? 'حضور تجمع' : 'Attend Gathering' }}</option>
                                    <option value="be in connection" class="bg-[#111216] text-white" {{ old('request_type') == 'be in connection' ? 'selected' : '' }}>{{ $locale == 'ar' ? 'البقاء على اتصال' : 'Be in Connection' }}</option>
                                    <option value="other" class="bg-[#111216] text-white" {{ old('request_type') == 'other' ? 'selected' : '' }}>{{ $locale == 'ar' ? 'أخرى' : 'Other' }}</option>

                                </select>
                                <div class="absolute inset-y-0 right-0 rtl:right-auto rtl:left-0 flex items-center px-2 pointer-events-none text-gray-400 pb-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                            @error('request_type') <span class="text-red-500 font-mono text-[10px] mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="relative">
                            <label for="message" class="block w-fit text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white font-mono text-xl md:text-2xl font-black uppercase tracking-widest mb-3">
                                {{ $locale == 'ar' ? 'الرسالة' : 'MESSAGE' }}
                            </label>
                            <div class="border border-white/5 bg-[#0A0A0C]/50 p-4">
                                <textarea id="message" name="message" required rows="4" placeholder="{{ $locale == 'ar' ? 'أدخل تفاصيل طلبك هنا...' : 'Input payload data here...' }}"
                                    class="w-full bg-transparent border-0 text-white font-sans text-base md:text-lg focus:ring-0 focus:outline-none placeholder:text-gray-600 resize-none">{{ old('message') }}</textarea>
                            </div>
                            @error('message') <span class="text-red-500 font-mono text-[10px] mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="pt-6">
                            <button type="submit" class="w-full bg-cyan-300 hover:bg-white text-black font-black text-sm md:text-base uppercase tracking-widest py-5 px-6 flex items-center justify-center gap-3 transition-all duration-300 hover:shadow-[0_0_20px_rgba(103,232,249,0.5)]">
                                {{ $locale == 'ar' ? 'بدء الإرسال' : 'INITIATE TRANSMISSION' }}
                                <svg class="w-5 h-5 rtl:scale-x-[-1]" fill="currentColor" viewBox="0 0 24 24"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active{
        -webkit-box-shadow: 0 0 0 30px #111216 inset !important;
        -webkit-text-fill-color: white !important;
        transition: background-color 5000s ease-in-out 0s;
    }
</style>
@endsection
