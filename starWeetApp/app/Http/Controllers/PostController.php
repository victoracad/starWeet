<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Likes;
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
    public function like($post_id){

        if (!Auth::user()) {
            return response()->json(['error' => 'Usuário não autenticado'], 401);
        }
        if (Post::find($post_id)->likes()->where('user_id', Auth::id())->exists()) {
            Post::find($post_id)->likes()->where('user_id', Auth::id())->delete();
            return response()->json(['liked' => false, 'likes_count' => Post::find($post_id)->likes()->count()]);
        } else {
            Post::find($post_id)->likes()->create(['user_id' => Auth::id(), 'post_id' => $post_id]);
            return response()->json(['liked' => true, 'likes_count' => Post::find($post_id)->likes()->count()]);
        }
    }
    public function destroy($id)
{
    $post = Post::find($id);

    if (!$post) {
        return response()->json(['message' => 'Post não encontrado'], 404);
    }

    $post->delete();

    return response()->json(['message' => 'Post deletado com sucesso']);
}
}
