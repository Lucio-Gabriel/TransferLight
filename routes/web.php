<?php

use App\Http\Middleware\CheckIsShopkeeper;
use App\Http\Middleware\CheckIsUser;
use App\Livewire\Shopkeeper\Index;
use App\Livewire\User\Index as UserIndex;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('index-user', UserIndex::class)
        ->middleware(CheckIsUser::class)
        ->name('index-user');

    Route::get('index-shopkeeper', Index::class)
        ->middleware(CheckIsShopkeeper::class)
        ->name('index-shopkeeper');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
