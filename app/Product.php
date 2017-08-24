<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const AVAILABLE_PRODUCT = 'available';
    const UNAVAILABLE_PRODUCT = 'unavailable';

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'status',
        'image',
        'seller_id',
    ];

    /*  am methoda anjamakay true abe agar status available bw gar na false abe */
    public  function  isAvailable()
    {
        return $this->status == Product::AVAILABLE_PRODUCT;
    }

}
