<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/about', function () {
    return view('pages.about');
})->name('about');
Route::get('/services', function () {
    return view('pages.services');
})->name('services');
Route::get('/case-studies', function () {
    return view('pages.case-studies');
})->name('case-studies');
Route::get('/insights', function () {
    return view('pages.insights');
})->name('insights');
Route::get('/media', function () {
    return view('pages.media');
})->name('media');
Route::get('/resources', function () {
    return view('pages.resources');
})->name('resources');
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
