<?php

use App\Livewire\Shopkeeper\Index;
use App\Livewire\User\Index as UserIndex;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::get('index-shopkeeper', Index::class)
    ->middleware(['auth', 'verified'])
    ->name('index-shopkeeper');

Route::get('index-user', UserIndex::class)
    ->middleware(['auth', 'verified'])
    ->name('index-user');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
