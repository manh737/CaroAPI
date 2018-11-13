<?php

namespace App\Http\Controllers;
use App\Http\Resources\User;
use App\Http\Resources\User1;
use App\UserCaro;
use App\FriendList;
use App\ThongKe;
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
        else{
            $user->status = 1;
            $user->save();
            $userStatus = FriendList::where('name', '=', $data->userName)->get();
            foreach ($userStatus as $online) {
                $online->status = 1;
                $online->save();
            }
            return (new User1($user))->response()->setStatusCode(200);
        }
    }

    public function signup(Request $data){
        $user = UserCaro::where('userName', '=', $data->username)->orWhere('email', '=', $data->email)->first();
        if(!empty($user)){
            return response()->json(['statuscode'=>'404'])->setStatusCode(404);
        }
        else{
            $createUser = new UserCaro;
            $createUser->userName = $data->username;
            $createUser->name = $data->name;
            $createUser->password = $data->password;
            $createUser->email = $data->email;
            $createUser->save();
            $thongke = new ThongKe;
            $thongke->name = $data->username;
            $thongke->idUser = $createUser->id;
            $thongke->save();
            return response()->json(['statuscode'=>'200'])->setStatusCode(200);
        }
    }

    public function search(Request $data){
        $user = UserCaro::where('userName', '=', $data->username)->orWhere('userName', 'like', '%' . $data->username . '%')->get();
        if(empty($user)){
            return response()->json(['statuscode'=>'404'])->setStatusCode(404);
        }
        return (new User($user))->response()->setStatusCode(200);
    }

}
