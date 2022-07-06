<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\OrderController;


Route::get('/thankyou', function () {
     return view('frontend.services.thankyou');
});

 
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('profile',[ProfileController::class,'profile'])->name('user.profile');
    Route::post('profile/update',[ProfileController::class,'updateProfile'])->name('profile.update');
    Route::get('myorders',[OrderController::class,'index'])->name('user.order');
    Route::get('/service/checkout/{id}', [OrderController::class, 'checkout']);
    Route::post('/service/checkout',[OrderController::class, 'checkout_save'])->name('submit.service');
    

    
 
});

//Admin Routes here

Route::group(['middleware' => ['auth','admin'],'prefix' => 'admin'], function () {
  Route::get('dashboard', [ServiceController::class, 'dashboard'])->name('admin.dashboard');
  Route::get('service/orders',[ServiceController::class, 'service_orders'])->name('service.orders');
  Route::resources([
    'service' => ServiceController::class, //Service
  ]);
});






require __DIR__ . '/auth.php';
