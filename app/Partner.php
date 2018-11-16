<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table='partners';
    protected $fillable=['name','partner_id','mobile','email','pass'];
}
