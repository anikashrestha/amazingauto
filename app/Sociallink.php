<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sociallink extends Model
{
    protected $fillable = ['footer_id','social_icon','social_links'];
    public function footer(){
        return $this->belongsTo('App\Footer');
    }

}
