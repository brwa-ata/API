<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiController;
use App\Product;
use App\Seller;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerProductController extends ApiController
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

        $products = $seller->products;

        return $this->showAll($products);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id)
    {
        $seller = User::findOrFail($id);

        $rules = [
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|integer|min:1',
            'image' => 'required|image'
        ];

        $this->validate($request , $rules);

        $data = $request->all();

        $data['status'] = Product::UNAVAILABLE_PRODUCT;
        $data['image'] = '1.jpg';
        $data['seller_id'] = $seller->id;

        $product = Product::create($data);
        return $this->showOne($product);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
