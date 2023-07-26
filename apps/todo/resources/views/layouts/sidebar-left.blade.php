{{$slot}}
  <div class="col-lg-3">
    <!-- Advanced filter responsive toggler START -->
    <div class="d-flex align-items-center d-lg-none">
      <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
        <i class="btn btn-primary fw-bold fa-solid fa-sliders-h"></i>
        <span class="h6 mb-0 fw-bold d-lg-none ms-2">プロフィール</span>
      </button>
    </div>
    <!-- Advanced filter responsive toggler END -->
    <!-- Navbar START-->
    <nav class="navbar navbar-expand-lg mx-0"> 
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSideNavbar">
        <!-- Offcanvas header -->
        <div class="offcanvas-header">
          <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <!-- Offcanvas body -->
        <div class="offcanvas-body d-block px-2 px-lg-0">
          <!-- Card START -->
          <div class="card overflow-hidden">
            <!-- Cover image -->
            <div class="h-50px" style="background-image:url(assets/images/bg/01.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
              <!-- Card body START -->
              <div class="card-body pt-0">
                <div class="text-center">
                <!-- Avatar -->
                <div class="avatar avatar-lg mt-n5 mb-3">
                  <a href="#!">
                    @if(is_null($user->image))
                    <img class="avatar-img rounded-circle" src="{{asset('images/noimage.png')}}" alt="avatar">
                   @else
                    <img class="avatar-img rounded-circle" src="data:image/png;base64,{{ Auth::user()->image }}" alt="avatar">
                   @endif
                  </a>
                </div>
                <!-- Info -->
                <h5 class="mb-0"> <a href="{{route('user.home',['name' => Auth::user()->user_id])}}">{{ '@'.$user->user_id }} </a> </h5>
                <small>{{ $user->name }}</small>
                <p class="mt-3">{{ $user->overview }}</p>

                <!-- User stat START -->
                <div class="hstack gap-2 gap-xl-3 justify-content-center">
                  <!-- User stat item -->
                  <div>
                    <a href="{{route('user.home',['id' => Auth::user()->user_id])}}">
                    <h6 class="mb-0">{{ $user->articles->count() }}</h6>
                    <small>投稿</small>
                    </a>
                  </div>
                  <!-- Divider -->
                  <div class="vr"></div>
                  <!-- User stat item -->
                  <div>
                    <a href="{{route('user.follower',['id' => Auth::user()->user_id])}}">
                    <h6 class="mb-0">{{ $user->followers->count() }}</h6>
                    <small>フォロワー</small>
                    <a>
                  </div>
                  <!-- Divider -->
                  <div class="vr"></div>
                  <!-- User stat item -->
                  <div>
                    <a href="{{route('user.follow',['id' => Auth::user()->user_id])}}">
                    <h6 class="mb-0">{{ $user->follows->count() }}</h6>
                    <small>フォロー</small>
                    </a>
                  </div>
                </div>
                <!-- User stat END -->
              </div>
              <!-- Divider -->
              <hr>
              <!-- Side Nav START -->
              <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('article.index') }}"> <img class="me-2 h-20px fa-fw" src="{{ asset('images/icon/home-outline-filled.svg') }}" alt=""><span>ホーム</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#!"　data-bs-toggle="modal" data-bs-target="#modalCreateFeed"> <img class="me-2 h-20px fa-fw" src="{{ asset('images/icon/paper-rocket-outline-filled.svg') }}" alt=""><span>投稿</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('user.setting',['name' => Auth::user()->user_id])}}"> <img class="me-2 h-20px fa-fw" src="{{ asset('images/icon/cog-outline-filled.svg') }}" alt=""><span>設定</span></a>
                </li>
              </ul>
              <!-- Side Nav END -->
            </div>
            <!-- Card body END -->
          </div>
          <!-- Card END -->
          <!-- Card News START -->
    <div class="card mt-3">
      <!-- Card header START -->
      <div class="card-header pb-0 border-0">
        <h5 class="card-title ">カテゴリ</h5>
      </div>
      <!-- Card header END -->
      <!-- Card body START -->
      <div class="card-body">
        <!-- News item -->
        <div class="mb-3">
          <a class="nav-link" href="my-profile.html"> 
          <h6 class="mb-0"><a href="{{ route('article.category',['id'=>1]) }}"><img class="me-2 h-20px fa-fw" src="{{ asset('images/icon/star-curved-outline-filled.svg') }}" alt="">総合</a></h6>
          <small></small>
        </div>
        <!-- News item -->
        <div class="mb-3">
          <h6 class="mb-0"><a href="{{ route('article.category',['id'=>2]) }}"><img class="me-2 h-20px fa-fw" src="{{ asset('images/icon/calendar-outline-filled.svg') }}" alt="">日常</a></h6>
          <small></small>
        </div>
        <!-- News item -->
        <div class="mb-3">
          <h6 class="mb-0"><a href="{{ route('article.category',['id'=>3]) }}"><img class="me-2 h-20px fa-fw" src="{{ asset('images/icon/handshake-outline-filled.svg') }}" alt="">仕事</a></h6>
          <small></small>
        </div>
        <!-- News item -->
        <div class="mb-3">
          <h6 class="mb-0"><a href="{{ route('article.category',['id'=>4]) }}"><img class="me-2 h-20px fa-fw" src="{{ asset('images/icon/chat-outline-filled.svg') }}" alt="">恋愛</a></h6>
          <small></small>
        </div>
        <!-- News item -->
        <div class="mb-3">
          <h6 class="mb-0"><a href="{{ route('article.category',['id'=>5]) }}"><img class="me-2 h-20px fa-fw" src="{{ asset('images/icon/bookmark-open-outline-filled.svg') }}" alt="">学校</a></h6>
          <small></small>
        </div>
      </div>
      <!-- Card body END -->

    </div>
          <!-- Copyright -->
          <p class="small text-center mt-1">©2022 <a class="text-body" target="_blank" href="#"> Team amore </a></p>
        </div>
      </div>
    </nav>
    <!-- Navbar END-->
  </div>
