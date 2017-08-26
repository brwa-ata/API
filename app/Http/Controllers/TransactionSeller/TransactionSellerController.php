<?php

namespace App\Http\Controllers\TransactionSeller;

use App\Http\Controllers\ApiController;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionSellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $transaction = Transaction::findOrFail($id);
        $seller = $transaction->product->seller;

        return $this->showOne($seller);
    }
}
