<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/admin', function () {
    return view('home');
})->name('admin.home');

Route::get('/login', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/password/request', function () {
    return view('auth.login');
})->name('password.request');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('permissions', function(){
    return view('admin.permissions.show');
})->name('permissions');

Route::get('permissions/index', function(){
    return view('admin.permissions.index');
})->name('admin.permissions.index');

Route::get('permissions /create', function(){
    return view('admin.permissions.create');
})->name('admin.permissions.create');

Route::get('permissions/edit', function(){
    return view('admin.permissions.edit');
})->name('permissions.edit');

Route::post('permissions/store', function(){
   
})->name('admin.permissions.store');

Route::get('roles', function(){
   return view('admin.roles.show');
})->name('admin.roles.show');

Route::get('roles/index', function(){
   return view('admin.roles.index');
})->name('admin.roles.index');

Route::get('roles/edit', function(){
   return view('admin.roles.edit');
})->name('admin.roles.edit');

Route::get('roles/create', function(){
   return view('admin.roles.create');
})->name('admin.roles.create');

Route::post('roles/create', function(){
//    return view('admin.roles.create');
})->name('admin.roles.store');

Route::get('users/index', function(){
   return view('admin.users.index');
})->name('admin.users.index');

