<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorySellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $category = Category::findOrFail($id);

        $seller = $category->products()->with('seller')
                        ->get()
                        ->pluck('seller.name');

        return $this->showAll($seller);

    }

}
