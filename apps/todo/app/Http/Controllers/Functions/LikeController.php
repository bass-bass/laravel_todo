<?php

namespace App\Http\Controllers\Functions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Auth;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //いいねの登録、削除
    public function __invoke(Request $request){
        $article = Article::find($request->article_id);
        //いいねしていない状態
        $status = 0;
        if($article->isLiked()){
            $article->likes()->where('user_id',Auth::id())->delete();
        } else {
            $article->likes()->create(['user_id' => Auth::id()]);
            //いいねした状態
            $status = 1;
        }
        $like_count = $article->likes()->count();
        $data = [
            'like_count'=>$like_count,
            'status'=>$status,
        ];
        return response()->json($data);
    }
}
