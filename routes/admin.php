<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SettingsController;

Route::group([
  'prefix' => LaravelLocalization::setLocale(),
  'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

  Route::group(['namespace'=>'Dashboard',
  'middleware'=>'auth:admin','prefix'=>'admin'],function(){

    Route::get('/logout', [LoginController::class, 'logout'])->name('signout');

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
