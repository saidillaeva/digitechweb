<?php

use Illuminate\Support\Facades\Route;

// Главная страница
Route::get('/', function () {
    return view('pages.home');
});

// Партнёры
Route::get('/partners', function () {
    return view('pages.partners');
});

// События
Route::get('/events', function () {
    return view('pages.events');
});

// Исследования
Route::get('/research', function () {
    return view('pages.research');
});

// Ресурсы
Route::get('/resources', function () {
    return view('pages.resources');
});

// Контакты
Route::get('/contact', function () {
    return view('pages.contact');
});


// ----------------------
// Маршруты админки
// ----------------------
Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/publications', function () {
    return view('pages.publications');
});

Route::get('/webinars', function () {
    return view('pages.webinars');
});

