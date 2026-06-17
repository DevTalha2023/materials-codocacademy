<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\WebinarController;
use App\Http\Controllers\Admin\MaterialController;

Route::middleware([
    'auth',
    'verified',
    'role:Admin'
])->group(function () {

    Route::resource('webinars', WebinarController::class);
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::post('/webinars/{webinar}/materials', [MaterialController::class, 'store'])->name('materials.store');
    Route::get(
        '/test-upload',
        function () {
            return view(
                'admin.test-upload'
            );
        }
    );

});
