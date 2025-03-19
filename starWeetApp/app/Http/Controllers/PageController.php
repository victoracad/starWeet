<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function userPage($user){
        //dd($user);
        //dd(User::where('username', $user)->first());
        //dd(Auth::user()->username);
        if(Auth::user()->username == $user){
            return view('myprofile', ['user' => User::with('profile')->where('username', $user)->first(), 'userAuth' => Auth::user()]);
        }
        return view('profile', ['user' => User::with('profile')->where('username', $user)->first(), 'userAuth' => Auth::user()]);
    }
    public function editProfilePage(){
        return view('editProfile', ['user' => User::with('profile')->where('username', Auth::user()->username)->first()]);
    }
}
