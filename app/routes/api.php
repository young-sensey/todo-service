<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/hello', function (Request $request) {
    return 'hello world';
});

Route::resource('tasks', TaskController::class);
