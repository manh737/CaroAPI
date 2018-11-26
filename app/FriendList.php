<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FriendList extends Model
{
    protected $table = 'friendlist';    
    protected $hidden =['created_at'];
    public function thongke()
    {
        return $this->hasOne('App\ThongKe','name','name');
    }
    public function user()
    {
        return $this->belongsTo('App\UserCaro','name','userName');
    }
}
