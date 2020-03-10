<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{
    protected $fillable=array('user_id','avatar','about');
    public function user(){
        return $this->belongsTo('App\User');
    }

}
