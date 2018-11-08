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
        $user = UserCaro::find($id);
        if(empty($user)){
            return response()->json(['statuscode'=>'404'])->setStatusCode(404);
        }
        return (new User1($user))->response()->setStatusCode(200);
    }
    public function manh1(){
        return (new User(UserCaro::all()))->response()->setStatusCode(202);
    }
    public function login(Request $data){
        User1::withoutWrapping();
        $user = UserCaro::where('userName', '=', $data->userName)->where('password', '=', $data->password)->first();
        if(empty($user)){
            return response()->json(['statuscode'=>'404'])->setStatusCode(404);
        }
        return (new User1($user))->response()->setStatusCode(200);
    }
}
