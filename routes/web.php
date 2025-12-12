<?php

use Illuminate\Support\Facades\Route;

// ===== ПУБЛИЧНЫЕ СТРАНИЦЫ =====

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

// Project Documentation (ОТДЕЛЬНАЯ СТРАНИЦА)
Route::get('/about/project-documentation', function () {
    return view('pages.project-documentation');
})->name('project.documentation');

// On the Web (ОТДЕЛЬНАЯ СТРАНИЦА)
Route::get('/about/on-the-web', function () {
    return view('pages.on-the-web');
})->name('on_the_web');

Route::get('/partners', function () {
    return view('pages.partners');
})->name('partners');

Route::get('/events', function () {
    return view('pages.events');
})->name('events');

Route::get('/research', function () {
    return view('pages.research');
})->name('research');

Route::get('/resources', function () {
    return view('pages.resources');
})->name('resources');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/publications', function () {
    return view('pages.publications');
})->name('publications');

Route::get('/partners', function () {
    return view('pages.partners');
})->name('partners');

Route::get('/event-detail', function () {
    return view('pages.event-detail');
})->name('event-detail');


// ===== СМЕНА ЯЗЫКА =====
Route::get('/lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'ru', 'ky', 'de'])) {
        abort(400);
    }

    session(['locale' => $locale]);
    app()->setLocale($locale);

    return redirect()->back();
})->name('lang.switch');
