<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Vendor\VendorProductController;
use App\Http\Controllers\Vendor\StoreController;

use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\AccountController;
use App\Http\Controllers\Customer\OrderController;

use App\Http\Controllers\MasterCategoryController;
use App\Http\Controllers\MasterSubcategoryController;
use App\Http\Controllers\MasterOrderController;
use App\Http\Controllers\MasterReviewsController;





Route::prefix('admin')->name('admin.')->middleware('rolemanager:admin')->group(function() {
    
    Route::controller(AdminController::class)->group(function() {
        Route::get('dashboard', 'index')->name('dashboard');
        Route::get('settings', 'settings')->name('settings');
        Route::get('manage/users', 'manage_user')->name('manage.users');
        Route::get('manage/stores', 'manage_store')->name('manage.stores');
        Route::get('order/active', 'order_active')->name('order.active');
        Route::put('order/update/{id}', 'order_update')->name('order.update');
        Route::get('order/history', 'order_history')->name('order.history');
      
    });
    // end Admin contrller


    Route::prefix('category')->name('category.')->controller(CategoryController::class)->group(function() {
        Route::get('create', 'create_cat')->name('create');
        Route::get('manage', 'manage_cat')->name('manage');
    });
    // end category controller


     Route::prefix('subcategory')->name('subcategory.')->controller(SubCategoryController::class)->group(function() {
        Route::get('create', 'create_subcat')->name('create');
        Route::get('manage', 'manage_subcat')->name('manage');
    });
     // End subcategory controller



      Route::prefix('product')->name('product.')->controller(ProductController::class)->group(function() {
        Route::get('manage', 'manage_product')->name('product');
        Route::get('review/manage', 'manage_product_review')->name('review');
        Route::delete('/delete/{id}', 'product_delete')->name('delete');
        Route::delete('review/delete/{id}', 'review_delete')->name('review.delete');
    });
     // End subcategory controller


      Route::prefix('category')->name('category.')->controller(MasterCategoryController::class)->group(function() {
        Route::post('/store', 'cat_store')->name('store');
        Route::get('/show/{id}', 'cat_show')->name('show');
        Route::put('/update/{id}', 'cat_update')->name('update');
        Route::delete('/delete/{id}', 'cat_delete')->name('delete');
        
    });
     // End Master Category controller

      Route::prefix('subcategory')->name('subcategory.')->controller(MasterSubcategoryController::class)->group(function() {
        Route::post('store', 'subcat_store')->name('store');
        Route::get('/show/{id}', 'subcat_show')->name('show');
        Route::put('/update/{id}', 'subcat_update')->name('update');
        Route::delete('/delete/{id}', 'subcat_delete')->name('delete');
       
        
    });
     // End Master SubCategory controller

});
//End admin









Route::prefix('vendor')->name('vendor.')->middleware('rolemanager:vendor')->group(function() {

    Route::controller(VendorController::class)->group(function() {
        Route::get('dashboard', 'index')->name('dashboard');
        Route::get('order/history', 'order_history')->name('order.history');
        Route::put('order/update/{id}', 'order_update')->name('order.update');

 
    });
    // End MAIN controller

    Route::prefix('product')->name('product.')->controller(VendorProductController::class)->group(function (){
        Route::get('create', 'create_product')->name('create');
        Route::get('manage', 'manage_product')->name('manage');
        Route::post('store', 'store_product')->name('store');
        Route::get('show/{id}', 'show_product')->name('show');
        Route::put('update/{id}', 'update_product')->name('update');
        Route::delete('delete/{id}', 'delete_product')->name('delete');
    });
    // End Product controller

    Route::prefix('store')->name('store.')->controller(StoreController::class)->group(function (){
        Route::get('main', 'main')->name('main');
        Route::get('reviews', 'reviews')->name('reviews');
        Route::post('dbstore', 'dbstore_store')->name('dbstore');
        Route::put('/update', 'update_store')->name('update');
        Route::delete('/delete/{id}', 'delete_store')->name('delete');
    });
    // End Storre Cointroller
});
// End Vendor












Route::prefix('customer')->name('customer.')->middleware('rolemanager:customer')->group(function() {

    Route::controller(CartController::class)->group(function() {
        Route::get('cart', 'index')->name('cart');
        Route::get('payment', 'payment')->name('payment');
    });
    // End cart controller

    Route::controller(AccountController::class)->group(function() {
        Route::get('account', 'account')->name('account');
        Route::put('personal/settings', 'personal_settings')->name('personal.settings');
        Route::put('change/password', 'change_password')->name('change.password');

    });
    // End Account controller


     Route::controller(MasterOrderController::class)->group(function() {
        Route::post('add/order', 'add_order')->name('add.order');
       
    });
    // End cart controller

     Route::controller(OrderController::class)->group(function() {
        Route::put('order/cancel/{id}', 'cancel_order')->name('order.cancel');
        
     });

     Route::controller(MasterReviewsController::class)->group(function() {
        Route::delete('review/delete/{id}', 'review_delete')->name('review.delete');
    });
   
});
// End customer









Route::controller(CustomerController::class)->group(function() {
    
    Route::get('products', 'category')->name('category');
    Route::get('main', 'index')->name('main');
    Route::get('/', 'index')->name('/');
    Route::get('product_view/{id}', 'product_view')->name('product_view');
    Route::get('about', 'about')->name('about');
    Route::get('contact', 'contact')->name('contact');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
