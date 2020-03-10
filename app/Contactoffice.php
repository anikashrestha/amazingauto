<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactoffice extends Model
{
    protected $fillable = ['footer_id','contact_info','icon'];

    public function footer(){
        return $this->belongsTo('App\Footer');

    }
}
