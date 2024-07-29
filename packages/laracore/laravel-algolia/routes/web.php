<?php

use Laracore\LaravelAlgolia\Http\Controllers\AlgoliaController;
use Illuminate\Support\Facades\Route;
 

Route::get('home', [AlgoliaController::class, 'index'])->name('home');
Route::get('settings', [AlgoliaController::class, 'settings'])->name('settings');