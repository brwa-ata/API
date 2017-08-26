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

/*  buyerTransaction Route  */
Route::resource('buyer.transaction' , 'Buyer\BuyerTransactionController' , [ 'only'  => [ 'index']  ]);

/*  buyerProduct Route  */
Route::resource('buyer.product' , 'Buyer\BuyerProductController' , [ 'only'  => [ 'index']  ]);

/*  buyerSeller Route  */
Route::resource('buyer.seller' , 'Buyer\BuyerSellerController' , [ 'only'  => [ 'index']  ]);

/*  buyerCategory Route  */
Route::resource('buyer.category' , 'Buyer\BuyerCategoryController' , [ 'only'  => [ 'index']  ]);

/*  seller Route  */
Route::resource('sellers' , 'Seller\SellerController' , [ 'only'  => [ 'index' ,  'show']  ]);


/*  category Route  */
Route::resource('categories' , 'Category\CategoryController' , [ 'except'  => [ 'create' ,  'edit']  ]);

/*  categoryProduct Route  */
Route::resource('category.product' , 'Category\CategoryProductController' ,[ 'only'  => [ 'index']  ]);

/*  categorySeller Route  */
Route::resource('category.seller' , 'Category\CategorySellerController' , [ 'only'  => [ 'index']   ]);

/*  categoryTransaction Route  */
Route::resource('category.transaction' , 'Category\CategoryTransactionController' ,[ 'only'  => [ 'index']  ]);

/*  categoryBuyer Route  */
Route::resource('category.buyer' , 'Category\CategoryBuyerController' ,  [ 'only'  => [ 'index']  ]  );


/*  user Route  */
Route::resource('users' , 'User\UserController' , [ 'except'  => [ 'create' ,  'edit']  ]);

/*  transaction Route  */
Route::resource('transactions' , 'Transaction\TransactionController' , [ 'only'  => [ 'index' ,  'show']  ]);

/*  transactionCategory Route  */
Route::resource('transaction.category' , 'TransactionCategory\TransactionCategoryController' , [ 'only'  => [ 'index']  ]);

/*  transactionCategory Route  */
Route::resource('transaction.seller' , 'TransactionSeller\TransactionSellerController' , [ 'only'  => [ 'index']  ]);

/*  product Route  */
Route::resource('products' , 'Product\ProductController' , [ 'only'  => [ 'index' ,  'show']  ]);