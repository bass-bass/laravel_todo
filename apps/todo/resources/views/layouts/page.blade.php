<div class="h-200px rounded-top" style="background-image:url(assets/images/bg/05.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
  <!-- Card body START -->
  <div class="card-body py-0">
    <div class="d-sm-flex align-items-start text-center text-sm-start">
    <div>
    <!-- Avatar -->
    <div class="avatar avatar-xxl mt-n5 mb-3">
     @if(is_null($user->image))
     <img class="avatar-img rounded-circle border border-white border-3" src="{{asset('images/noimage.png')}}" alt="avatar">
    @else
     <img class="avatar-img rounded-circle border border-white border-3" src="data:image/png;base64,{{ $user->image }}" alt="avatar">
    @endif
    </div>
    </div>
    <div class="ms-sm-4 mt-sm-3">
  <!-- Info -->
  <h1 class="mb-0 h5"> {{$user->name}}<i class="bi bi-patch-check-fill text-success small"></i></h1>
  <!-- 投稿数合計を表示 -->
    <p>{{ '@'.$user->user_id }}</p>
  </div>
  <!--フォローボタン-->
    @if(!(Auth::id() === $user->id )) 
      <div class="d-flex mt-3 justify-content-center ms-sm-auto">
        <form method="post" action="{{route('follow', ['id' => $user->id])}}">
          @csrf
          @if($user->isFollowing())
            <button class="btn btn-primary-soft me-2"> <i class="bi bi-pencil-fill pe-1"></i> フォロー中</button>
          @else
            <button class="btn btn-outline-secondary me-2"> <i class="bi bi-pencil-fill pe-1"></i> フォローする</button>
          @endif
        </form>
      </div>
    @endif
  <!--フォローボタン　終了-->
  </div>
  <!-- List profile -->
  <p>プロフィール</p>
  {{$user->overview}}
  </div>
    <!-- Card body END -->
    <div class="card-footer mt-3 pt-2 pb-0">
    <!--フォローされているか　開始-->
    @if(!(Auth::id() === $user->id )) 
    @if($user->isFollowed())
    <p class="text-success">フォローされています</p>
    @endif
    @endif
    <!--フォローされているか　終了-->
    <!-- Nav profile pages -->
    <ul class="nav nav-bottom-line align-items-center justify-content-center justify-content-md-start mb-0 border-0">
        <li class="nav-item"> <a class="nav-link" id="home" href="{{route('user.home',['name' => $user->user_id])}}"> 日記 <span class="badge bg-success bg-opacity-10 text-success small">{{$user->articles->count()}}話</span> </a> </li>
        <li class="nav-item"> <a class="nav-link" id="follow" href="{{route('user.follow',['name' => $user->user_id])}}">フォロー<span class="badge bg-success bg-opacity-10 text-success small">{{$user->follows->count()}}</span></a> </li><!-- 相互フォローだと見れる -->
        <li class="nav-item"> <a class="nav-link" id="follower" href="{{route('user.follower',['name' => $user->user_id])}}">フォロワー<span class="badge bg-success bg-opacity-10 text-success small">{{$user->followers->count()}}</span></a> </li><!-- ユーザーだけ見れる -->
        @if( Auth::id() === $user->id ) 
          <li class="nav-item"> <a class="nav-link" id="setting" href="{{route('user.setting',['name' => $user->user_id])}}">設定</a> </li>
        @endif
    </ul>
  </div>

  <script>
    $(function() {
      let page = '{{$page}}';
      $('#' + page).addClass('active');
    });
  </script>
{{$slot}}