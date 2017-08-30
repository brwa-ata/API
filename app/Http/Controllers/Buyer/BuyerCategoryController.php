<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuyerCategoryController extends ApiController
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

       $categories = $buyer->transactions()->with('product.categories')
                                ->get()
                                ->pluck('product.categories')
                                ->collapse()
                                ->unique('id')
                                ->values();

       return $this->showAll($categories);

    }

}
