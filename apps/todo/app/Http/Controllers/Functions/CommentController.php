<?php

namespace App\Http\Controllers\Functions;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request,$id){
        //バリデーション
        $request->validate([
            'content' => 'required',
        ]);
        $article = Article::find($id);
        $article->comments()->create([
            'content' => request('content'),
            'user_id' => Auth::id(),
        ]);
        return redirect()->back();
    }
    public function destroy($id){
        $user = Auth::user();
        $comment = $user->comments()->find($id);
        if($comment->exists()){
            $comment->delete();
            return redirect()->back();
        }
        return redirect()->back()->with('error','削除に失敗しました');
    }
}
