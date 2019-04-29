<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    public $timestamps = false;
    
    public function factory()
    {
        return $this->belongsTo('App\Factory', '$id');
    }
}
