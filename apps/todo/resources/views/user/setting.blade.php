@extends('layouts.app')

@section('content')
<!-- **************** MAIN CONTENT START **************** -->
<main>
  <!-- Container START -->
  <div class="container">
    <div class="row">

      <!-- サイドバー左 -->
      @component('layouts.sidebar-left',['user'=>Auth::user()->load('articles','follows','followers')])
      @endcomponent
      <!-- Main content START -->
      <div class="col-lg-8 vstack gap-4">
        <div class="card">
          @component('layouts.page',['user'=>Auth::user(),'page'=>'setting'])
          @endcomponent
        </div>
        @if (session('status'))
            <div class="alert alert-success mt-3">
                {{ session('status') }}
            </div>
        @endif
        <!-- Setting Tab content START -->
        <div class="tab-content py-0 mb-0">
          <!-- Account setting tab START -->
          <div class="tab-pane show active fade" id="nav-setting-tab-1">
            <!-- Account settings START -->
            <div class="card mb-4">
              
              <!-- Title START -->
              <div class="card-header border-0 pb-0">
                <h1 class="h5 card-title">設定</h1>
                <p class="mb-0">自分のアカウントの設定を変更できます</p>
              </div>
              <!-- Card header START -->
              <!-- Card body START -->
              <div class="card-body">
                <!-- Form settings START -->
                <form method="post"  action="{{route('user.update')}}" class="row g-3" enctype="multipart/form-data">
                  @csrf
  
                  <!-- Additional name -->
                  <div class="col-sm-6 col-lg-4">
                    <label class="form-label">ユーザー名</label>
                    <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ Auth::user()->name }}">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                  </div>
                  
                  <!-- Phone number -->
                  <div class="col-12">
                    <label class="form-label">メールアドレス</label>
                    <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="" value="{{ Auth::user()->email }}">
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                  </div>
                  <!-- Page information -->
                  <div class="col-12">
                    <label class="form-label">自己紹介</label>
                    <textarea class="form-control"  name="overview" rows="4" placeholder="自己紹介を追加する">{{Auth::user()->overview}}</textarea>
                    <small>文字数制限</small>
                  </div>
                  <!-- User icon -->
                  <div class="col-sm-6">
                    <label class="form-label">アイコン</label>
                    <input type="file" name="image" value="" class="ml-3 mr-2 d-inline form-control{{ $errors->has('image') ? ' is-invalid' : '' }}">
                    @if ($errors->has('image'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                    @endif
                  </div>
                  <!-- Button  -->
                  <div class="col-12 text-end">
                    <button type="submit" name="post" class="btn btn-sm btn-primary mb-0">変更を保存</button>
                  </div>
                </form>
                <!-- Settings END -->
              </div>
            <!-- Card body END -->
            </div>
            <!-- Account settings END -->

            <!-- Change your password START -->
            <div class="card">
              <!-- Title START -->
              <div class="card-header border-0 pb-0">
                <h5 class="card-title">パスワードを更新</h5>
                <p class="mb-0">第三者に推測できないようにしてください。</p>
              </div>
              <!-- Title START -->
              <div class="card-body">
                <!-- Settings START -->
                <form class="row g-3" method="POST" action="{{ route('user.password') }}">
                  @csrf
                  @method('patch')
                  <!-- Current password -->
                  <div class="col-12">
                    <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                      <label for="current_password" class="col-md-4 control-label">現在のパスワード</label>
                      <div class="col-md-6">
                        <input id="current_password" type="password" class="form-control" name="current_password" required>
                        @if (session('error'))
                          <span class="help-block">
                            <strong>{{ session('error') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <!-- New password -->
                  <div class="col-12">
                    <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                      <label for="new_password" class="col-md-4 control-label">新しいパスワード</label>
                        <div class="col-md-6">
                          <input id="new_password" type="password" class="form-control" name="new_password" required>
                            @if ($errors->has('new_password'))
                              <span class="help-block">
                                <strong>{{ $errors->first('new_password') }}</strong>
                              </span>
                            @endif
                        </div>
                    </div>
                  </div>

                  <!-- Confirm password -->
                  <div class="col-12">
                    <div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
                      <label for="new_password-confirm" class="col-md-4 control-label">確認パスワード</label>
                      <div class="col-md-6">
                        <input id="new_password-confirm" type="password" class="form-control" name="new_password_confirmation" required>
                          @if ($errors->has('new_password_confirmation'))
                            <span class="help-block">
                              <strong>{{ $errors->first('new_password_confirmation') }}</strong>
                            </span>
                          @endif
                      </div>
                    </div>
                  </div>
                  <!-- Button  -->
                  <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary mb-0">パスワードを変更</button>
                  </div>
                </form>
                <!-- Settings END -->
              </div>
            </div>
            <!-- Card END -->
          </div>
          <!-- Account setting tab END -->
        </div>
        <!-- Setting Tab content END -->
      </div>
    </div> <!-- Row END -->
  </div>
  <!-- Container END -->
</main>
<!-- **************** MAIN CONTENT END **************** -->
@endsection