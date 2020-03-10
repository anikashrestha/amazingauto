<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quicklinks extends Model
{
    protected $fillable = ['footer_id','quick_links_name','quick_links'];

    public function footer(){
    return $this->belongsTo('App\Footer');
}

}
