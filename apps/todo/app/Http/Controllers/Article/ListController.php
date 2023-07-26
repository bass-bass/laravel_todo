<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Auth;

class ListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }  
    //記事一覧ページ
    public function index()
    {
        $query = Article::where('status','1');
        $articles = $query->with('user','comments','likes','category','emotion')->orderBy('id', 'desc')->get();
        return view('article.index', compact('articles'));
    }
    //検索結果ページの表示
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Article::where('status','1')->where('title', 'like', '%'.$keyword.'%');
        if($query->exists()){
            $articles = $query->with('user','comments','likes','category','emotion')->orderBy('id', 'desc')->get();
            return view('article.index', compact('articles','keyword'));
        }
        return view('article.index', ['message'=>'"'.$search.'"に一致する記事は見つかりませんでした']);
    }
    //カテゴリ検索結果ページの表示
    public function category($id)
    {
        $category = Category::findOrFail($id)->name;
        $query = Article::where('status','1')->where('category_id',$id);
        if($query->exists()){
            $articles = $query->with('user','comments','likes','category','emotion')->orderBy('id', 'desc')->get();
            return view('article.index',compact('articles','category'));
        }
        return view('article.index', ['message'=>'「'.$category.'」記事はまだありません']);
    }
}
