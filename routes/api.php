<?php

use Illuminate\Http\Request;

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

/*  buyer Route  */
Route::resource('buyers' , 'Buyer\BuyerController' , [ 'only'  => [ 'index' ,  'show']  ]);

/*  seller Route  */
Route::resource('sellers' , 'Seller\SellerController' , [ 'only'  => [ 'index' ,  'show']  ]);

/*  category Route  */
Route::resource('categories' , 'Category\CategoryController' , [ 'except'  => [ 'create' ,  'edit']  ]);

/*  user Route  */
Route::resource('users' , 'User\UserController' , [ 'except'  => [ 'create' ,  'edit']  ]);

/*  transaction Route  */
Route::resource('transactions' , 'Transaction\TransactionController' , [ 'only'  => [ 'index' ,  'show']  ]);

/*  product Route  */
Route::resource('products' , 'Product\ProductController' , [ 'only'  => [ 'index' ,  'show']  ]);