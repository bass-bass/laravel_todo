@extends('layouts.app')

@section('content')
  <div class="container">
  @if( session('error') )
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
              @component('layouts.page',['user'=>$user,'page'=>'home'])
              @endcomponent
              <!-- プロフィール 終了 -->
            </div>
            <!-- Card END -->
            @foreach($articles as $article)
              <!-- Events START -->
              <div class="card">
                <!-- Card body START -->
                <div class="card-body">
                  <div class="timeline">
                    <div class="d-md-flex align-items-center">
                      <!-- Avatar -->
                      <div class="avatar me-3 mb-3 mb-md-0">
                        <h2 class="nav-item">{!! '&#x'.$article->emotion->code.';' !!}</h2>
                      </div>
                      <!-- Info -->
                      <div class="w-100">
                        <!--公開判定　開始-->
                          @if( $article->status === 1 )
                            <p class="text-primary">公開</p>
                          @elseif($article->status === 2)
                            <p class="text-success">限定</p>
                          @else
                            <p class="text-warning">非公開</p>
                          @endif
                        <!--公開判定　終了-->
                        <div class="d-sm-flex align-items-start">
                          <h6 class="mb-0"><a href="{{route('article.show', ['id' => $article->id])}}">{{ $article->title }}</a></h6>
                        </div>
                        <!-- Connections START -->
                        <ul class="avatar-group mt-1 list-unstyled align-items-sm-center">
                          <li class="small">
                            {{\Illuminate\Support\Str::substr($article->content, 0, 12)}} .....
                          </li>     
                        </ul>
                        <!-- Connections END -->
                      </div>
                      <!-- Button -->
                      @if( Auth::id() === $article->user->id )
                        <div class="ms-md-auto d-flex float-right">
                          <form method="post" action="{{route('article.destroy', ['id' => $article->id])}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn" type="submit" onClick="delete_alert(event);return false;"><img src="{{ asset('images/icon/trash3.svg') }}" width="20px" height="20px"></button>
                          </form>
                        </div>
                      @endif
                    </div> 
                  </div>
                </div>
              <!-- Card body END -->
              </div>
            @endforeach
          </div>
          <!-- Main content END -->
        </div> <!-- Row END -->
      </div>
      <!-- Container END -->
    </main>
  </div>
@endsection