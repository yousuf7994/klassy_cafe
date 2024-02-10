<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\ChefController;
use App\Http\Controllers\Backend\LunchController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\DinnerController;
use App\Http\Controllers\Backend\BreakfastController;
use App\Http\Controllers\Backend\InventoryController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\Backend\Cake_PastryController;
use App\Http\Controllers\Backend\ReservationController;
use App\Http\Controllers\Backend\ShippingChargeController;

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

/* Route::get('/', function () {
    return view('frontend.index');
}); */

Route::controller(HomeController::class)->name('frontend.')->group(function () {

    Route::get('/', 'index')->name('index');
    Route::get('/chefs', 'chef')->name('chef');
    Route::get('/menu', 'menu')->name('menu');
    Route::get('/about-us', 'about')->name('about');
    Route::get('/contact-us', 'contact')->name('contact');
    Route::post('/contactStore', 'contactStore')->name('contactStore');
});


Route::middleware('auth', 'verified')->group(
    function () {
        Route::get('/home', [HomeController::class, 'home'])->name('home');

        Route::controller(ChefController::class)->name('backend.chef.')->group(function () {
            Route::get('/chef', 'index')->name('index');
            Route::get('/chef/create', 'create')->name('create');
            Route::post('/chef/store', 'store')->name('store');
            Route::get('/chef/edit/{chef}', 'edit')->name('edit');
            Route::post('/chef/update/{chef}', 'update')->name('update');
            Route::get('/chef/destroy/{chef}', 'destroy')->name('trash');
            Route::get('/chef/status/{chef}', 'status')->name('status');
            Route::get('/chef/reStore/{id}', 'reStore')->name('reStore');
            Route::get('/chef/permDelete/{id}', 'permDelete')->name('delete');
        });
        Route::controller(BreakfastController::class)->name('backend.breakfast.')->group(
            function () {
                Route::get('/breakfast', 'index')->name('index');
                Route::get('/breakfast/create', 'create')->name('create');
                Route::post('/breakfast/store', 'store')->name('store');
                Route::get('/breakfast/edit/{breakfast}', 'edit')->name('edit');
                Route::post('/breakfast/update/{breakfast}', 'update')->name('update');
                Route::get('/breakfast/destroy/{breakfast}', 'destroy')->name('trash');
                Route::get('/breakfast/status/{breakfast}', 'status')->name('status');
                Route::get('/breakfast/reStore/{id}', 'reStore')->name('reStore');
                Route::get('/breakfast/permDelete/{id}', 'permDelete')->name('permDelete');
            }
        );
        Route::controller(LunchController::class)->name('backend.lunch.')->group(
            function () {
                Route::get('/lunch', 'index')->name('index');
                Route::get('/lunch/create', 'create')->name('create');
                Route::post('/lunch/store', 'store')->name('store');
                Route::get('/lunch/edit/{lunch}', 'edit')->name('edit');
                Route::post('/lunch/update/{lunch}', 'update')->name('update');
                Route::get('/lunch/destroy/{lunch}', 'destroy')->name('trash');
                Route::get('/lunch/status/{lunch}', 'status')->name('status');
                Route::get('/lunch/reStore/{id}', 'reStore')->name('reStore');
                Route::get('/lunch/permDelete/{id}', 'permDelete')->name('permDelete');
            }
        );
        Route::controller(DinnerController::class)->name('backend.dinner.')->group(
            function () {
                Route::get('/dinner', 'index')->name('index');
                Route::get('/dinner/create', 'create')->name('create');
                Route::post('/dinner/store', 'store')->name('store');
                Route::get('/dinner/edit/{dinner}', 'edit')->name('edit');
                Route::post('/dinner/update/{dinner}', 'update')->name('update');
                Route::get('/dinner/destroy/{dinner}', 'destroy')->name('trash');
                Route::get('/dinner/status/{dinner}', 'status')->name('status');
                Route::get('/dinner/reStore/{id}', 'reStore')->name('reStore');
                Route::get('/dinner/permDelete/{id}', 'permDelete')->name('permDelete');
            }
        );

        Route::controller(Cake_PastryController::class)->name('backend.cake_pastry.')->group(
            function () {
                Route::get('/cake_pastry', 'index')->name('index');
                Route::get('/cake_pastry/create', 'create')->name('create');
                Route::post('/cake_pastry/store', 'store')->name('store');
                Route::get('/cake_pastry/edit/{cake_Pastry}', 'edit')->name('edit');
                Route::post('/cake_pastry/update/{cake_Pastry}', 'update')->name('update');
                Route::get('/cake_pastry/destroy/{cake_Pastry}', 'destroy')->name('trash');
                Route::get('/cake_pastry/status/{cake_Pastry}', 'status')->name('status');
                Route::get('/cake/reStore/{id}', 'reStore')->name('reStore');
                Route::get('/cake_pastry/permDelete/{id}', 'permDelete')->name('permDelete');
            }
        );
        Route::controller(ReservationController::class)->name('backend.reservation.')->group(
            function () {
                Route::get('/reservation', 'index')->name('index');
                Route::get('/reservation/create', 'create')->name('create');
                Route::post('/reservation/store', 'store')->name('store');
                Route::get('/reservation/edit/{reservation}', 'edit')->name('edit');
                Route::post('/reservation/update/{reservation}', 'update')->name('update');
                Route::get('/reservation/destroy/{reservation}', 'destroy')->name('cancel');
                Route::get('/reservation/status/{reservation}', 'status')->name('status');
                Route::get('/reservation/reStore/{id}', 'reStore')->name('reStore');
                Route::get('/reservation/delete/{id}', 'delete')->name('delete');
                Route::get('/reservation/myreservation', 'myreservation')->name('myreservation');
            }
        );
        Route::controller(CartController::class)->name('frontend.cart.')->group(
            function () {
                Route::get('/cart', 'index')->name('index');
                Route::get('/cart/create', 'create')->name('create');
                Route::post('/cart/store/{category}/{id}', 'store')->name('store');
                Route::get('/cart/edit/{cart}', 'edit')->name('edit');
                Route::post('/cart/update', 'update')->name('update');
                Route::get('/cart/destroy/{cart}', 'destroy')->name('delete');
                Route::get('/cart/status/{cart}', 'status')->name('status');
                Route::get('/cart/reStore/{id}', 'reStore')->name('reStore');
                Route::get('/cart/delete/{id}', 'delete')->name('pdelete');
                Route::get('/cart/checkout', 'checkout')->name('checkout');
            }
        );
        Route::controller(CouponController::class)->name('backend.coupon.')->group(
            function () {
                Route::get('/coupon', 'index')->name('index');
                Route::get('/coupon/create', 'create')->name('create');
                Route::post('/coupon/store', 'store')->name('store');
                Route::get('/coupon/edit/{coupon}', 'edit')->name('edit');
                Route::post('/coupon/update/{coupon}', 'update')->name('update');
                Route::get('/coupon/destroy/{coupon}', 'destroy')->name('delete');
                Route::post('/coupon/applyCoupon', 'applyCoupon')->name('applyCoupon');
                Route::get('/coupon/reStore/{id}', 'reStore')->name('reStore');
                Route::get('/coupon/delete/{id}', 'delete')->name('pdelete');
            }
        );
        Route::controller(ShippingChargeController::class)->name('backend.shippingcharge.')->group(
            function () {
                Route::get('/shippingcharge', 'index')->name('index');
                Route::get('/shippingcharge/create', 'create')->name('create');
                Route::post('/shippingcharge/store', 'store')->name('store');
                Route::get('/shippingcharge/edit/{shippingcharge}', 'edit')->name('edit');
                Route::post('/shippingcharge/update/{shippingcharge}', 'update')->name('update');
                Route::get('/shippingcharge/destroy/{shippingcharge}', 'destroy')->name('delete');
                Route::post('/shippingcharge/applyCharge', 'applyCharge')->name('applyCharge');
                Route::get('/shippingcharge/reStore/{id}', 'reStore')->name('reStore');
                Route::get('/shippingcharge/delete/{id}', 'delete')->name('pdelete');
            }
        );
    }
);

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
//Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END




Auth::routes(['verify' => true]);
