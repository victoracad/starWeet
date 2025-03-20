<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function imageTreat($requestImage, $path){
        $extension = $requestImage->extension();
        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        $requestImage->move(public_path('img/'. $path), $imageName);
        return $imageName;
    }
    public function createPost(Request $request){
        if($request->hasFile('post_image') && $request->file('post_image')->isValid()){
            $imageName = $this->imageTreat($request->file('post_image'), 'post_images');
            Post::Create([
                'user_id' => Auth::user()->id,
                'content' => $request->content,
                'post_image' => $imageName
            ]);
            return ;
        }
        Post::Create([
            'user_id' => Auth::user()->id,
            'content' => $request->content,
        ]);
        return ;
    }
}
