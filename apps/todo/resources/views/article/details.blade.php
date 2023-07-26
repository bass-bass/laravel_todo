@extends('layouts.app')

@section('content')
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
      <div class="row mt-3">
      @component('layouts.sidebar-left',['user'=>Auth::user()])
      @endcomponent
        <div class="col-lg-8 mx-auto">
          <div class="card card-body">
            <!-- Fees images -->
            <img class="card-img rounded" src="assets/images/post/16by9/big/01.jpg" alt="">
            <!-- Feed meta START -->
            <div class="d-flex align-items-center justify-content-between my-3">
              <div class="d-flex align-items-center">
                <!-- Avatar -->
                <div class="avatar me-2">
                    @if(is_null($article->user->image))
                    <img class="avatar-img rounded-circle" src="{{asset('images/noimage.png')}}" alt="avatar">
                  @else
                    <img class="avatar-img rounded-circle" src="data:image/png;base64,{{ $article->user->image }}" alt="avatar">
                  @endif
                </div>
                <!-- Info -->
                <div>
                  <div class="nav nav-divider">
                    <h6 class="nav-item card-title mb-0"> <a href="#!">{{ $article->user->name }}</a></h6>
                    <span class="nav-item small"> {{ $article->created_at->diffForHumans() }}</span>
                  </div>
                  <a href="{{ route('user.home', ['user_id'=>$article->user->user_id]) }}" class="text-reset"><small>{{ '@'.$article->user->user_id }}</small></a>
                  <span class="nav-item">&#x{{ $article->emotion->code??'1f647' }};</span>
                </div>
                
              </div>
            </div>
            <!-- Feed meta Info -->
            <h1 class="h4">{{ $article->title }}</h1>
            <p>{{ $article->content }} </p>
            @if( Auth::id() === $article->user->id )
            <div class="ms-md-auto d-flex">
              <a href="#!" data-bs-toggle="modal" data-bs-target="#modalEditFeed">
                <button type="submit" class="btn btn-primary-soft btn-sm mb-0"><i class="bi bi-pen-fill"></i></button>
              </a>
              <form method="post" action="{{route('article.destroy', ['id' => $article->id])}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger-soft btn-sm mb-0 me-2" onClick="delete_alert(event);return false;"><i class="bi bi-trash-fill"></i></button>
              </form>
            </div>
            @endif

            <!-- いいね、コメント数表示 -->
            <ul class="nav nav-stack flex-wrap small mb-3">
              <li class="nav-item">
                <a class="nav-link" href="#!"> <i class="bi bi-bookmark-fill pe-1"></i>{{ $article->category->name }}</a>
              </li>
              <li class="nav-item">
                  <span class="like">
                    @if($article->isLiked())
                      <i class="bi bi-hand-thumbs-up-fill like-toggle" style="color:blue;"></i>
                    @else
                      <i class="bi bi-hand-thumbs-up bi-hand-thumbs-up-fill like-toggle"></i>
                    @endif
                      <span class="like-count">{{$article->likes->count()}}</span>
                  </span>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#!"> <i class="bi bi-chat-fill pe-1"></i>{{$article->comments->count()}}</a>
              </li>
            </ul>
            <!-- いいね、コメント数表示 -->
            @if(!$article->comments->isEmpty())
            <!-- Comment wrap START -->
                @foreach($article->comments as $comment)
                <ul class="comment-wrap list-unstyled">
              <!-- Comment item START -->
              <li class="comment-item mb-3">
                <div class="d-flex position-relative">
                  <!-- Avatar -->
                  <div class="avatar avatar-xs">
                  @if(is_null($comment->user->image))
                    <img class="avatar-img rounded-circle" src="{{asset('images/noimage.png')}}" alt="avatar">
                  @else
                    <img class="avatar-img rounded-circle" src="data:image/png;base64,{{ $comment->user->image }}" alt="avatar">
                  @endif
                  </div>
                  <div class="ms-2">
                    <!-- Comment by -->
                    <div class="bg-light rounded-start-top-0 p-3 rounded">
                      <div class="d-flex justify-content-between">
                        <h6 class="mb-1"> <a href="#!">{{ $comment->user->name }} </a></h6>
                        <small class="ms-2"> {{ $comment->created_at->diffForHumans() }}</small>
                      </div>
                      <p class="small mb-0">{{ $comment->content }}</p>
                    </div>
                    <!-- Comment delete -->
                    @if( Auth::id() === $comment->user->id )
                    <form method="post" action="{{route('comment.destroy', ['id' => $comment->id])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm mb-0 me-2" onClick="delete_alert(event);return false;"><img src="{{asset('images/icon/trash3.svg')}}"></button>
                    </form>
                    @endif
                  </div>
                </div>
              </ul>
                @endforeach
            @endif
            <!-- Add comment -->
            <div class="d-flex mb-3">
                <!-- Avatar -->
                <div class="avatar avatar-xs me-2">
                  @if(is_null(Auth::user()->image))
                  <img class="avatar-img rounded-circle" src="{{asset('images/noimage.png')}}" alt="avatar">
                @else
                  <img class="avatar-img rounded-circle" src="data:image/png;base64,{{ Auth::user()->image }}" alt="avatar">
                @endif                
                </div>
                <!-- Comment box  -->
                <form class="form" method="post" action="{{ route('comment.create', ['id' => $article->id] )}}">
                  @csrf
                  <textarea class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }} pe-4 bg-light" name="content" rows="1" placeholder="コメントする..." autofocus required></textarea>
                  @if ($errors->has('content'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                    @endif
                  <button class="btn" type="submit"><img src="{{ asset('images/icon/send.svg') }}"></button>
                </form>
            </div>
            <!-- Comment wrap END -->
          </div>     
        </div>
      </div>
    </div>
   </div>
  <!-- Container END -->
</main>
<script>
  $(function () {
    let article_id = {{$article->id}};
    $(".like-toggle").on('click', function () {
      $.ajax({
        headers: {
          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('like') }}",
        method: 'POST',
        data: { 'article_id' : article_id },
        dataType: 'json',
      })
      .done(function (data) {
        $('.like-count').html(data.like_count);
        if(data.status){
          $('.like-toggle').removeClass('bi-hand-thumbs-up');
          $('.like-toggle').css('color','blue');
        } else {
          $('.like-toggle').addClass('bi-hand-thumbs-up');
          $('.like-toggle').css('color','');
        }
      })
      .fail(function () {
        console.log('failed');
      })
    });
  });

</script>
<script>
    $(function (){
      let article_id = {{$article->id}};
      $('#update-submit').on('click', function(){
        $.ajax({
        headers: {
          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('article.analyze') }}",
        method: 'POST',
        data: {
          'id' : article_id,
          'text' : $('#text-update').val(),
        },
        dataType: 'json',
      })
      .done(function (data) {
        console.log(data.score);
      })
      .fail(function () {
        console.log('failed');
      })
    });
  });
</script>

<!-- 新規投稿処理　START -->
@component('layouts.modal_edit',['article'=>$article])
@endcomponent

@endsection