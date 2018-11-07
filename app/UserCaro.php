<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCaro extends Model
{
    //
    protected $table = 'user';
    protected $fillable = ['userName','name'];
}
