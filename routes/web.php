<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/box', [TaskController::class, 'index'])->name('box');
    Route::post('/box', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/box/{task}', [TaskController::class, 'show'])->name('tasks.show'); 
    Route::delete('/box/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy'); 
    Route::get('/todo-list', [TaskController::class, 'todoList'])->name('todo-list');
    Route::get('/box/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit'); 
    Route::put('/box/{task}', [TaskController::class, 'update'])->name('tasks.update'); 

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('/settings', [SettingsController::class, 'updateProfilePicture'])->name('settings.updateProfilePicture');
    Route::post('/settings/update-name', [SettingsController::class, 'updateName'])->name('settings.updateName');
});


/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/edit-user/{id}', [HomeController::class, 'editUser'])->name('edit-user');
    Route::put('/update-user/{id}', [HomeController::class, 'updateUser'])->name('update-user');
    Route::delete('/delete-user/{id}', [HomeController::class, 'deleteUser'])->name('delete-user');
    Route::get('/manage-accounts', [HomeController::class, 'manageAccounts'])->name('manage-accounts');
});







/*------------------------------------------
--------------------------------------------
All Manager Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
