<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('lang/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'ar'])) {
        session()->put('locale', $lang);
    }

    return redirect()->back();
})->name('lang.switch');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/case-studies', [CaseStudyController::class, 'index'])->name('case-studies');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/media', [MediaController::class, 'index'])->name('media');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials');
Route::get('/secure-channel', [InquiryController::class, 'create'])->name('inquiry.create');
Route::post('/secure-channel/submit', [InquiryController::class, 'store'])->name('inquiry.store');
