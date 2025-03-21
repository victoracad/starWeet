<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function userPage($user){
        $posts = Post::where('user_id', User::where('username', $user)->value('id'))->orderByDesc('id')->get();

        if(Auth::user()->username == $user){
            return view('myprofile', ['user' => User::with('profile')->where('username', $user)->first(), 'userAuth' => Auth::user(), 'posts' => $posts, 'users' => User::all()]);
        }
        return view('profile', ['user' => User::with('profile')->where('username', $user)->first(), 'userAuth' => Auth::user(), 'posts' => $posts, 'users' => User::all()]);
    }
    public function editProfilePage(){
        return view('editProfile', ['user' => User::with('profile')->where('username', Auth::user()->username)->first(), 'userAuth' => Auth::user()]);
    }
}
