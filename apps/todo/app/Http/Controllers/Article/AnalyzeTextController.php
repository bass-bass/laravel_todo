<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\UseCases\Api\AnalyzeText;
use App\Models\Article;
use Auth;

class AnalyzeTextController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //記事作成
    public function __invoke(Request $request, AnalyzeText $analyze)
    {
        $text = $request->text;
        $id = $request->id;
        $data = $analyze($text);
        if($id==null){
            $id = Auth::user()->articles()->latest()->first()->id;
        }
        $article = Article::updateOrCreate(
            [ 'id' => $id, 'user_id' => Auth::id() ], [
            'score' => $data['score'],
            'magnitude' => $data['magnitude'],
            'emotion_id' => $data['emotion_id'],
        ]);
        return null;
    }
    
}