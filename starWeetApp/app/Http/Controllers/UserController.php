<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
       public function follow($user_id)
       {
            auth()->user()->following()->syncWithoutDetaching([$user_id]);
            return response()->json(['message' => 'Você seguiu ' . User::where('id', $user_id)->first()->username]);
       }
       public function unfollow($user_id)
       {
           auth()->user()->following()->detach($user_id);
           return response()->json(['message' => 'Você deixou de seguir ' . User::where('id', $user_id)->first()->username]);
       }
}
