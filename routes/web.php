<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\UniversityLinkController;
use App\Http\Controllers\EventController;

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

// --- ADMIN AUTH (URL only) ---
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

// --- ADMIN PANEL (protected) ---
Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // CRUD News (DB)
    Route::resource('news', NewsController::class);

    // CRUD Documents (DB)
    Route::resource('documents', DocumentController::class);

    // University links (NO DB) — JSON file storage
    Route::get('universities', [UniversityLinkController::class, 'index'])->name('universities.index');
    Route::get('universities/{universityKey}', [UniversityLinkController::class, 'edit'])->name('universities.edit');
    Route::post('universities/{universityKey}', [UniversityLinkController::class, 'update'])->name('universities.update');
});

Route::get('/events', [EventController::class, 'index'])->name('events');

