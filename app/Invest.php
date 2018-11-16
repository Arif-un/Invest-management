<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invest extends Model
{
    protected $table='invests';
    protected $fillable=['partner_id','amount'];
}
