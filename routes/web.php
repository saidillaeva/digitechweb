<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DocumentPageController;
use App\Http\Controllers\PartnersPageController;
use App\Http\Controllers\NewsCommentController;

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\UniversityLinkController;
use App\Http\Controllers\Admin\NewsCommentAdminController;

/*
|--------------------------------------------------------------------------
| PUBLIC PAGES
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', fn () => view('pages.about'))->name('about');

Route::get('/about/project-documentation', [DocumentPageController::class, 'index'])
    ->name('project.documentation');

Route::get('/about/on-the-web', fn () => view('pages.on-the-web'))->name('on_the_web');

Route::get('/partners', [PartnersPageController::class, 'index'])->name('partners');
Route::get('/partners/{universityKey}', [PartnersPageController::class, 'show'])->name('partners.show');

Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/events/{slug}', [EventController::class, 'show'])->name('event-detail');

Route::get('/research', fn () => view('pages.research'))->name('research');
Route::get('/resources', fn () => view('pages.resources'))->name('resources');
Route::get('/publications', fn () => view('pages.publications'))->name('publications');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

/*
|--------------------------------------------------------------------------
| NEWS COMMENTS (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::post('/news/{slug}/comment', [NewsCommentController::class, 'store'])
    ->name('news.comment.store');

/*
|--------------------------------------------------------------------------
| LANGUAGE SWITCH
|--------------------------------------------------------------------------
*/
Route::get('/lang/{locale}', function ($locale) {
    if (!in_array($locale, ['ru', 'en', 'ky', 'de'])) {
        abort(404);
    }

    session(['locale' => $locale]);
    app()->setLocale($locale);

    return redirect()->back();
})->name('lang.switch');


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
| ADMIN PANEL (PROTECTED)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->name('admin.')
    ->middleware('admin.auth')   // <-- оставляем ОДИН middleware для админки
    ->group(function () {

        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::resource('news', NewsController::class);
        Route::resource('documents', DocumentController::class);

        Route::get('universities', [UniversityLinkController::class, 'index'])
            ->name('universities.index');

        Route::get('universities/{universityKey}', [UniversityLinkController::class, 'edit'])
            ->name('universities.edit');

        Route::post('universities/{universityKey}/links', [UniversityLinkController::class, 'storeLink'])
            ->name('universities.links.store');

        Route::post('universities/{universityKey}/links/{index}', [UniversityLinkController::class, 'updateLink'])
            ->name('universities.links.update');

        Route::delete('universities/{universityKey}/links/{index}', [UniversityLinkController::class, 'deleteLink'])
            ->name('universities.links.delete');

        // COMMENTS (ADMIN)
        Route::get('/comments', [NewsCommentAdminController::class, 'index'])->name('comments.index');
        Route::post('/comments/{id}/approve', [NewsCommentAdminController::class, 'approve'])->name('comments.approve');
        Route::delete('/comments/{id}', [NewsCommentAdminController::class, 'destroy'])->name('comments.destroy');
    });
