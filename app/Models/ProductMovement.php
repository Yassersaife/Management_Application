<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMovement extends Model
{
    protected $primaryKey = 'movement_id';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'movement_id', 
        'timestamp',
        'from_location', 
        'to_location',
        'product_id',
        'qty'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'product_id');

    }
    public function fromLocation(){
        return $this->belongsTo(Location::class, 'from_location');
    }
    public function toLocation(){
        return $this->belongsTo(Location::class, 'to_location');
    }
    
}
