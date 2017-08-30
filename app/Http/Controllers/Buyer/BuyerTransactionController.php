<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuyerTransactionController extends ApiController
{

    /**
     * BuyerCategoryController constructor.
     */
    function __construct()
    {
        parent::__construct();
    }



    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $buyer = Buyer::findOrFail($id);

        $transactions = $buyer->transactions;

        return $this->showAll($transactions);

    }

}
