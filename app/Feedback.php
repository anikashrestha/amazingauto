<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = array('id','full_name','email','contact_no','feedback');

}
