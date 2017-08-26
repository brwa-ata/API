<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiController;
use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerTransactionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $seller = Seller::findOrFail($id);

        $transaction = $seller->products()
                                            ->whereHas('transactions')
                                            ->with('transactions')
                                            ->get()
                                            ->pluck('transactions');

        return $this->showAll($transaction);

    }

}
