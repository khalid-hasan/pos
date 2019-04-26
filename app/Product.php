<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';
    public $timestamps = false;

    public function inventory()
    {
        return $this->hasOne('App\Inventory', 'product_id');
    }
}
