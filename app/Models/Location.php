<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $primaryKey = 'location_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable=[
        'location_id',
        'name',
    ];

    public function inMovements()
    {
        return $this->hasMany(ProductMovement::class,'from_location', 'location_id');
    }
    
    public function outMovements()
    {
        return $this->hasMany(ProductMovement::class,'to_location', 'location_id');
    }
}
