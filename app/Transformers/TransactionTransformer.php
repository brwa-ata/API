<?php

namespace App\Transformers;

use App\Transaction;
use League\Fractal\TransformerAbstract;

class TransactionTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Transaction $transaction
     * @return array
     */
    public function transform(Transaction $transaction)
    {
        return [
            //BAM SHEWAYA ATWANYN NAWY COLUMNAKAN BGORYN W LA REGAY AWANAY KA XOMAN DAMANNAWA BOYAN KARYAN LASAR BKAYN
            'identifier' => (int)$transaction->id,
            'quantity' => (int)$transaction->quantity,
            'buyer' => (int)$transaction->buyer_id ,
            'product' => (int)$transaction->product_id ,
            'createdDate' => (string)$transaction->created_at ,
            'lastChange' => (string)$transaction->updated_at ,
            'deleteDate' => isset($transaction->deleted_at) ? (string) $transaction->deleted_at : null,


            'links' =>
                [
                    [
                        'rel' => 'self',
                        'href' => route('transactions.show' , $transaction->id),
                    ],

                    [
                        'rel' => 'buyers',
                        'href' => route('buyers.show' , $transaction->id),
                    ],

                    [
                        'rel' => 'transaction.category',
                        'href' => route('transaction.category.index' , $transaction->buyer_id),
                    ],

                    [
                        'rel' => 'product',
                        'href' => route('products.show' , $transaction->product_id),
                    ],

                    [
                        'rel' => 'transaction.seller',
                        'href' => route('transaction.seller.index' , $transaction->id),
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
            'identifier' =>'id',
            'quantity' => 'quantity',
            'buyer' =>'buyer_id' ,
            'product' => 'product_id' ,
            'creationDate' => 'created_at' ,
            'lastChange' => 'updated_at' ,
            'deleteDate' => 'deleted_at',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;

    }

}
