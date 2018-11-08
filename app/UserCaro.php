<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCaro extends Model
{
    //
    protected $table = 'user';
    protected $fillable = ['userName','name'];

    public function friendList(){
        return $this->HasMany('App\FriendList', 'idUser');
    }

    public function lichSuDau(){
        return $this->HasMany('App\History', 'idUser');
    }
    
    public function thongKe(){
        return $this->HasMany('App\ThongKe', 'idUser');
    }
}
