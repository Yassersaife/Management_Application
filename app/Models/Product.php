<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $filblable =[
        'product_id',
        'name',
    ];
    public function Movements(){
        return $this->hasMany(ProductMovement::class,'product_id');
    }
}
