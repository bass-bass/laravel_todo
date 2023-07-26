@extends('layouts.app')

@section('content')
<div class="container">
@if (session('error'))
  <div class="alert alert-warning mt-3">
      {{ session('error') }}
  </div>
@endif
<main>
  <!-- Container START -->
  <div class="container">
  <div class="row g-4">
  @component('layouts.sidebar-left',['user'=>Auth::user()->load('articles','follows','followers')])
    @endcomponent
      <!-- Main content START -->
      <div class="col-lg-8 vstack gap-4">
          <!-- Card START -->
          <div class="card">
              <!-- プロフィール 開始 -->
              @component('layouts.page', ['user' => $user, 'page'=>'follower'])
              @endcomponent
              <!-- プロフィール 終了 -->
          </div>
          <!-- Card END -->
          <!-- フォロワー一覧　開始 -->
          @foreach ($user->followers as $follower)
          <!-- Events START -->
          <div class="card">
          <!-- Card body START -->
          <div class="card-body">
            <div class="timeline">
            <div class="d-md-flex align-items-center">
                <!-- Avatar -->
                <div class="avatar avatar">
                <a href="{{ route('user.home', ['user_id' => $follower->user_id]) }}"class="text-reset">
                  @if(is_null($follower->image))
                  <img class="avatar-img rounded-circle" src="{{asset('images/noimage.png')}}" alt="avatar">
                 @else
                  <img class="avatar-img rounded-circle" src="data:image/png;base64,{{ $follower->image }}" alt="avatar">
                 @endif
                  <small>{{ '@' . $follower->user_id }}</small></a>
                </div>
              <!-- Info -->
              <div class="w-100">
                <div class="d-sm-flex align-items-start">
                    <h6 class="mb-0">{{ $follower->name }}</a></h6>
                </div>
              </div>
            </div>
            </div>
          </div>
          <!-- Card body END -->
          <!--フォローボタン-->
          @if(!(Auth::id() === $follow->id )) 
            <div class="ms-md-auto d-flex">
              <form method="post" action="{{route('follow', ['id' => $follow->id])}}">
                @csrf
                @if($follow->isFollowing())
                  <button class="btn btn-primary-soft btn-sm mb-0">フォロー中</button>
                @else
                  <button class="btn btn-outline-secondary btn-sm mb-0 ">フォローする</button>
                @endif
              </form>
            </div>
          @endif
          <!--フォローボタン　終了-->
        </div>
        @endforeach
        <!-- フォロワー一覧 終了-->
      </div>
      <!-- Main content END -->
      </div> <!-- Row END -->
  </div>
  <!-- Container END -->
</main>
@endsection
