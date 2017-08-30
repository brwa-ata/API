<?php

namespace App\Http\Controllers\TransactionCategory;

use App\Http\Controllers\ApiController;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionCategoryController extends ApiController
{
    /**
     * BuyerCategoryController constructor.
     */
    function __construct()
    {
        $this->middleware('client.credentials')->only(['index']);
    }


    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $transaction = Transaction::findOrFail($id);
        $categories = $transaction->product->categories;

        return $this->showAll($categories);

    }

}
