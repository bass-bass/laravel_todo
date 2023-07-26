<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kita') }}</title>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/delete/alert.js') }}" defer></script>
    
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/style-dark.css') }}"> --}}

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">


</head>
<body>
    <div id="app">
        <header class="navbar-light header-static bg-mode">
	    <!-- Logo Nav START -->
	    <nav class="navbar navbar-expand-lg">
		<div class="container">
			<!-- Logo START -->
			<a class="navbar-brand" href="{{ url('/') }}">
				<img class="light-mode-item navbar-brand-item" src="/more_logo.png" alt="logo">
			</a>
			<!-- Logo END -->
            @guest
                <div class="ms-3 ms-lg-auto">
                <a class="btn btn-dark" href="{{ route('login') }}">{{ __('ログイン') }}</a>
            </div>
            @else
            <!-- Responsive navbar toggler -->
            <button class="navbar-toggler ms-auto icon-md btn btn-light p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-animation">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>
			<!-- Nav right START -->
			<ul class="nav flex-nowrap align-items-center ms-sm-3 list-unstyled">
                <!-- Main navbar START -->
			    <div class="collapse navbar-collapse" id="navbarCollapse">
                    <!-- Nav Search START -->
                    <div class="nav mt-3 mt-lg-0 flex-nowrap align-items-center px-4 px-lg-0">
                        <div class="nav-item w-100">
                            <form class="rounded position-relative"　method="get" action="{{ route('article.search') }}">
                                <input class="form-control ps-5 bg-light" type="search"　name="keyword" placeholder="キーワードを入力" aria-label="Search" required>
                                <button class="btn bg-transparent px-2 py-0 position-absolute top-50 start-0 translate-middle-y" type="submit"><i class="bi bi-search fs-5"> </i></button>
                            </form>
                        </div>
                    </div>
                    <!-- Nav Search END -->
			    </div>
			    <!-- Main navbar END -->
				<li class="nav-item ms-2">
					<a class="nav-link icon-md btn btn-light p-0"　href="#!" data-bs-toggle="modal" data-bs-target="#modalCreateFeed">
						<i class="bi bi-chat-left-text-fill fs-6"> </i>
					</a>
				</li>
                <li class="nav-item ms-2">
					<a class="nav-link icon-md btn btn-light p-0" href="{{ route('user.setting',['name' => Auth::user()->user_id]) }}">
						<i class="bi bi-gear-fill fs-6"> </i>
					</a>
				</li>

                <li class="nav-item ms-2 dropdown">
					<a class="nav-link btn icon-md p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                        @if(is_null(Auth::user()->image))
                         <img class="avatar-img rounded-2" src="{{asset('images/noimage.png')}}" alt="avatar">
                        @else
                         <img class="avatar-img rounded-2" src="data:image/png;base64,{{ Auth::user()->image }}" alt="avatar">
                        @endif
					</a>
                    <ul class="dropdown-menu dropdown-animation dropdown-menu-end pt-3 small me-md-n3" aria-labelledby="profileDropdown">
                        <!-- Profile info -->
                        <li class="px-3">
                            <div class="d-flex align-items-center position-relative">
                                <!-- Avatar -->
                                <div class="avatar me-3">
                                    @if(is_null(Auth::user()->image))
                                    <img class="avatar-img rounded-circle" src="{{asset('images/noimage.png')}}" alt="avatar">
                                   @else
                                    <img class="avatar-img rounded-circle" src="data:image/png;base64,{{ Auth::user()->image }}" alt="avatar">
                                   @endif
                                </div>
                                <div>
                                    <a class="h6 stretched-link" href="#">{{ Auth::user()->name }}</a>
                                    <p class="small m-0">{{ '@'.Auth::user()->user_id }}</p>
                                </div>
                            </div>
                            <a class="dropdown-item btn btn-primary-soft btn-sm my-2 text-center" href="{{ route('user.home',['user_id' => Auth::user()->user_id]) }}">View profile</a>
                        </li>
                        <!-- Links -->
                        <li><a class="dropdown-item" href="{{ route('article.index') }}"><i class="bi bi-house-door fa-fw me-2"></i>ホーム</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.setting',['name' => Auth::user()->user_id]) }}"><i class="bi bi-gear fa-fw me-2"></i>設定</a></li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item bg-danger-soft-hover" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="bi bi-door-open fa-fw me-2"></i>{{ __('ログアウト') }}</a></li>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
				</li>
			</ul>
            @endguest
			<!-- Nav right END -->
		</div>
	    </nav>
	    <!-- Logo Nav END -->
        </header>
        <main class="py-4">
            <!-- ログウインユーザーの時modal読み込み -->
            @auth
            @component('layouts.modal_create')
            @endcomponent
            @endauth

            @yield('content')
        </main>
    </div>

<!-- Bootstrap JS -->
<script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js')}}"></script>


</body>
</html>


