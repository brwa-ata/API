<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiController;
use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerCategoryController extends ApiController
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
        $seller = Seller::findOrFail($id);

        $category = $seller->products()
                                        ->whereHas('categories')
                                        ->with('categories')
                                        ->get()
                                        ->pluck('categories')
                                        ->collapse();

        return $this->showAll($category);

    }

}
