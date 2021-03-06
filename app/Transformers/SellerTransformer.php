<?php

namespace App\Transformers;

use App\Seller;
use League\Fractal\TransformerAbstract;

class SellerTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Seller $seller
     * @return array
     */
    public function transform(Seller $seller)
    {
        return [
            //BAM SHEWAYA ATWANYN NAWY COLUMNAKAN BGORYN W LA REGAY AWANAY KA XOMAN DAMANNAWA BOYAN KARYAN LASAR BKAYN
            'identifier' => (int)$seller->id,
            'name' => (string)$seller->name,
            'email' => (string)$seller->email,
            'isVerified' => (int)$seller->verified,
            'creationDate' => (string)$seller->created_at ,
            'lastChange' => (string)$seller->updated_at ,
            'deleteDate' => isset($seller->deleted_at) ? (string) $seller->deleted_at : null,



            'links' =>
                [
                    [
                        'rel' => 'self',
                        'href' => route('sellers.show' , $seller->id),
                    ],

                    [
                        'rel' => 'seller.category',
                        'href' => route('seller.category.index' , $seller->id),
                    ],

                    [
                        'rel' => 'seller.product',
                        'href' => route('seller.product.index' , $seller->id),
                    ],

                    [
                        'rel' => 'seller.buyer',
                        'href' => route('seller.buyer.index' , $seller->id),
                    ],

                    [
                        'rel' => 'seller.transaction',
                        'href' => route('seller.transaction.index' , $seller->id),
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
            'name' => 'name',
            'email' => 'email',
            'isVerified' => 'verified',
            'creationDate' => 'created_at' ,
            'lastChange' => 'updated_at' ,
            'deleteDate' => 'deleted_at',
        ];
        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

    public  static function transformedAttribute($index)
    {
        $attribute =  [
            'id' =>  'identifier',
            'name' =>  'name',
            'email' => 'email' ,
            'verified' =>'isVerified' ,
            'created_at'  =>'creationDate',
            'updated_at' => 'lastChange' ,
            'deleted_at' => 'deleteDate',
        ];
        return isset($attribute[$index]) ? $attribute[$index] : null;
    }
}
