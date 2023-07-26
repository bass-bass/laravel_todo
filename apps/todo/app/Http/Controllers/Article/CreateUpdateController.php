<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\UseCases\Api\AnalyzeText;
use App\Http\Requests\Article\CreateRequest;
use Carbon\Carbon;
use Auth;

class CreateUpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //記事作成
    public function __invoke(CreateRequest $request, $id = null)
    {
        $article = DB::table('articles')->updateOrInsert(
            [ 'id' => $id, 'user_id' => Auth::id() ], [
            'title' => request('title'), 
            'content' => request('content'),
            'status' => request('status'),
            'category_id' => request('category_id'),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        return redirect()->back();
    }
    
}