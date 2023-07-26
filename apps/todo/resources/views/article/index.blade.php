@extends('layouts.app')

@section('content')

<!-- Container START -->
<div class="container">
  @if($errors->any())
    <div class="alert alert-danger mt-3">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  
    <div class="row g-4 mt-3">
      <!-- サイドバー左 -->
      @component('layouts.sidebar-left',['user'=>Auth::user()])
      @endcomponent
      <!-- 中央画面 START -->
      <div class="col-md-6 col-lg-6 vstack gap-4">
        @if( isset($message) )
          <h2 class="text-center mt-4">{{$message}}</h2>
        @else

        @if(isset($keyword))
        <h2 class="text-center">
        <img class="me-2 h-20px fa-fw" src="{{ asset('images/icon/search-outline-filled.svg') }}" alt="">
        "{{$keyword}}"の検索結果 
      </h2>
        @elseif(isset($category))
        <h2 class="text-center">
          <img class="me-2 h-20px fa-fw" src="{{ asset('images/icon/bookmark-outline-filled.svg') }}" alt="">
         「{{$category}}」に関する記事
          <img class="me-2 h-20px fa-fw" src="{{ asset('images/icon/bookmark-outline-filled.svg') }}" alt="">
        </h2>
        @else
        <h2 class="text-center">
          <img class="me-2 h-20px fa-fw" src="{{ asset('images/icon/book-open-outline-filled.svg') }}" alt="">
          みんなの日記 
          <img class="me-2 h-20px fa-fw" src="{{ asset('images/icon/book-open-outline-filled.svg') }}" alt="">
        </h2>
        @endif
        <!-- 記事一覧 START -->
        @foreach($articles as $article)
        <div class="card">
        <!-- Card body START -->
            <div class="card-body">
                <!-- Events list START -->
                <div class="row">
                <div class="d-sm-flex align-items-center">
                    <!-- Avatar -->
                    <div class="avatar avatar">
                      <a href="{{ route('user.home', ['user_id'=>$article->user->user_id]) }}" class="text-reset">
                      @if(is_null($article->user->image))
                        <img class="avatar-img rounded-circle" src="{{asset('images/noimage.png')}}" alt="avatar">
                      @else
                        <img class="avatar-img rounded-circle" src="data:image/png;base64,{{ $article->user->image }}" alt="avatar">
                      @endif
                        </a>
                    </div>
                    <div class="ms-sm-4 mt-2 mt-sm-0">
                    <!-- Info -->
                    <small class="mr-3">{{ '@'.$article->user->user_id }}</small>
                    <span class="nav-item small"> {{ $article->created_at->diffForHumans() }}</span>
                    <h5 class="mb-1"><a href="{{ route('article.show', ['id' => $article->id]) }}">{{ $article->title }}
                      <span>&#x{{ $article->emotion->code??'1f647' }};</span>
                    </a></h5>    
                    <ul class="nav nav-stack small">
                        <li class="nav-item">
                          <i class="bi-bookmark-fill pe-1"></i>
                          {{ $article->category->name}}
                         </li>
                        <li class="nav-item">
                        <i class="bi bi-hand-thumbs-up-fill pe-1"></i> いいね（{{ $article->likes->count() }}）
                        </li>
                        <li class="nav-item">
                        <i class="bi bi-chat-fill pe-1"></i> コメント（{{ $article->comments->count() }}）
                        </li>
                    </ul>
                    </div>
                </div>
                </div>
                <!-- Events list END -->  
            </div>
        </div>
        @endforeach
        <!-- 記事一覧 END -->
        </div>
      <!-- 中央画面　END -->
    </div> <!-- Row END -->
  </div>
  <!-- Container END -->
  @endif
  <!-- 新規投稿処理　START -->
  @component('layouts.modal_create')
  @endcomponent
  <script>
    $(function (){
    $('#create-submit').on('click', function(){
      $.ajax({
      headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{ route('article.analyze') }}",
      method: 'POST',
      data: {
        'id' : null,
        'text' : $('#text-create').val(),
      },
      dataType: 'json',
    })
    .done(function (data) {
      console.log('yes');
    })
    .fail(function () {
      console.log('failed');
    })
    });
});
  </script>
@endsection
