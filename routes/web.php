<?php

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PriviligesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\VendorCategoryController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\WareTypeController;
use Illuminate\Support\Facades\Cookie;
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


Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [Dashboard::class, 'index']);

    Route::prefix('common_action/')->group(function () {
        Route::post('change_status', [CommonController::class, 'change_status']);
    });

    Route::prefix('staff/')->group(function () {
        Route::get('', [StaffController::class, 'index']);
        Route::get('list', [StaffController::class, 'list']);
        Route::post('add', [StaffController::class, 'add']);
        Route::post('edit', [StaffController::class, 'edit']);
        Route::post('change_pass', [StaffController::class, 'change_pass']);
        Route::post('update_pass', [StaffController::class, 'update_pass']);
        Route::post('update', [StaffController::class, 'update']);
        Route::post('side', [StaffController::class, 'side']);
        
    });

    Route::prefix('role/')->group(function () {
        Route::get('', [RoleController::class, 'index']);
        Route::get('list', [RoleController::class, 'list']);
        Route::post('add', [RoleController::class, 'add']);
        Route::post('edit', [RoleController::class, 'edit']);
        Route::post('update', [RoleController::class, 'update']);
        
    });

    Route::prefix('vendor_category/')->group(function () {
        Route::get('', [VendorCategoryController::class, 'index']);
        Route::get('list', [VendorCategoryController::class, 'list']);
        Route::post('add', [VendorCategoryController::class, 'add']);
        Route::post('edit', [VendorCategoryController::class, 'edit']);
        Route::post('update', [VendorCategoryController::class, 'update']);
        
    });

    Route::prefix('vendors/')->group(function () {
        Route::get('', [VendorController::class, 'index']);
        Route::get('add_form', [VendorController::class, 'add_form']);
        Route::get('list', [VendorController::class, 'list']);
        Route::post('get_city', [VendorController::class, 'get_city']);
        Route::post('add', [VendorController::class, 'add']);
        Route::post('edit', [VendorController::class, 'edit']);
        Route::get('view_details', [VendorController::class, 'view_details']);
        Route::post('update', [VendorController::class, 'update']);
        
    });

    Route::prefix('priviliges/')->group(function () {
        Route::get('{id}', [PriviligesController::class, 'index']);
    });

    

    Route::prefix('warehouse_management/')->group(function () {
        Route::get('', [WarehouseController::class, 'index']);
        Route::get('list', [WarehouseController::class, 'list']);
        Route::get('add_form', [WarehouseController::class, 'add_form']);
        Route::post('add', [WarehouseController::class, 'add']);
        Route::post('edit', [WarehouseController::class, 'edit']);
        Route::post('update', [WarehouseController::class, 'update']);
        
    });

    Route::prefix('warehouse_type/')->group(function () {
        Route::get('', [WareTypeController::class, 'index']);
        Route::get('list', [WareTypeController::class, 'list']);
        Route::post('add', [WareTypeController::class, 'add']);
        Route::post('edit', [WareTypeController::class, 'edit']);
        Route::post('update', [WareTypeController::class, 'update']);
        
    });

    Route::prefix('social_media/')->group(function () {
        Route::get('', [SocialMediaController::class, 'index']);
        Route::get('list', [SocialMediaController::class, 'list']);
        Route::post('add', [SocialMediaController::class, 'add']);
        Route::post('edit', [SocialMediaController::class, 'edit']);
        Route::post('update', [SocialMediaController::class, 'update']);
        
    });

    Route::prefix('driver/')->group(function () {
        Route::get('', [DriverController::class, 'index']);
        Route::get('list', [DriverController::class, 'list']);
        Route::get('add_form', [DriverController::class, 'add_form']);
        Route::post('add', [DriverController::class, 'add']);
        Route::post('edit', [DriverController::class, 'edit']);
        Route::post('update', [DriverController::class, 'update']);
        
    });

    Route::prefix('products/')->group(function () {
        Route::get('', [ProductController::class, 'index']);
        Route::get('list', [ProductController::class, 'list']);
        Route::get('add_form', [ProductController::class, 'add_form']);
        Route::post('add', [ProductController::class, 'add']);
        Route::post('edit', [ProductController::class, 'edit']);
        Route::post('update', [ProductController::class, 'update']);
        
    });
});

Route::get('/logout', function () {
    Cookie::queue('login_email', '', time() + 60 * 60 * 24 * 100);
    Cookie::queue('login_pass', '', time() + 60 * 60 * 24 * 100);
    session()->flush();
    return redirect('/');
});
