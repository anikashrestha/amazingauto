<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usefullinks extends Model
{
    protected $fillable = ['footer_id','useful_links_name','useful_links'];
    public function footer(){
        return $this->belongsTo('App\Footer');
    }
}
