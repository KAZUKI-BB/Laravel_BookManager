<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logincontroller extends Controller
{
    //ログイン画面へ遷移
    public function index(){
        return view('login');
    }

    //ログイン処理
    public function check(Request $request){
        $login_info = $request->only('name','password');
        if(Auth::attempt($login_info)){
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return back()->withErrors([
            'error' => 'ユーザーネームまたはパスワードが間違っています'
        ]);
    }

    //ログアウト処理
    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }
}
