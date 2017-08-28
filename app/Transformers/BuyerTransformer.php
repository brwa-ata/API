<?php

namespace App\Transformers;

use App\Buyer;
use League\Fractal\TransformerAbstract;

class BuyerTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Buyer $buyer
     * @return array
     */
    public function transform(Buyer $buyer)
    {
        return [
            //BAM SHEWAYA ATWANYN NAWY COLUMNAKAN BGORYN W LA REGAY AWANAY KA XOMAN DAMANNAWA BOYAN KARYAN LASAR BKAYN
            'identifier' => (int)$buyer->id,
            'name' => (string)$buyer->name,
            'email' => (string)$buyer->email,
            'isVerified' => (int)$buyer->verified,
            'creationDate' => (string)$buyer->created_at ,
            'lastChange' => (string)$buyer->updated_at ,
            'deleteDate' => isset($buyer->deleted_at) ? (string) $buyer->deleted_at : null,



            'links' =>
                [
                    [
                        'rel' => 'self',
                        'href' => route('buyers.show' , $buyer->id),
                    ],

                    [
                        'rel' => 'buyer.category',
                        'href' => route('buyer.category.index' , $buyer->id),
                    ],

                    [
                        'rel' => 'buyer.product',
                        'href' => route('buyer.product.index' , $buyer->id),
                    ],

                    [
                        'rel' => 'buyer.seller',
                        'href' => route('buyer.seller.index' , $buyer->id),
                    ],

                    [
                        'rel' => 'buyer.transaction',
                        'href' => route('buyer.transaction.index' , $buyer->id),
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

}
