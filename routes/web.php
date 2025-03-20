<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/category');

Route::resource('category', CategoryController::class);
