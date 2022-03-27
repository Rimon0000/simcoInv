<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExpanseController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\SubSubCategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TNCController;
use App\Http\Controllers\UnitController;
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

##################################################################################################
// Frontend start
###################################################################################################
//contact route
Route::get('/contact/show', [ContactController::class, 'contactShow'])->name('contact.show');
Route::get('/contact/status/{id}', [ContactController::class, 'contactStatus'])->name('contact.status');
Route::get('/contact/delete/{id}', [ContactController::class, 'contactDelete'])->name('contact.delete');


//Subscribe route
Route::get('/subscribe/show', [SubscribeController::class, 'subscribeShow'])->name('subscribe.show');
Route::get('/subscribe/status/{id}', [SubscribeController::class, 'subscribeStatus'])->name('subscribe.status');
Route::get('/subscribe/delete/{id}', [SubscribeController::class, 'subscribeDelete'])->name('subscribe.delete');


//About route
Route::prefix('about')->group(function () {
    Route::get('/show', [AboutController::class, 'aboutShow'])->name('about.show');

    Route::post('/edit/{id}', [AboutController::class, 'aboutEdit'])->name('about.edit');
    Route::post('/add', [AboutController::class, 'aboutAdd'])->name('about.add');
});


//Address route
Route::prefix('address')->group(function () {
    Route::get('/show', [AddressController::class, 'addressShow'])->name('address.show');

    Route::post('/edit/{id}', [AddressController::class, 'addressEdit'])->name('address.edit');
    Route::post('/add', [AddressController::class, 'addressAdd'])->name('address.add');
});

//Social route
Route::prefix('social')->group(function () {
    Route::get('/show', [SocialController::class, 'socialShow'])->name('social.show');
    Route::get('/add/page', [SocialController::class, 'socialAddPage'])->name('social.add.page');
    Route::get('/edit/{id}', [SocialController::class, 'socialEdit'])->name('social.edit');
    Route::get('/status/{id}', [SocialController::class, 'socialStatus'])->name('social.status');
    Route::get('/delete/{id}', [SocialController::class, 'socialDelete'])->name('social.delete');
    Route::get('/edit/image/{id}', [SocialController::class, 'socialEditImage'])->name('social.edit.image');

    Route::post('/add', [SocialController::class, 'socialAdd'])->name('social.add');
    Route::post('/update/{id}', [SocialController::class, 'socialUpdate'])->name('social.update');
    Route::post('/image/update/{id}', [SocialController::class, 'socialImageUpdate'])->name('social.image.update');
});

//FAQ route
Route::prefix('faq')->group(function () {
    Route::get('/show', [FaqController::class, 'faqShow'])->name('faq.show');
    Route::get('/add/page', [FaqController::class, 'faqAddPage'])->name('faq.add.page');
    Route::get('/edit/{id}', [FaqController::class, 'faqEdit'])->name('faq.edit');
    Route::get('/delete/{id}', [FaqController::class, 'faqDelete'])->name('faq.delete');

    Route::post('/add', [FaqController::class, 'faqAdd'])->name('faq.add');
    Route::post('/update/{id}', [FaqController::class, 'faqUpdate'])->name('faq.update');
});

//TNC route
Route::prefix('tnc')->group(function () {
    Route::get('/show', [TNCController::class, 'tncShow'])->name('tnc.show');

    Route::post('/edit/{id}', [TNCController::class, 'tncEdit'])->name('tnc.edit');
    Route::post('/add', [TNCController::class, 'tncAdd'])->name('tnc.add');
});

//Policy route
Route::prefix('policy')->group(function () {
    Route::get('/show', [PolicyController::class, 'policyShow'])->name('policy.show');

    Route::post('/edit/{id}', [PolicyController::class, 'policyEdit'])->name('policy.edit');
    Route::post('/add', [PolicyController::class, 'policyAdd'])->name('policy.add');
});



##################################################################################################
// Frontend end
###################################################################################################




