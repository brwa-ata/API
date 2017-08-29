<?php

namespace App\Transformers;

use App\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Product $product
     * @return array
     */
    public function transform(Product $product)
    {
        return [
            //BAM SHEWAYA ATWANYN NAWY COLUMNAKAN BGORYN W LA REGAY AWANAY KA XOMAN DAMANNAWA BOYAN KARYAN LASAR BKAYN
            'identifier' => (int)$product->id,
            'title' => (string)$product->name,
            'details' => (string)$product->description,
            'stock' => (int)$product->quantity,
            'situation' => (string)$product->status,
            'picture' => url("image/{$product->image}"),
            'seller' => (int)$product->seller_id,
            'creationDate' => (string)$product->created_at ,
            'lastChange' => (string)$product->updated_at ,
            'deleteDate' => isset($product->deleted_at) ? (string) $product->deleted_at : null,


            'links' =>
                [
                    [
                        'rel' => 'self',
                        'href' => route('products.show' , $product->id),
                    ],

                    [
                        'rel' => 'product.buyers',
                        'href' => route('product.buyer.index' , $product->id),
                    ],

                    [
                        'rel' => 'product.category',
                        'href' => route('product.category.index' , $product->id),
                    ],

                    [
                        'rel' => 'product.transactions',
                        'href' => route('product.transaction.index' , $product->id),
                    ],

                    [
                        'rel' => 'seller',
                        'href' => route('sellers.show' , $product->seller_id),
                    ],

                ]



        ];
    }


    /**
     * @param $index
     * @return mixed|null
     */
    public  static function originalAttribute($index)
    {
        $attribute =  [
            'identifier' => 'id',
            'title' => 'name',
            'details' => 'description',
            'stock' => 'quantity',
            'situation' => 'status',
            'picture' => 'image',
            'seller' => 'seller_id',
            'creationDate' => 'created_at' ,
            'lastChange' => 'updated_at' ,
            'deleteDate' => 'deleted_at',
        ];
        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

    public  static function transformedAttribute($index)
    {
        $attribute =  [
           'id' => 'identifier',
            'name ' =>  'title' ,
             'description' => 'details',
             'quantity' =>'stock' ,
             'status' => 'situation',
             'image' =>  'picture',
             'seller_id' => 'seller',
             'created_at'  =>'creationDate' ,
            'updated_at' => 'lastChange' ,
            'deleted_at' => 'deleteDate' ,
        ];
        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

}
