<?php

use App\Http\Controllers\RefreshKanyeQuotesController;
use App\Http\Controllers\RetrieveKanyeQuotesController;
use App\Http\Middleware\ApiAuth;
use Illuminate\Support\Facades\Route;

Route::middleware([ApiAuth::class])
    ->name('kanye.')
    ->prefix('/kanye')
    ->group(function () {
        Route::get('/quotes', RetrieveKanyeQuotesController::class)->name('quotes');
        Route::get('/refresh', RefreshKanyeQuotesController::class)->name('refresh');
    });