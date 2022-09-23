<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\cdn\v1x0\MainController;


Route::prefix('short')->group(function() {


    
    // {host}/cdn/short/get/{user}/test.txt
    Route::get('/get/{user}/{filename}', [MainController::class, 'get']);


});