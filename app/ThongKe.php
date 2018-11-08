<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongKe extends Model
{
    protected $table = 'thongke';    
    protected $fillable = ['idThongKe', 'idUser', 'gameCount','win','lose','draw'];
}
