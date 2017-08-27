<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\ApiController;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product = Product::findOrFail($id);

        $category = $product->categories;

        return $this->showAll($category);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $product_id
     * @param $category_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, $product_id , $category_id)
    {
        $product  = Product::findOrFail($product_id);
        $category  = Product::findOrFail($category_id);

        /* BO KAR KRDN LASAR MANY to MANY RELATION CHAND FINCTIONAKE HAYA
            1 / attach     ,   2 / sync    , 3 / syncWithoutDetaching
            1/ har jare ka run abe danayaky  taza drwst aka w datakan dwbara abnawa
            2/ kate run abe danayaky taza drwst akaw away peshtr ka habwa asretawa wata datay dwbara leraya bwny nyia
            3/ amayan awaya ka AMANAWE chwnka danayaky taza drwst akaw hych karygayiaky lasar awany tr nyia
        */

        //$product->categories()->attach([$category->id]);
        $product->categories()->syncWithoutDetaching([$category->id]);

        return $this->showAll($product->categories);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
