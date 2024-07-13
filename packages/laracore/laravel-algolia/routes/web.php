<?php

use Laracore\LaravelAlgolia\Http\Controllers\AlgoliaController;
use Illuminate\Support\Facades\Route;
 
Route::resource('algolia-index', AlgoliaController::class);