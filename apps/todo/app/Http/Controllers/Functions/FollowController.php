<?php

namespace App\Http\Controllers\Functions;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Follow;
use Auth;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //フォロー、フォロー解除
    public function __invoke($id) {
        $user = User::findOrFail($id);
        if($user->isFollowing()){
            Follow::where('following_user_id', Auth::id())->where('followed_user_id', $id)->first()->delete();
        } else {
            Follow::create([
                'following_user_id' => Auth::id(),
                'followed_user_id' => $id,
            ]);
        }
        return redirect()->back();
    }
}
