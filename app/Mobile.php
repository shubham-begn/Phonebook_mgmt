<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Mobile extends Model
{
    use  SoftDeletes;

    protected $table='mobiles';
    protected $dates = ['deleted_at'];

    public function contacts()
    {
        return $this->belongsTo('App\Contact');
    }
}