// Expanse Type Routes
Route::prefix('expanse/type')->group(function () {
    Route::get('/show', [ExpanseController::class, 'expanseShow'])->name('expanse.show');
    Route::get('/add/page', [ExpanseController::class, 'expanseAddPage'])->name('expanse.add.page');
    Route::get('/edit/{id}', [ExpanseController::class, 'expanseEdit'])->name('expanse.edit');
    Route::get('/status/{id}', [ExpanseController::class, 'expanseStatus'])->name('expanse.status');
    Route::get('/delete/{id}', [ExpanseController::class, 'expanseDelete'])->name('expanse.delete');
    
    Route::post('/add', [ExpanseController::class, 'expanseAdd'])->name('expanse.add');
    Route::post('/update/{id}', [ExpanseController::class, 'expanseUpdate'])->name('expanse.update');
});

// Expanse Detail Routes
Route::prefix('expanse/detail')->group(function () {
    Route::get('/show', [ExpanseController::class, 'expanseDetailShow'])->name('expanse.detail.show');
    Route::get('/add/page', [ExpanseController::class, 'expanseDetailAddPage'])->name('expanse.detail.add.page');
    Route::get('/edit/{id}', [ExpanseController::class, 'expanseDetailEdit'])->name('expanse.detail.edit');
    Route::get('/delete/{id}', [ExpanseController::class, 'expanseDetailDelete'])->name('expanse.detail.delete');
    
    Route::post('/add', [ExpanseController::class, 'expanseDetailAdd'])->name('expanse.detail.add');
    Route::post('/update/{id}', [ExpanseController::class, 'expanseDetailUpdate'])->name('expanse.detail.update');
});


//category route
Route::get('/category/show', [CategoriesController::class, 'categoryShow'])->name('category.show');
Route::get('/category/add/page', [CategoriesController::class, 'categoryAddPage'])->name('category.add.page');
Route::get('/category/edit/{id}', [CategoriesController::class, 'categoryEdit'])->name('category.edit');
Route::get('/category/edit/image/{id}', [CategoriesController::class, 'categoryEditImage'])->name('category.edit.image');
Route::get('/category/status/{id}', [CategoriesController::class, 'categoryStatus'])->name('category.status');
Route::get('/category/delete/{id}', [CategoriesController::class, 'categoryDelete'])->name('category.delete');

Route::post('/category/add', [CategoriesController::class, 'categoryAdd'])->name('category.add');
Route::post('/category/update/{id}', [CategoriesController::class, 'categoryUpdate'])->name('category.update');
Route::post('/category/image/update/{id}', [CategoriesController::class, 'categoryImageUpdate'])->name('category.image.update');


//sub-category route
Route::get('/subcategory/show', [SubCategoriesController::class, 'subCategoryShow'])->name('subcategory.show');
Route::get('/subcategory/add/page', [SubCategoriesController::class, 'subCategoryAddPage'])->name('subcategory.add.page');
Route::get('/subcategory/edit/{id}', [SubCategoriesController::class, 'subCategoryEdit'])->name('subcategory.edit');
Route::get('/subcategory/edit/image/{id}', [SubCategoriesController::class, 'subCategoryEditImage'])->name('subcategory.edit.image');
Route::get('/subcategory/status/{id}', [SubCategoriesController::class, 'subCategoryStatus'])->name('subcategory.status');
Route::get('/subcategory/delete/{id}', [SubCategoriesController::class, 'subCategoryDelete'])->name('subcategory.delete');

Route::post('/subcategory/add', [SubCategoriesController::class, 'subCategoryAdd'])->name('subcategory.add');
Route::post('/subcategory/update/{id}', [SubCategoriesController::class, 'subCategoryUpdate'])->name('subcategory.update');
Route::post('/subcategory/image/update/{id}', [SubCategoriesController::class, 'subCategoryImageUpdate'])->name('subcategory.image.update');


