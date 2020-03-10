<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = ['copyright','office_detail'];
   
    public function quickLinks(){
        return $this->belongsToMany('App\QuickLinks');
    }

    public function usefulLinks(){
        return $this->belongsToMany('App\Usefullinks');
    }

    public function socialLinks(){
        return $this->belongsToMany('App\Sociallink');
    }

    public function contacts(){
        return $this->belongsToMany('App\ContactOffice');
    }
}
