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

    public function shipment()
    {
        return $this->hasOne('App\Shipment', 'product_id');
    }

    public function order_detail()
    {
        return $this->hasOne('App\OrderDetail', 'product_id');
    }

}