//sub-sub-category route
Route::get('/subsubcategory/show', [SubSubCategoryController::class, 'subSubCategoryShow'])->name('subsubcategory.show');
Route::get('/subsubcategory/add/page', [SubSubCategoryController::class, 'subSubCategoryAddPage'])->name('subsubcategory.add.page');
Route::get('/subsubcategory/edit/{id}', [SubSubCategoryController::class, 'subSubCategoryEdit'])->name('subsubcategory.edit');
Route::get('/subsubcategory/edit/image/{id}', [SubSubCategoryController::class, 'subSubCategoryEditImage'])->name('subsubcategory.edit.image');
Route::get('/subsubcategory/status/{id}', [SubSubCategoryController::class, 'subSubCategoryStatus'])->name('subsubcategory.status');
Route::get('/subsubcategory/delete/{id}', [SubSubCategoryController::class, 'subSubCategoryDelete'])->name('subsubcategory.delete');

Route::post('/subsubcategory/add', [SubSubCategoryController::class, 'subSubCategoryAdd'])->name('subsubcategory.add');
Route::post('/subsubcategory/update/{id}', [SubSubCategoryController::class, 'subSubCategoryUpdate'])->name('subsubcategory.update');
Route::post('/subsubcategory/image/update/{id}', [SubSubCategoryController::class, 'subSubCategoryImageUpdate'])->name('subsubcategory.image.update');


//Supplier route
Route::prefix('supplier')->group(function () {
    Route::get('/show', [SupplierController::class, 'supplierShow'])->name('supplier.show');
    Route::get('/add/page', [SupplierController::class, 'supplierAddPage'])->name('supplier.add.page');
    Route::get('/edit/{id}', [SupplierController::class, 'supplierEdit'])->name('supplier.edit');
    Route::get('/edit/image/{id}', [SupplierController::class, 'supplierEditImage'])->name('supplier.edit.image');
    Route::get('/status/{id}', [SupplierController::class, 'supplierStatus'])->name('supplier.status');
    Route::get('/delete/{id}', [SupplierController::class, 'categoryDelete'])->name('supplier.delete');

    Route::post('/add', [SupplierController::class, 'supplierAdd'])->name('supplier.add');
    Route::post('/update/{id}', [SupplierController::class, 'supplierUpdate'])->name('supplier.update');
    Route::post('/image/update/{id}', [SupplierController::class, 'supplierImageUpdate'])->name('supplier.image.update');
});


//Customer route
Route::prefix('customer')->group(function () {
    Route::get('/show', [CustomerController::class, 'customerShow'])->name('customer.show');
    Route::get('/add/page', [CustomerController::class, 'customerAddPage'])->name('customer.add.page');
    Route::get('/edit/{id}', [CustomerController::class, 'customerEdit'])->name('customer.edit');
    Route::get('/edit/image/{id}', [CustomerController::class, 'customerEditImage'])->name('customer.edit.image');
    Route::get('/status/{id}', [CustomerController::class, 'customerStatus'])->name('customer.status');
    Route::get('/delete/{id}', [CustomerController::class, 'customerDelete'])->name('customer.delete');

    Route::post('/add', [CustomerController::class, 'customerAdd'])->name('customer.add');
    Route::post('/update/{id}', [CustomerController::class, 'customerUpdate'])->name('customer.update');
    Route::post('/image/update/{id}', [CustomerController::class, 'customerImageUpdate'])->name('customer.image.update');
});

//Order route
Route::prefix('order')->group(function () {
    Route::get('/show', [OrderController::class, 'orderShow'])->name('order.show');
    Route::get('/add/page', [OrderController::class, 'orderAddPage'])->name('order.add.page');
    Route::get('/edit/{id}', [OrderController::class, 'orderEdit'])->name('order.edit');
    Route::get('/edit/image/{id}', [OrderController::class, 'orderEditImage'])->name('order.edit.image');
    Route::get('/status/{id}', [OrderController::class, 'orderStatus'])->name('order.status');
    Route::get('/delete/{id}', [OrderController::class, 'orderDelete'])->name('order.delete');

    Route::post('/add', [OrderController::class, 'orderAdd'])->name('order.add');
    Route::post('/update/{id}', [OrderController::class, 'orderUpdate'])->name('order.update');
    Route::post('/image/update/{id}', [OrderController::class, 'orderImageUpdate'])->name('order.image.update');
});

