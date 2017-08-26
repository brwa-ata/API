<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\ApiController;

class BuyerProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $buyer  = Buyer::findOrFail($id);
        $product = $buyer->transactions()->with('product')
                                                            ->get()
                                                            ->pluck('product');

        return $this->showAll($product);

    }

}
