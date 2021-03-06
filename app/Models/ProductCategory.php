<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable=[
        'cat_name','description'
    ];

    public function product(){
        return $this->hasMany(product::class);
    }
}
