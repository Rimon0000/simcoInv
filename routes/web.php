<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/category/show', [CategoriesController::class,'categoryShow'])->name('category.show');
Route::get('/category/edit/{id}', [CategoriesController::class,'categoryEdit'])->name('category.edit');
Route::get('/category/status/{id}', [CategoriesController::class,'categoryStatus'])->name('category.status');
Route::get('/category/delete/{id}', [CategoriesController::class,'categoryDelete'])->name('category.delete');



Route::post('/category/add', [CategoriesController::class,'categoryAdd'])->name('category.add');
Route::post('/category/update/{id}', [CategoriesController::class,'categoryUpdate'])->name('category.update');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.pages.index');
})->name('dashboard');
