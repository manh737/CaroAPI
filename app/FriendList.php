<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FriendList extends Model
{
    protected $table = 'friendlist';    
    protected $hidden =['created_at'];
}
