<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FriendList extends Model
{
    protected $table = 'friendlist';    
    protected $fillable = ['idfriendList', 'idUser', 'name','idFriend','status'];
    protected $hidden =['created_at'];
}
