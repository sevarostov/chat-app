<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::view('/docs', 'scribe.index')->name('public_docs');

Route::prefix('')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
});

