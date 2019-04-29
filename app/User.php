<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = "user_id";
    public $timestamps = false;
    public $incrementing = false;
}
