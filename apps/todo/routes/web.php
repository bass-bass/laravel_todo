<?php
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome_new');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ログイン後の記事一覧ページ
Route::get('/index', 'Article\ListController@index')->name('article.index');
//検索結果画面の表示
Route::get('/search', 'Article\ListController@search')->name('article.search');
//カテゴリ検索
Route::get('/category/{id}', 'Article\ListController@category')->name('article.category');

//新規投稿を保存
Route::post('/create', 'Article\CreateUpdateController')->name('article.create');
//編集処理
Route::patch('/update/{id}', 'Article\CreateUpdateController')->name('article.update');
//投稿記事の感情分析
Route::post('/analyze', 'Article\AnalyzeTextController')->name('article.analyze');
Route::post('/analyze/{$id}', 'Article\AnalyzeTextController')->name('analyze.update');

//記事削除機能
Route::delete('/delete/{id}', 'Article\ArticleController@destroy')->name('article.destroy');
//詳細画面の表示
Route::get('/article/{id}', 'Article\ArticleController@showDetail')->name('article.show');

//ユーザーページの表示
Route::get('/{user_id}/home', 'User\UserController@showUser')->name('user.home');
//ユーザーのフォローを表示
Route::get('/{user_id}/follow', 'User\UserController@showFollow')->name('user.follow');
//ユーザーのフォロワーを表示
Route::get('/{user_id}/follower', 'User\UserController@showFollower')->name('user.follower');

//ユーザー情報設定画面の表示
Route::get('/{user_id}/setting', 'User\UserController@showSetting')->name('user.setting');
//プロフィール画像のアップロード
Route::post('/userimage/store', 'User\UserController@updateUser')->name('user.update');
//パスワードの更新
Route::patch('/password/update', 'User\UserController@updatePassword')->name('user.password');

//コメント投稿処理
Route::post('/comment/{id}', 'Functions\CommentController@store')->name('comment.create');
//コメント削除処理
Route::delete('/comment/delete/{id}', 'Functions\CommentController@destroy')->name('comment.destroy');
//いいね追加、削除 (ajax)
Route::post('/article/like', 'Functions\LikeController')->name('like');
//フォロー、フォロー解除
Route::post('/page/{user}/follow', 'Functions\FollowController')->name('follow');
