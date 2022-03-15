<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubCategoriesController;
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

//category route
Route::get('/category/show', [CategoriesController::class,'categoryShow'])->name('category.show');
Route::get('/category/add/page', [CategoriesController::class,'categoryAddPage'])->name('category.add.page');
Route::get('/category/edit/{id}', [CategoriesController::class,'categoryEdit'])->name('category.edit');
Route::get('/category/edit/image/{id}', [CategoriesController::class,'categoryEditImage'])->name('category.edit.image');
Route::get('/category/status/{id}', [CategoriesController::class,'categoryStatus'])->name('category.status');
Route::get('/category/delete/{id}', [CategoriesController::class,'categoryDelete'])->name('category.delete');

Route::post('/category/add', [CategoriesController::class,'categoryAdd'])->name('category.add');
Route::post('/category/update/{id}', [CategoriesController::class,'categoryUpdate'])->name('category.update');
Route::post('/category/image/update/{id}', [CategoriesController::class,'categoryImageUpdate'])->name('category.image.update');


//sub category route
Route::get('/subcategory/show', [SubCategoriesController::class,'subCategoryShow'])->name('subcategory.show');
Route::get('/subcategory/add/page', [SubCategoriesController::class,'subCategoryAddPage'])->name('subcategory.add.page');
Route::get('/subcategory/edit/{id}', [SubCategoriesController::class,'subCategoryEdit'])->name('subcategory.edit');
Route::get('/subcategory/edit/image/{id}', [SubCategoriesController::class,'subCategoryEditImage'])->name('subcategory.edit.image');
Route::get('/subcategory/status/{id}', [SubCategoriesController::class,'subCategoryStatus'])->name('subcategory.status');
Route::get('/subcategory/delete/{id}', [SubCategoriesController::class,'subCategoryDelete'])->name('subcategory.delete');

Route::post('/subcategory/add', [SubCategoriesController::class,'subCategoryAdd'])->name('subcategory.add');
Route::post('/subcategory/update/{id}', [SubCategoriesController::class,'subCategoryUpdate'])->name('subcategory.update');
Route::post('/subcategory/image/update/{id}', [SubCategoriesController::class,'subCategoryImageUpdate'])->name('subcategory.image.update');






Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.pages.index');
})->name('dashboard');
