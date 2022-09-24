<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\cdn\v1x0\MainController;


Route::prefix('short')->group(function() {


    
    // {host}/cdn/v1.0/short/view/{filename}
    Route::get('/view/{user}@{titlename}', [MainController::class, 'view']);

    // {host}/cdn/v1.0/short/download/{filename}
    Route::get('/download/{user}@{titlename}', [MainController::class, 'download']);

    Route::get('/{user}@{titlename}', [MainController::class, 'cdn']);

});