<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::resource('banks', App\Http\Controllers\BankController::class);
    Route::resource('documentTypes', App\Http\Controllers\DocumentTypeController::class);
    
    Route::get('driver', [App\Http\Controllers\UserController::class, 'driver'])->name('driver');
    Route::get('mitra', [App\Http\Controllers\UserController::class, 'mitra'])->name('mitra');
    Route::get('users/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::resource('users', App\Http\Controllers\UserController::class);
    
    Route::resource('driver-vehicles', App\Http\Controllers\DriverVehicleController::class);
    
    Route::resource('userDocuments', App\Http\Controllers\UserDocumentController::class);
    
    Route::resource('settingPrices', App\Http\Controllers\SettingPriceController::class);

    Route::resource('payment-methods', App\Http\Controllers\PaymentMethodController::class);

    Route::resource('payment-statuses', App\Http\Controllers\PaymentStatusController::class);

    Route::resource('order-statuses', App\Http\Controllers\OrderStatusController::class);

    Route::post('orders/validate', [App\Http\Controllers\OrderController::class, 'validateOrder'])->name('orders.validate');
    Route::get('orders/download-invoice/{id}', [App\Http\Controllers\OrderController::class, 'downloadInvoice']);
    Route::get('orders/getPrice', [App\Http\Controllers\OrderController::class, 'getPrice'])->name('getPrice');
    Route::get('orders/getLatLong', [App\Http\Controllers\OrderController::class, 'getLatLong'])->name('getLatLong');
    Route::post('orders/uploadProofPayment', [App\Http\Controllers\OrderController::class, 'uploadProofPayment']);
    Route::resource('orders', App\Http\Controllers\OrderController::class);
    
    Route::resource('order-details', App\Http\Controllers\OrderDetailController::class);
    
    Route::get('cms/{tab}', [App\Http\Controllers\SettingController::class, 'content'])->name('cms');
    Route::get('cms/add/{tab}', [App\Http\Controllers\SettingController::class, 'addContent'])->name('cms.create');
    Route::get('cms/{id}/edit', [App\Http\Controllers\SettingController::class, 'editContent'])->name('cms.edit');
    Route::post('cms/store', [App\Http\Controllers\SettingController::class, 'cmsStore'])->name('cms.store');
    Route::patch('cms/{id}', [App\Http\Controllers\SettingController::class, 'cmsUpdate'])->name('cms.update');
    Route::resource('settings', App\Http\Controllers\SettingController::class);

    Route::get('reports/order_export', [App\Http\Controllers\ReportController::class, 'exportOrder']);
    Route::get('reports/reposrt_orders', [App\Http\Controllers\ReportController::class, 'reportOrder']);
    Route::get('reports/users_export', [App\Http\Controllers\ReportController::class, 'exportUser']);
    Route::get('reports/users', [App\Http\Controllers\ReportController::class, 'reportUser']);
    Route::resource('reports', App\Http\Controllers\ReportController::class);

    Route::resource('offerings', App\Http\Controllers\OfferingController::class);

    Route::resource('contacts', App\Http\Controllers\ContactController::class);

    Route::resource('testimonis', App\Http\Controllers\TestimoniController::class);
});


Auth::routes();
