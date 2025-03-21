<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ModalController extends Controller
{
    public function loadContent(Request $request)
    {
        $modalName = $request->input('modal');
        $post_id = $request->input('post_id');

        switch ($modalName) {
            case 'login-modal':

                return view('partials.login-modal');
            case 'register-modal':
                
                return view('partials.register-modal');
            case 'usersLikes':    
                return view('partials.usersLikes-modal', ['users' => User::whereHas('likes', function ($query) use ($post_id){
                    $query->where('post_id', $post_id);
                })->get()]);
            default:
                return view('partials.default-modal');
        }
    }
}