<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\UniversityLinkController;
use App\Http\Controllers\DocumentPageController;
use App\Http\Controllers\PartnersPageController;


/*
|--------------------------------------------------------------------------
| ПУБЛИЧНЫЕ СТРАНИЦЫ
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])
    ->name('home');



// About
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

// Project Documentation
Route::get(
    '/about/project-documentation',
    [DocumentPageController::class, 'index']
)->name('project.documentation');

// On the Web
Route::get('/about/on-the-web', function () {
    return view('pages.on-the-web');
})->name('on_the_web');

// Partners

// Events list
Route::get('/events', [EventController::class, 'index'])
    ->name('events');

// Event detail (dynamic)
Route::get('/events/{slug}', [EventController::class, 'show'])
    ->name('event-detail');


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

/*
|--------------------------------------------------------------------------
| ADMIN PANEL (protected)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware('admin.auth')
    ->group(function () {

        Route::get('/', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        // ===== NEWS =====
        Route::resource('news', NewsController::class);

        // ===== DOCUMENTS =====
        Route::resource('documents', DocumentController::class);

        Route::get('universities', [UniversityLinkController::class, 'index'])
            ->name('universities.index');

        Route::get('universities/{universityKey}', [UniversityLinkController::class, 'edit'])
            ->name('universities.edit');

        Route::post(
            'universities/{universityKey}/links',
            [UniversityLinkController::class, 'storeLink']
        )->name('universities.links.store');

        Route::post(
            'universities/{universityKey}/links/{index}',
            [UniversityLinkController::class, 'updateLink']
        )->name('universities.links.update');

        Route::delete(
            'universities/{universityKey}/links/{index}',
            [UniversityLinkController::class, 'deleteLink']
        )->name('universities.links.delete');

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

Route::get('/partners', [PartnersPageController::class, 'index'])
    ->name('partners');

Route::get('/partners/{universityKey}', [PartnersPageController::class, 'show'])
    ->name('partners.show');


