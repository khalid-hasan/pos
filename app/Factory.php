<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    protected $primaryKey = 'factory_id';
    public $timestamps = false;

    public function raw_material()
    {
        return $this->hasOne('App\RawMaterial', 'factory_id');
    }

    // public function factory_shipment()
    // {
    //     return $this->hasOne('App\FactoryShipment', 'factory_id');
    // }
}
