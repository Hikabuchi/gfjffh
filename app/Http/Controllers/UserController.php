<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Application;

class UserController extends Controller
{
    public function index_register(){
        return view('auth.register');
    }

    public function index_login(){
        return view('auth.login');
    }
    public function profile(Request $request)
        {
            $applications = Application::orderBy('created_at', 'desc')->simplePaginate(2);
        if (Auth::user()->admin) {
            $statuses = Status::all();
            return view('admin.adminPanel',['applications' => $applications, 'statuses' => $statuses]);
        }else{
            $applications = Application::where('user_id', Auth::id())->get();
            return view('user.profile',['applications' => $applications]);
        }
    }

    public function register(Request $request){
        $request->validate([
            'login'=>'required|string|unique:users',
            'password'=>'required|string|min:6|confirmed',
            'user_name'=>'required|string',
            'phone'=>'required',
            'email'=>'required|email',]);

        $user = new User();
        $user->login = $request->input('login');
        $user->password  = Hash::make($request->password);
        $user->name = $request->input('user_name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->save();
        Auth::login($user);
        return redirect('/profile');
    }

    public function login(Request $request){
        $request->validate([
            'login' => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt(['login' => $request['login'], 'password' => $request['password']], true)){
            return redirect('/profile');
        }
        return redirect()->back()->with('error', 'Неправильный логин или пароль');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
