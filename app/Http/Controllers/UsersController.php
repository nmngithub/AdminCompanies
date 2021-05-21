<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class UsersController extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }

    public function postLogin(Request $req){
        if(Auth::attempt(['email'=>$req->email, 'password'=>$req->password])){
            return redirect('admin/companies');
        }
        else{
            return redirect()->back()->with('notification', 'Tài khoản hoặc mật khẩu không chính xác!');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('admin/login');
    }
}
