<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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
route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');

    route::get('/view_catagory',[AdminController::class,'view_catagory']);
});

route::post('/add_catagory',[AdminController::class,'add_catagory']);

route::get('/delete_catagory/{id}',[AdminController::class,'delete_catagory']);

route::get('/view_product',[AdminController::class,'view_product']);

route::post('/add_product',[AdminController::class,'add_product']);

route::get('/show_product',[AdminController::class,'show_product']);

route::get('/delete_product/{id}',[AdminController::class,'delete_product']);

route::get('/update_product/{id}',[AdminController::class,'update_product']);

route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);

route::get('/product_details/{id}',[HomeController::class,'product_details']);

route::post ('/add_cart/{id}',[HomeController::class,'add_cart']);

route::get('/show_cart',[HomeController::class,'show_cart']);

route::get ('/remove_cart/{id}',[HomeController::class,'remove_cart']);

route::get('/cash_order',[HomeController::class,'cash_order']);

route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);

route::post('stripe/{totalprice}',[HomeController::class, 'stripePost'])->name('stripe.post');

route::get('/order',[AdminController::class,'order']);

route::get('/delivered/{id}',[AdminController::class,'delivered']);

route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);

route::get('/send_email/{id}',[AdminController::class,'send_email']);

route::get('/send_user_email/{id}',[AdminController::class,'send_user_email']);

route::get('/searchOrder',[AdminController::class,'searchOrderdata']);

route::get('/customer_details',[AdminController::class,'customer_details']);

route::get('/sale_details',[AdminController::class,'sale_details']);

route::get('/inventory_details',[AdminController::class,'inventory_details']);

route::get('/show_order',[HomeController::class,'show_order']);

route::get ('/cancel_order/{id}',[HomeController::class,'cancel_order']);

route::get('/product_search',[HomeController::class,'product_search']);

route::get('/product',[HomeController::class,'product']);

route::get('/searchproduct',[AdminController::class,'searchProductdata']);

route::get('/searchCustomer',[AdminController::class,'searchCustomerdata']);

route::get('/searchSales',[AdminController::class,'searchSalesdata']);

route::get('/searchInventory',[AdminController::class,'searchInventorydata']);

route::get('/print_product_report/{id}',[AdminController::class,'print_product_report']);

route::get('/print_order_report/{id}',[AdminController::class,'print_order_report']);

// route::get('/print_customer_report/{id}',[AdminController::class,'print_customer_report']);

route::get('/print_sales_report/{id}',[AdminController::class,'print_sales_report']);

route::get('/print_inventory_report/{id}',[AdminController::class,'print_inventory_report']);

route::get('/delete_inventory/{id}',[AdminController::class,'delete_inventory']);

route::get('/update_inventory/{id}',[AdminController::class,'update_inventory']);

Route::get('/add_inventory', function () {return view('admin.add_inventory');});

route::get('/products',[HomeController::class,'product']);

route::get('/search_product',[HomeController::class,'search_product']);











