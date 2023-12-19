<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\UserController;

// Rute yang dapat diakses oleh semua orang
Route::get('/', [ProyekController::class, 'Home']);
Route::get('/project', [ProyekController::class, 'indexProject']);
Route::get('/edit-project/{id}', [ProyekController::class, 'editProject']);
Route::get('/about', [ProyekController::class, 'About']);

// Rute untuk menampilkan form posting (hanya dapat diakses jika pengguna sudah login)
Route::middleware(['auth'])->group(function () {
    Route::get('/Prj-add', [ProyekController::class, 'showPostForm']);
    Route::post('/add-profile-picture', [UserController::class, 'addPictureProfile'])->name('profile_update');
    Route::post('/Prj-add', [ProyekController::class, 'store']);
    Route::post('/edit-post', [ProyekController::class, 'edit']);
    Route::get('/delete-post/{id}', [ProyekController::class, 'delete']);
});

// Rute untuk halaman login dan registrasi
Route::get('/login-form', [UserController::class, 'formLogin'])->name('login');
Route::get('/form-regis', [UserController::class, 'formRegis']);

// Rute untuk otentikasi pengguna (login dan registrasi)
Route::post('/login', [UserController::class, 'auth']);
Route::get('/profil', [UserController::class, 'Profile']);
Route::post('/registrasi-action', [UserController::class, 'register']);
Route::get('/logout-user', [UserController::class, 'logout']);

// Route::post('/like/{$postID}', [ProyekController::class, 'like'])->name('post.like');
// Route::get('/like/{$postID}', [ProyekController::class, 'like']);
