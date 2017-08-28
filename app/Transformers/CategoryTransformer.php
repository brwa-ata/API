<?php

namespace App\Transformers;

use App\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Category $category
     * @return array
     */
    public function transform(Category $category)
    {

        //BAM SHEWAYA ATWANYN NAWY COLUMNAKAN BGORYN W LA REGAY AWANAY KA XOMAN DAMANNAWA BOYAN KARYAN LASAR BKAYN


        return [
            'identifier' => (int)$category->id,
            'title' => (string)$category->name,
            'details' => (string)$category->description,
            'creationDate' => (string)$category->created_at ,
            'lastChange' => (string)$category->updated_at ,
            'deleteDate' => isset($category->deleted_at) ? (string) $category->deleted_at : null,

            'links' =>
                [
                    [
                        'rel' => 'self',
                        'href' => route('categories.show' , $category->id),
                    ],

                    [
                        'rel' => 'category.buyers',
                        'href' => route('category.buyer.index' , $category->id),
                    ],

                    [
                        'rel' => 'category.products',
                        'href' => route('category.product.index' , $category->id),
                    ],

                    [
                        'rel' => 'category.sellers',
                        'href' => route('category.seller.index' , $category->id),
                    ],

                    [
                        'rel' => 'category.transactions',
                        'href' => route('category.transaction.index' , $category->id),
                    ],

                ]

        ];
    }


    /**
     * @param $index
     * @return mixed|null
     */
    public static  function originalAttribute($index)
    {
        $attribute =  [
            'identifier' => 'id',
            'title' => 'name',
            'details' => 'description',
            'creationDate' => 'created_at' ,
            'lastChange' => 'updated_at' ,
            'deleteDate' => 'deleted_at',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;

    }


}
