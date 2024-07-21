<?php

use Laracore\LaravelAlgolia\Http\Controllers\AlgoliaController;
use Illuminate\Support\Facades\Route;
 

Route::get('algolia-index', [AlgoliaController::class, 'index'])->name('index');