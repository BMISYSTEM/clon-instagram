<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\postcontroller;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerfilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//routing closure
Route::get('/',HomeController::class)->name('home');

//url principales
Route::get('/crear', [RegisterController::class,'crear'])->name('register');
Route::post('/crear', [RegisterController::class,'store'])->name('register');
//rutas para el perfil
Route::get('/editar-perfil',[PerfilController::class,'index'])->name('perfil.index');
Route::post('/editar-perfil',[PerfilController::class,'store'])->name('perfil.store');
//login 
Route::get('/login',[Logincontroller::class,'index'])->name('login');
Route::post('/login',[Logincontroller::class,'store']);
Route::post('/logout',[LogoutController::class,'store'])->name('logout');
//url despues de loguin 
Route::get('/{user:username}',[postcontroller::class,'index'])->name('post.index');
Route::get('/post/create',[postcontroller::class,'create'])->name('post.create');
Route::post('/post',[postcontroller::class,'store'])->name('post.store');
Route::get('/post/{user:username}/{posts}',[postcontroller::class,'show'])->name('post.show');
Route::post('/post/{user:username}/{posts}',[ComentarioController::class,'store'])->name('comentarios.store');
Route::delete('/post/{posts}',[postcontroller::class,'destroy'])->name('post.destroy');
//creacion de publicacion 
Route::post('/image',[ImageController::class,'store'])->name('image.store');

//like a las fotos
Route::post('/posts/{posts}/likes',[LikeController::class,'store'])->name('posts.likes.store');
//eliminar el like
Route::delete('/posts/{posts}/likes',[LikeController::class,'destroy'])->name('posts.likes.destroy');

//siguiendo usuarios
Route::post('/{user:username}/follow',[FollowerController::class,'store'])->name('user.follow');
Route::delete('/{user:username}/unfollow',[FollowerController::class,'destroy'])->name('user.unfollow');

//inicio 
