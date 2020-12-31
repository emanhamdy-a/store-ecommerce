<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\MainCategoriesController;

Route::group([
  'prefix' => LaravelLocalization::setLocale(),
  'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

  Route::group(['namespace'=>'Dashboard',
  'middleware'=>'auth:admin','prefix'=>'admin'],function(){

    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::get('/',[DashboardController::class, 'index'])
    ->name('admin.dashboard');

    Route::group(['prefix'=>'settings'],function(){

      Route::get('/shipping-methods/{type}',
      [SettingsController::class, 'editShippingMethods'])
      ->name('edit.shippings.methods');
      Route::put('/shipping-methods/{type}',
      [SettingsController::class, 'updateShippingMethods'])
      ->name('update.shippings.methods');

    });

    Route::group(['prefix'=>'profile'],function(){

      Route::get('edit',[ProfileController::class, 'editProfile'])
      ->name('edit.profile');

      Route::put('update',[ProfileController::class, 'updateprofile'])
      ->name('update.profile');

    });

    #################### categories routes ####################

    Route::group(['prefix' => 'main_categories'], function () {

      Route::get('/', [MainCategoriesController::class,'index'])
        ->name('admin.maincategories');
      Route::get('create', [MainCategoriesController::class,'create'])
        ->name('admin.maincategories.create');
      Route::post('store', [MainCategoriesController::class,'store'])
        ->name('admin.maincategories.store');
      Route::get('edit/{id}', [MainCategoriesController::class,'edit'])
        ->name('admin.maincategories.edit');
      Route::post('update/{id}', [MainCategoriesController::class,'update'])
        ->name('admin.maincategories.update');
      Route::get('delete/{id}', [MainCategoriesController::class,'destroy'])
        ->name('admin.maincategories.delete');
    });
    ##################### end categories    #####################

  });


  Route::group(['namespace'=>'Dashboard','prefix'=>'admin',
  'middleware'=>'guest:admin'],function(){

    Route::get('/login',[LoginController::class, 'login'])
    ->name('admin.login');

    Route::post('/postlogin',[LoginController::class, 'postlogin'])
    ->name('admin.post.login');

  });

});
// Route::get('/',[HomeController::class,'index']);

// Route::resource('/companies', CompanyController::class);

// Route::get('/companies/enable/{id}',[CompanyController::class, 'enable']);

// Route::get('/companies/disable/{id}',[CompanyController::class, 'disable']);
// Route::get('/companies-search',[CompanyController::class, 'search']);


// Route::resource('/empolyees', EmpolyeeController::class);

// Route::get('/empolyees/enable/{id}',[EmpolyeeController::class, 'enable']);

// Route::get('/empolyees/disable/{id}',[EmpolyeeController::class, 'disable']);
// Route::get('/empolyees-search',[EmpolyeeController::class, 'search']);
