<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table='contacts';

    public function mobiles()
    {
        return $this->hasMany('App\Mobile','contact_id');
    }

    
}
