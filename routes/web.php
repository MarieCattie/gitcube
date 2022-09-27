<?php

use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\ShortcodeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\CommentController;

use App\Models\RepositoryFile;


/**
 * Test routes
 */

 Route::get('/test', function() {
    
 });



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

    Route::name('shortcode.')->group(function() {
        Route::post('/shortcode/create', [ShortcodeController::class, 'store'])->name('create');
    });

});




// Get

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::middleware([Authenticate::class])->group(function() {


    // User

        Route::name('user.')->group(function() {
            Route::get('/profile/settings', [UserController::class, 'settings'])
                ->name('settings');
            Route::get('/profile/logout', [UserController::class, 'logout'])
                ->name('logout');

            Route::get('/profile', [HomeController::class, 'profile'])
                ->name('profile');
            Route::get('/profile/{id}', [HomeController::class, 'profile']);
        });

        



        Route::name('friend.')->group(function() {
            Route::get('/friends', [HomeController::class, 'friends'])->name('index');
        });

        Route::get('/support', [HomeController::class, 'support'])->name('support');

    // End User


    // Repository

        Route::name('repository.')->group(function() {
            Route::get('/repository/create', [RepositoryController::class, 'create'])
                ->name('create');

            Route::get('/repository/all', [RepositoryController::class, 'all'])
                ->name('all');

            Route::get('/repository/all/{id}', [RepositoryController::class, 'all'])
                ->name('all');

            Route::get('/repository/search', [RepositoryController::class, 'searchPage'])
                ->name('search');

            Route::get('/repository/{id}', [RepositoryController::class, 'index'])->name('index');
            Route::get('/repository/{id}/{path}', [RepositoryController::class, 'search'])
                ->where('path', '.*');
        });


    // End Repository
    

    // ShortCode

        Route::name('shortcode.')->group(function() {


            Route::get('/shortcode/faq', [ShortcodeController::class, 'faq'])
                ->name('faq');
            Route::get('/shortcode/all', [ShortcodeController::class, 'all'])
                ->name('all');
            Route::get('/shortcode/create', [ShortcodeController::class, 'create'])
                ->name('create');

            Route::get('/shortcode/{id}', [ShortcodeController::class, 'index'])
                ->name('index');

            
        });

    // End ShortCode

});







