<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\UniversityLinkController;

/*
|--------------------------------------------------------------------------
| ПУБЛИЧНЫЕ СТРАНИЦЫ
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// About
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

// Project Documentation
Route::get('/about/project-documentation', function () {
    return view('pages.project-documentation');
})->name('project.documentation');

// On the Web
Route::get('/about/on-the-web', function () {
    return view('pages.on-the-web');
})->name('on_the_web');

// Partners
Route::get('/partners', function () {
    return view('pages.partners');
})->name('partners');

// Events (ИЗ БД)
Route::get('/events', [EventController::class, 'index'])->name('events');

// Event detail (пока статичная)
Route::get('/event-detail', function () {
    return view('pages.event-detail');
})->name('event-detail');

// Research
Route::get('/research', function () {
    return view('pages.research');
})->name('research');

// Resources
Route::get('/resources', function () {
    return view('pages.resources');
})->name('resources');

// Publications
Route::get('/publications', function () {
    return view('pages.publications');
})->name('publications');

// Contact
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

/*
|--------------------------------------------------------------------------
| ADMIN AUTH
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| ADMIN PANEL (protected)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware('admin.auth')
    ->group(function () {

        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        // CRUD News
        Route::resource('news', NewsController::class);

        // CRUD Documents
        Route::resource('documents', DocumentController::class);

        // University links (config/universities.php)
        Route::get('universities', [UniversityLinkController::class, 'index'])->name('universities.index');
        Route::get('universities/{universityKey}', [UniversityLinkController::class, 'edit'])->name('universities.edit');
        Route::post('universities/{universityKey}', [UniversityLinkController::class, 'update'])->name('universities.update');
    });

/*
|--------------------------------------------------------------------------
| LANGUAGE SWITCH
|--------------------------------------------------------------------------
*/

Route::get('/lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'ru', 'ky', 'de'])) {
        abort(400);
    }

    session(['locale' => $locale]);
    app()->setLocale($locale);

    return redirect()->back();
})->name('lang.switch');
