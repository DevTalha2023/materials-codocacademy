<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\WebinarController;

Route::middleware([
    'auth',
    'verified',
    'role:Admin'
])->group(function () {

    Route::resource('webinars', WebinarController::class);
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });

});

