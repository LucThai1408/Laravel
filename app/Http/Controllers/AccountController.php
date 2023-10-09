<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Http\Requests\RegisterRequest;

use Hash;

use Auth;

class AccountController extends Controller
{
    public function register(){
        return view('account.register');
    }
    public function postRegister(RegisterRequest $request){
        $request->merge(['password'=>Hash::make($request->password)]);
        User::create($request->all());
        return redirect()->route('account.login');
    }

    public function login(){
        return view('account.login');
    }

    public function postLogin(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('home.index');
        }else{
            return redirect()->back()->with('error' ,'Tài khoản hoặc mật khẩu không chính xác');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home.index');
    }
}
