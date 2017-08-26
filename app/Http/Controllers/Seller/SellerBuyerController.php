<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiController;
use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerBuyerController extends ApiController
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

        $buyers = $seller->products()
                                    ->whereHas('transactions')
                                    ->with('transactions.buyer')
                                    ->get()
                                    ->pluck('transactions')
                                    ->collapse()
                                    ->pluck('buyer')
                                    ->unique('id')
                                    ->values();

        return $this->showAll($buyers);

    }

}
