<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;







Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('tasks.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/index',[homeController::class,'tasks.index'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/home',[homeController::class,'index'])->name('home');

    Route::get('/index',[TaskController::class,'index'])->name('tasks.index');
    Route::get('/create',[TaskController::class,'create'])->name('tasks.create');
    Route::post('/tasks',[TaskController::class,'store'])->name('tasks.store');
    Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::POST('tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

    
    Route::resource('permissions',App\Http\Controllers\PermissionController::class);
    Route::get('permissions/{permissionId}/delete',[PermissionController::class,'destroy']);

    Route::resource('roles',App\Http\Controllers\RoleController::class);
    Route::get('roles/{roleId}/delete',[RoleController::class,'destroy']);

    Route::get('roles/{roleId}/give-permissions',[RoleController::class,'addPermissionsToRole']);
    Route::put('roles/{roleId}/give-permissions',[RoleController::class,'givePermissionsToRole']);

    Route::resource('users',App\Http\Controllers\UserController::class);
    Route::get('users/{userId}/delete',[UserController::class,'destroy']);    

});

require __DIR__.'/auth.php';
