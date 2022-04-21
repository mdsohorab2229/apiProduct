<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'prod_name','prod_brand','prod_price','cat_id'
    ];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'cat_id', 'id');
    }

}
