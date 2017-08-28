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
        return [
            //BAM SHEWAYA ATWANYN NAWY COLUMNAKAN BGORYN W LA REGAY AWANAY KA XOMAN DAMANNAWA BOYAN KARYAN LASAR BKAYN
            'identifier' => (int)$category->id,
            'title' => (string)$category->name,
            'details' => (string)$category->description,
            'creationDate' => (string)$category->created_at ,
            'lastChange' => (string)$category->updated_at ,
            'deleteDate' => isset($category->deleted_at) ? (string) $category->deleted_at : null,
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
