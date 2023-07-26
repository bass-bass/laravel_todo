<?php

namespace App\Http\Controllers\Article;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //記事削除機能
    public function destroy($id)
    {   
        $user = Auth::user();
        $article = $user->articles()->find($id);
        //存在するか確認
        if($article->exists()){
            $article->delete();
            return redirect('/index');
        }
        return redirect()->back()->with('error','削除に失敗しました');
    }
    //記事詳細ページの表示
    public function showDetail($id)
    {
        $query = Article::where('id',$id);
        //存在するか確認
        if($query->exists()){
            $article = $query->with('user','comments','likes','category','emotion')->first();
            return view('article.details', compact('article'));
        }
        return view('index', ['message'=>'記事が存在しません']);
    }
}