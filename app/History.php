<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'lichsudau';    
    protected $fillable = ['idLichSuDau', 'idUser', 'name','idUser2','name2'];
}
