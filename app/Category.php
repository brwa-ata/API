<?php

namespace App;

use App\Transformers\CategoryTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public $transformer = CategoryTransformer::class;
    protected $dates = ['deleted_at'];
    protected $fillable = ['name' , 'description'];
    protected $hidden = ['pivot']; // ama bo awaya ka la katy pshan danaway shtakan pivoyt table darnakawe

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

}
