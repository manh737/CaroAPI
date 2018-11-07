<?php

namespace App\Http\Controllers;
use App\Http\Resources\User;
use App\Http\Resources\thongkers;
use App\Http\Resources\Rank;
use App\Http\Resources\flist;
use App\Http\Resources\User1;
use App\Http\Resources\GetRoomcl;
use App\UserCaro;
use App\FriendList;
use App\Room;
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
        return (new User(UserCaro::all()))->response()->setStatusCode(200);
    }    

    public function room(){
        return (new GetRoomcl(Room::all()))->response()->setStatusCode(200);
    } 
    
    public function thongke($id){
        thongkers::withoutWrapping();
        $user = ThongKe::where('idUser', '=', $id)->first();
        return (new thongkers($user))->response()->setStatusCode(200);
    }
    
    public function thongke1(){
        return (new Rank(ThongKe::all()))->response()->setStatusCode(200);
    }    
    
    public function friendlist($id){
        $user = FriendList::where('idUser', '=', $id)->get();
        return (new flist($user))->response()->setStatusCode(200);
    }
    
    public function reset(){
        $user = UserCaro::all();
        $user1 = FriendList::all();
        foreach ($user as $value) {
            $value->status = 0;
            $value->save();
        }
        foreach ($user1 as $value) {
            $value->status = 0;
            $value->save();
        }
        return response()->json(['statuscode'=>'reset oke'])->setStatusCode(200);
    }

    public function login(Request $data){
        User1::withoutWrapping();
        $user = UserCaro::where('userName', '=', $data->userName)->where('password', '=', $data->password)->first();
        
        if(empty($user)){
            return response()->json(['statuscode'=>'Sai tên đăng nhập mật khẩu'])->setStatusCode(404);
        }
        else{
            if($user->status == 1){
                return response()->json(['statuscode'=>'User đang có người đăng nhập'])->setStatusCode(404);
            }else{
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

    public function logout(Request $data){
        $user = UserCaro::where('userName', '=', $data->username)->first();
        $user->status = 0;
        $user->save();
        $userStatus = FriendList::where('name', '=', $data->username)->get();
        foreach ($userStatus as $online) {
            $online->status = 0;
            $online->save();
        }
        return response()->json(['statuscode'=>'logout oke'])->setStatusCode(200);
    }

    public function win(Request $data){
        $user = ThongKe::where('name', '=', $data->username)->first();
        $user->gameCount++;
        $user->win++;
        $user->save();
        return response()->json(['statuscode'=>'oke'])->setStatusCode(200);
    }

    public function lose(Request $data){
        $user = ThongKe::where('name', '=', $data->username)->first();
        $user->gameCount++;
        $user->lose++;
        $user->save();
        return response()->json(['statuscode'=>'oke'])->setStatusCode(200);
    }

    public function draw(Request $data){
        $user = ThongKe::where('name', '=', $data->username)->first();
        $user->gameCount++;
        $user->draw++;
        $user->save();
        return response()->json(['statuscode'=>'oke'])->setStatusCode(200);
    }
}
