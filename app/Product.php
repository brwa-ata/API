<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

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
    protected $hidden = ['pivot']; // ama bo awaya ka la katy pshan danaway shtakan pivoyt table darnakawe


    /*  am methoda anjamakay true abe agar status available bw gar na false abe */
    public  function  isAvailable()
    {
        return $this->status == Product::AVAILABLE_PRODUCT;
    }

    public function seller()
    {
        return $this->belongsTo('App\Seller');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

}
