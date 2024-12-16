<?php

use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDiscountController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Customer\CustomerMainController;
use App\Http\Controllers\Librarian\LibrarianMainController;
use App\Http\Controllers\Librarian\LibrarianProductController;
use App\Http\Controllers\MasterSubCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Librarian\LibrarianStoreController;
use App\Http\Controllers\MasterCategoryController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

Route::get('/', function () {
    return view('welcome');
});


//Admin Routes
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::prefix(prefix: 'admin')->group(function () {
        Route::controller(AdminMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin');
            Route::get('/settings', 'settings')->name('settings');
            Route::get('/manage/users', 'manage_user')->name('admin.manage.user');
            Route::get('/manage/stores', 'manage_stores')->name('admin.manage.store');
            Route::get('/cart/history', 'cart_history')->name('admin.cart.history');
            Route::get('/order/history', 'order_history')->name('admin.order.history');
        });
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/category/create', 'index')->name('category.create');
            Route::get('/category/manage', 'manage')->name('category.manage');
        });
        Route::controller(SubCategoryController::class)->group(function () {
            Route::get('/subcategory/create', 'index')->name('subcategory.create');
            Route::get('/subcategory/manage', 'manage')->name('subcategory.manage');
        });
        Route::controller(ProductController::class)->group(function () {
            Route::get('/product/manage', 'index')->name('product.manage');
            Route::get('/product/review/manage', 'review_manage')->name('product.review.manage');
        });
        Route::controller(ProductAttributeController::class)->group(function () {
            Route::get('/productattribute/create', 'index')->name('productattribute.create');
            Route::get('/productattribute/manage', 'manage')->name('productattribute.manage');
            Route::post('/defaultattribute/create', 'createattribute')->name('attribute.create');
            Route::get('/defaultattribute/{id}', 'show')->name('show.attribute');
            Route::put('/defaultattribute/update/{id}', 'update')->name('update.attribute');
            Route::delete('/defaultattribute/delete/{id}', 'delete')->name('delete.attribute');
        });

        Route::controller(ProductDiscountController::class)->group(function () {
            Route::get('/discount/create', 'index')->name('discount.create');
            Route::get('/discount/manage', 'manage')->name('discount.manage');
        });
        Route::controller(MasterCategoryController::class)->group(function () {
            Route::post('/store/category', 'storecat')->name('store.cat');
            Route::get('/category/{id}', 'show')->name('show.cat');
            Route::put('/category/update/{id}', 'update')->name('update.cat');
            Route::delete('/category/delete/{id}', 'delete')->name('delete.cat');
        });
        Route::controller(MasterSubCategoryController::class)->group(function () {
            Route::post('/store/subcategory', 'storesubcat')->name('store.subcat');
            Route::get('/subcategory/{id}', 'show')->name('show.subcat');
            Route::put('/subcategory/update/{id}', 'update')->name('update.subcat');
            Route::delete('/subcategory/delete/{id}', 'delete')->name('delete.subcat');
        });
    });
});

// Librarian routes
Route::middleware(['auth', 'verified', 'rolemanager:librarian'])->group(function () {
    Route::prefix('librarian')->group(function () {
        Route::controller(LibrarianMainController::class)->group(function () {callback:
            Route::get('/dashboard', 'index')->name('librarian');
            Route::get('/order/history', 'orderhistory')->name('librarian.order.history');

        });
        Route::controller(LibrarianProductController::class)->group(function () {callback:
            Route::get('/product/create', 'index')->name('librarian.product');
            Route::get('/product/manage', 'manage')->name('librarian.product.manage');
            Route::post('/product/store', 'store')->name('librarian.product.store');
            Route::get('/product/{id}', 'show')->name('show.product');
            Route::put('/product/update/{id}', 'update')->name('update.product');
            Route::delete('/product/delete/{id}', 'delete')->name('delete.product');
        });
        Route::controller( LibrarianStoreController::class)->group(function () {callback:
            Route::get('/store/create', 'index')->name('librarian.store');
            Route::get('/store/manage', 'manage')->name('librarian.store.manage');
            Route::post('/store/publish', 'store')->name('create.store');
            Route::get('/store/{id}', 'show')->name('show.store');
            Route::put('/store/update/{id}', 'update')->name('update.store');
            Route::delete('/store/delete/{id}', 'delete')->name('delete.store');
        });
    });
});

Route::middleware(['auth', 'verified', 'rolemanager:customer'])->group(function () {
    Route::prefix('customer')->group(function () {
        Route::controller(CustomerMainController::class)->group(function () {callback:
            Route::get('/dashboard', 'index')->name('dashboard');
            Route::get('/dashboard/search', 'search')->name('search');
            Route::get('/history', 'history')->name('history');
            Route::get('/payment', 'payment')->name('payment');
            Route::get('/dashboard/{id}', 'show')->name('show.dashboard');
            Route::post('/dashboard/rent-book/{id}', 'rentbook')->name('dashboard.rent');
        });
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
