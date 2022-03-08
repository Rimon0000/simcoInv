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


Route::post('/category/add', [CategoriesController::class,'categoryAdd'])->name('category.add');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.pages.index');
})->name('dashboard');
