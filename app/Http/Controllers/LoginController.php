<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(){

        //$users = User::all();

        //var_dump($users);

    	return view('auth.login');
    }

    public function verify(Request $req){
    
        request()->validate([
            'user_id' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('user_id', $req->user_id)
            ->where('password', $req->password)
            ->first();

    	if($user){
            $req->session()->put('uname', $req->user_id);
            $req->session()->put('role', $user->role);
    		return redirect()->route('admin');
    	}
        else{
            $req->session()->flash('msg', "Invalid username/password");
    		return redirect('/login');
            //return view('login.index');
    	}
    }
}
