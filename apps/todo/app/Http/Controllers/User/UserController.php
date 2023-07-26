<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Validator;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\PasswordRequest;
use App\Models\User;
use Carbon\Carbon;
use Auth;

class UserController extends Controller
{       
    
    public function __construct()
    {
        $this->middleware('auth');
    }  

    //ユーザーページに遷移
    public function showUser($user_id)
    {   
        $user_auth = Auth::user();
        $user = User::where('user_id',$user_id)->with('articles')->first();
        if($user_auth->id === $user->id){
            $query = $user->articles();
        } elseif ($user->isFollowing() && $user->isFollowed()){
            $query = $user->articles()->where('status','1')->orWhere('status','2');
        } else {
            $query = $user->articles()->where('status','1');
        }
        $articles = $query->get();
        return view('user.home', compact('user','articles'));
    }

    //ユーザーのフォローを表示
    public function showFollow($user_id)
    {   
        $user = User::where('user_id', '=', $user_id)->with('follows')->first();

        return view('user.follow', ['user'=>$user]);
    }

    //ユーザーのフォロワーを表示
    public function showFollower($user_id)
    {   
        $user = User::where('user_id', '=', $user_id)->with('followers')->first();

        return view('user.follower', ['user'=>$user]);
    }

    //ユーザー管理画面に遷移
    public function showSetting()
    {   
        return view('user.setting');
    }

    //ユーザー情報の変更（現在画像のみ対応）
    public function updateUser(UserRequest $request) 
    {
        //ログインユーザー取得
        $user = Auth::user();
        $image = base64_encode(file_get_contents($request->image->getRealPath()));
        $update = $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'overview' => request('overview'),
            'image' => $image,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        return redirect()->back()->with('status','ユーザー情報が更新されました');
    }

    public function updatePassword(PasswordRequest $request){
        $user = Auth::user();
        // 現在のパスワードを確認
        if (!password_verify($request->current_password, $user->password)) {
            return redirect()->back()->with('error', '現在のパスワードが違います');
        }
        // パスワードの保存
        $user->password = bcrypt($request->new_password);
        $user->save();
        return redirect()->back()->with('status','パスワードが更新できました');
    }

}
