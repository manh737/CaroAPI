<?php

namespace App\Http\Controllers;
use App\Http\Resources\User;
use App\Http\Resources\User1;
use App\UserCaro;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function manh($id){
        User1::withoutWrapping();
        return new User1(UserCaro::find($id));
    }
    public function manh1(){
        return new User(UserCaro::all());
    }
}