//Brand route
Route::prefix('brand')->group(function () {
    Route::get('/show', [BrandController::class, 'brandShow'])->name('brand.show');
    Route::get('/add/page', [BrandController::class, 'brandAddPage'])->name('brand.add.page');
    Route::get('/edit/{id}', [BrandController::class, 'brandEdit'])->name('brand.edit');
    Route::get('/edit/image/{id}', [BrandController::class, 'brandEditImage'])->name('brand.edit.image');
    Route::get('/status/{id}', [BrandController::class, 'brandStatus'])->name('brand.status');
    Route::get('/delete/{id}', [BrandController::class, 'brandDelete'])->name('brand.delete');

    Route::post('/add', [BrandController::class, 'brandAdd'])->name('brand.add');
    Route::post('/update/{id}', [BrandController::class, 'brandUpdate'])->name('brand.update');
    Route::post('/image/update/{id}', [BrandController::class, 'brandImageUpdate'])->name('brand.image.update');
});

//Unit route
Route::prefix('unit')->group(function () {
    Route::get('/show', [UnitController::class, 'unitShow'])->name('unit.show');
    Route::get('/add/page', [UnitController::class, 'unitAddPage'])->name('unit.add.page');
    Route::get('/edit/{id}', [UnitController::class, 'unitEdit'])->name('unit.edit');
    Route::get('/edit/image/{id}', [UnitController::class, 'unitEditImage'])->name('unit.edit.image');
    Route::get('/status/{id}', [UnitController::class, 'unitStatus'])->name('unit.status');
    Route::get('/delete/{id}', [UnitController::class, 'unitDelete'])->name('unit.delete');

    Route::post('/add', [UnitController::class, 'unitAdd'])->name('unit.add');
    Route::post('/update/{id}', [UnitController::class, 'unitUpdate'])->name('unit.update');
    Route::post('/image/update/{id}', [UnitController::class, 'unitImageUpdate'])->name('unit.image.update');
});

//Product route
Route::prefix('product')->group(function () {
    Route::get('/show', [ProductController::class, 'productShow'])->name('product.show');
    Route::get('/add/page', [ProductController::class, 'productAddPage'])->name('product.add.page');
    Route::get('/edit/{id}', [ProductController::class, 'productEdit'])->name('product.edit');
    Route::get('/edit/image/{id}', [ProductController::class, 'productEditImage'])->name('product.edit.image');
    Route::get('/status/{id}', [ProductController::class, 'productStatus'])->name('product.status');
    Route::get('/delete/{id}', [ProductController::class, 'productDelete'])->name('product.delete');

    Route::post('/add', [ProductController::class, 'productAdd'])->name('product.add');
    Route::post('/update/{id}', [ProductController::class, 'productUpdate'])->name('product.update');
    Route::post('/image/update/{id}', [ProductController::class, 'productImageUpdate'])->name('product.image.update');
});


//Slider route
Route::prefix('slider')->group(function () {
    Route::get('/show', [SliderController::class, 'sliderShow'])->name('slider.show');
    Route::get('/add/page', [SliderController::class, 'sliderAddPage'])->name('slider.add.page');
    Route::get('/edit/{id}', [SliderController::class, 'sliderEdit'])->name('slider.edit');
    Route::get('/edit/image/{id}', [SliderController::class, 'sliderEditImage'])->name('slider.edit.image');
    Route::get('/status/{id}', [SliderController::class, 'sliderStatus'])->name('slider.status');
    Route::get('/delete/{id}', [SliderController::class, 'sliderDelete'])->name('slider.delete');

    Route::post('/add', [SliderController::class, 'sliderAdd'])->name('slider.add');
    Route::post('/update/{id}', [SliderController::class, 'sliderUpdate'])->name('slider.update');
    Route::post('/image/update/{id}', [SliderController::class, 'sliderImageUpdate'])->name('slider.image.update');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.pages.index');
})->name('dashboard');
