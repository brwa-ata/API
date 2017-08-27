<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiController;
use App\Product;
use App\Seller;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
        $data['image'] = $request->image->store('');
        $data['seller_id'] = $seller->id;

        $product = Product::create($data);
        return $this->showOne($product);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $seller_id
     * @param $product_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, $seller_id , $product_id)
    {

        $seller = Seller::findOrFail($seller_id);
        $product = Product::findOrFail($product_id);

        $rules = [
            'quantity' => 'integer|min:1',
            'status' => 'in:' . Product::AVAILABLE_PRODUCT . ',' .Product::UNAVAILABLE_PRODUCT,
            'image' => 'image'
        ];

        $this->validate($request , $rules);

        $this->checkSeller($seller->id , $product->id);

        $product->fill($request->intersect([
            'name',
            'description',
            'quantity',
        ]));

        if ($request->has('status')) {
            $product->status = $request->status;

            //if the status for the product is available
            if ($product->isAvailable() && $product->categories()->count() == 0 ) {
                return $this->errorResponse('An active product must have at least one categpry' , 409);
            }
        }

        // ama bo awaya gar kasaka hych shteky tazaay nakrdbw pewyst naka udate bkaynawa
        if ($product->isClean()){
            return $this->errorResponse('You need to specify a defferent value to update' , 422);
        }

        $product->save();

        return $this->showOne($product);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $seller_id
     * @param $product_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy($seller_id , $product_id)
    {

        $seller = Seller::findOrFail($seller_id);
        $product = Product::findOrFail($product_id);


        $this->checkSeller($seller->id , $product->id);

        $product->delete();

        return $this->showOne($product);

    }


    /**
     * @param $seller_id
     * @param $product_id
     */
    protected function checkSeller($seller_id , $product_id)
    {
        $seller = Seller::findOrFail($seller_id);
        $product = Product::findOrFail($product_id);


        if ($seller->id  !=  $product->seller_id) {
            throw new HttpException(422, 'The specified seller is not the actual seller of the product');
        }

    }

}
