<?php

use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\ShortcodeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\CommentController;

use App\Models\RepositoryFile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Post

Route::name('post.')->group(function() {



    Route::name('user.')->group(function () {
        Route::post('/profile/create', [UserController::class, 'store'])->name('registration');
        Route::post('/profile/login', [UserController::class, 'login'])->name('login');
    });

    Route::name('repository.')->group(function() {
        Route::post('/repository/create', [RepositoryController::class, 'store'])->name('create');
        Route::name('comment.')->group(function () {
            Route::post('/comment/create', [CommentController::class, 'store'])->name('create');
        });
    });

});




// Get

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::middleware([Authenticate::class])->group(function() {

    Route::name('user.')->group(function() {
        Route::get('/profile/settings', [UserController::class, 'settings'])
            ->name('settings');
        Route::get('/profile/logout', [UserController::class, 'logout'])
            ->name('logout');
    });


    Route::get('/profile', [HomeController::class, 'profile'])
        ->name('profile');
    Route::get('/profile/{id}', [HomeController::class, 'profile']);


    Route::name('repository.')->group(function() {
        Route::get('/repository/create', [RepositoryController::class, 'create'])
            ->name('create');
    });

    Route::get('/repository/{id}', [RepositoryController::class, 'index']);
    Route::get('/repository/{id}/{path}', [RepositoryController::class, 'search'])
        ->where('path', '.*');

    Route::name('shortcode.')->group(function() {

        Route::get('/shortcode/{filename}', [ShortcodeController::class, 'index']);

        Route::get('/shortcode/faq', [ShortcodeController::class, 'faq'])
            ->name('faq');
    });

    Route::name('friend.')->group(function() {
        Route::get('/friends', [HomeController::class, 'friends'])->name('index');
    });

    Route::get('/support', [HomeController::class, 'support'])->name('support');


});

Route::get('/shortcode/cdn/{filename}', [ShortcodeController::class, 'cdn']);
Route::get('/shortcode/download/{filename}', [ShortcodeController::class, 'download']);




