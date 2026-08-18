<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RolesController;
Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::inertia('dashboard', 'dashboard')->name('dashboard');
        Route::get('roles', [RolesController::class, 'index'])->name('roles');
        Route::get('roles/create', [RolesController::class, 'create'])->name('addRole');
        Route::get('roles/{role}/edit', [RolesController::class, 'edit'])->name('editRole');
        Route::post('roles/create', [RolesController::class, 'store'])->name('storeRole');
        Route::post('roles/{role}/edit', [RolesController::class, 'update'])->name('updateRole');
        Route::delete('roles/delete/{role}', [RolesController::class, 'destroy'])->name('deleteRole');
    });
});

require __DIR__ . '/settings.php';
