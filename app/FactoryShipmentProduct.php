<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FactoryShipmentProduct extends Model
{
    protected $primaryKey = 'fsp_id';
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    // public function product()
    // {
    //     return $this->hasOne('App\Product', 'product_id');
    // }

}
