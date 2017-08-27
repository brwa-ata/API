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

/*  sellerTransaction Route  */
Route::resource('seller.transaction' , 'Seller\SellerTransactionController' , [ 'only'  => [ 'index']  ]);

/*  sellerCategory Route  */
Route::resource('seller.category' , 'Seller\SellerCategoryController' , [ 'only'  => [ 'index']  ]);

/*  sellerBuyer Route  */
Route::resource('seller.buyer' , 'Seller\SellerBuyerController' , [ 'only'  => [ 'index']  ]);

/*  sellerProduct Route  */
Route::resource('seller.product' , 'Seller\SellerProductController' , [ 'except' => ['create' , 'show' , 'edit']  ]);



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
Route::name('verify')->get('users/verify/{token}' , 'User\UserController@verify');
Route::name('resend')->get('users/{user}/resend' , 'User\UserController@resend');



/*  transaction Route  */
Route::resource('transactions' , 'Transaction\TransactionController' , [ 'only'  => [ 'index' ,  'show']  ]);

/*  transactionCategory Route  */
Route::resource('transaction.category' , 'TransactionCategory\TransactionCategoryController' , [ 'only'  => [ 'index']  ]);

/*  transactionCategory Route  */
Route::resource('transaction.seller' , 'TransactionSeller\TransactionSellerController' , [ 'only'  => [ 'index']  ]);



/*  product Route  */
Route::resource('products' , 'Product\ProductController' , [ 'only'  => [ 'index' ,  'show']  ]);

/*  productTransaction Route  */
Route::resource('product.transaction' , 'Product\ProductTransactionController' , [ 'only'  => [ 'index' ,  'show']  ]);

/*  productBuyer Route  */
Route::resource('product.buyer' , 'Product\ProductBuyerController' , [ 'only'  => [ 'index' ,  'show']  ]);

/*  productCategory Route  */
Route::resource('product.category' , 'Product\ProductCategoryController' , [ 'except'  => [ 'create' ,  'edit']  ]);

/*  productBuyerTransaction Route  */
Route::resource('product.buyer.transaction' , 'Product\ProductBuyerTransactionController' , [ 'only'  => [ 'store']  ]);
