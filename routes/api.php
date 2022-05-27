<?php
use App\Http\Controllers\auth\registerController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\userController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\clientController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//gestion des roles
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin', function(){
       echo 'espace admin';
    });
});





/**************************auth*********************/
Route::middleware('auth:sanctum')->group(function (){
    Route::get('/logout','App\Http\Controllers\userController@logout')->name('logout.api');
    Route::get('/user','App\Http\Controllers\userController@userdata')->name('user.api');
});

Route::post('/register','App\Http\Controllers\Auth\registerController@register')->name('register.api');
Route::post('/login','App\Http\Controllers\Auth\loginController@login')->name('login.api');


/**************************Category*********************/
Route::get('categories', [CategoryController::class, 'listCategory']);
Route::get('category/{id}', [CategoryController::class, 'getCategory']);
Route::post('addCategory', [CategoryController::class, 'addCategory']);
Route::put('updateCategory/{id}', [CategoryController::class, 'updateCategory']);
Route::get('deleteCategory/{id}', [CategoryController::class, 'deleteCategory']);

/**************************Product*********************/
Route::get('products', [ProductController::class, 'listProduct']);
Route::get('product/{id}', [ProductController::class, 'getProduct']);
Route::post('addProduct', [ProductController::class, 'addProduct']);
Route::put('updateProduct/{id}', [ProductController::class, 'updateProduct']);
Route::get('deleteProduct/{id}', [ProductController::class, 'deleteProduct']);

/**************************Client*********************/
Route::get('clients', [clientController::class, 'listClient']);
Route::get('client/{id}', [clientController::class, 'getClient']);
Route::post('addClient', [clientController::class, 'addClient']);
Route::put('updateClient/{id}', [clientController::class, 'updateClient']);
Route::get('deleteClient/{id}', [clientController::class, 'deleteClient']);

/**************************Card*********************/
Route::get('cards', [CardController::class, 'listCard']);
Route::get('card/{id}', [CardController::class, 'getCard']);
Route::post('addCard', [CardController::class, 'addCard']);
Route::put('updateCard/{id}', [CardController::class, 'updateCard']);
Route::get('deleteCard/{id}', [CardController::class, 'deleteCard']);

/**************************Order*********************/
Route::get('orders', [OrderController::class, 'listOrder']);
Route::get('order/{id}', [OrderController::class, 'getOrder']);
Route::post('addOrder', [OrderController::class, 'addOrder']);
Route::put('updateOrder/{id}', [OrderController::class, 'updateOrder']);
Route::get('deleteOrder/{id}', [OrderController::class, 'deleteOrder']);

/**************************Payment*********************/
Route::get('payments', [PaymentController::class, 'listPayment']);
Route::get('payment/{id}', [PaymentController::class, 'getPayment']);
Route::post('addPayment', [PaymentController::class, 'addPayment']);
Route::put('updatePayment/{id}', [PaymentController::class, 'updatePayment']);
Route::get('deletePayment/{id}', [PaymentController::class, 'deletePayment']);

/**************************Basket*********************/
Route::get('baskets', [BasketController::class, 'listBasket']);
Route::get('basket/{id}', [BasketController::class, 'getBasket']);
Route::post('addBasket', [BasketController::class, 'addBasket']);
Route::put('updateBasket/{id}', [BasketController::class, 'updateBasket']);
Route::get('deleteBasket/{id}', [BasketController::class, 'deleteBasket']);


