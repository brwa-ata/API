<?php

namespace App\Http\Controllers\Product;

use App\Category;
use App\Http\Controllers\ApiController;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCategoryController extends ApiController
{

    public  function __construct()
    {
        $this->middleware('client.credentials')->only(['index']);
        $this->middleware('auth:api')->except(['index']);
    }

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
        //$product->categories()->sync([$category->id]);
        $product->categories()->syncWithoutDetaching([$category->id]);

        return $this->showAll($product->categories);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $product_id
     * @param $category_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy($product_id , $category_id)
    {
        /*LAM DELETE KRDNAYA EMA DATAKA NASRYNAWA BALKW RELATIONY NEWAN AW DATAYA NAHELYN
        BAM SHEWAYASH WAKW AWA WAYA KA AW DATAYA SRABETAWA BALAM HESHTAS LANAW TABLEKAMAN BWNY HAYA*/
        $product = Product::findOrFail($product_id);
        $category = Category::findOrFail($category_id);

        if (!$product->categories()->find($category->id)){
            return $this->errorResponse('The specified category is not a category of this prodoct' , 404);
        }

        $product->categories()->detach($category->id);

        return $this->showAll($product->categories);

    }
}
