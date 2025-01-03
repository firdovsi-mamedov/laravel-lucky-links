<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\LuckyResultController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes([
    'verify' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('check_link')->group(function () {
    Route::get('/page-a/{token}', [LinkController::class, 'show'])->name('page.a');
    Route::post('/page-a/{token}/generate-new', [LinkController::class, 'generateNew'])->name('link.generateNew');
    Route::post('/page-a/{token}/deactivate', [LinkController::class, 'deactivate'])->name('link.deactivate');

    Route::post('/page-a/{token}/lucky', [LuckyResultController::class, 'imFeelingLucky'])->name('lucky.play');
    // History
    Route::get('/page-a/{token}/history', [LuckyResultController::class, 'history'])->name('lucky.history');
});

Route::redirect('/login', '/register');
