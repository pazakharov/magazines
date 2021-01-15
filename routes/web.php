<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MagazineController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MagazineController::class, 'index']);
//CRUD для авторов
Route::resource('authors', 'App\Http\Controllers\AuthorController')->name('index','authors');
//CRUD для журналов
Route::resource('magazines', 'App\Http\Controllers\MagazineController');
//Загрузка картинки
Route::post('/upload-image', [ImageController::class, 'upload'])->name('upload');