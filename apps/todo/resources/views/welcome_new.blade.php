@extends('layouts.app')

@section('content')
<section class="pt-5 pb-0 position-relative">
    <!-- Container START -->
    <div class="container">
        <!-- Row START -->
        <div class="row text-center position-relative z-index-1">
            <div class="col-lg-7 mt-5 mx-auto text-center">
                <!-- Heading -->
                <h1 class="display-3">Welcome to more</h1>
                <p class="lead">あなたの「楽しい」が残せるSNSダイアリー<br>今この瞬間に題名をつけるなら？</p>
                <div class="d-sm-flex justify-content-center">
                    <!-- button -->
                    <a class="btn btn-primary" href="{{ route('register') }}">はじめる</a>
                </div>
            </div>
        </div>
        <div class="col-lg-5 mx-auto mt-5">
            <!-- Chat START -->
            <div class=" d-lg-block">
                <!-- Chat item -->
                <div class="bg-mode border p-3 rounded-3 d-flex align-items-center mb-3">
                    <!-- Avatar -->
                    <div class="avatar avatar-xs me-3">
                        <a href="#!"> <img class="avatar-img rounded-circle" src="{{asset('images/kishimoto.jpg')}}" alt=""> </a>
                    </div>
                    <!-- Comment box  -->
                    <div class="d-flex">
                        <h6 class="mb-0 ">その日の感情を記録しよう </h6>
                        <span class="ms-2">🎂</span>
                    </div>
                </div>
                <!-- Chat item -->
                <div class="bg-mode border p-3 rounded-3 d-flex align-items-center mb-3">
                    <!-- Avatar -->
                    <div class="avatar avatar-xs me-3">
                        <a href="#!"> <img class="avatar-img rounded-circle" src="{{asset('images/iwakiri.jpg')}}" alt=""> </a>
                    </div>
                    <!-- Comment box  -->
                    <div class="d-flex">
                        <h6 class="mb-0 ">ストーリー機能で気軽に投稿 </h6>
                        <span class="ms-2">🤘</span>
                    </div>
                </div>
                <!-- Chat item -->
                <div class="bg-mode border p-3 rounded-3 d-flex align-items-center mb-3">
                    <!-- Avatar -->
                    <div class="avatar avatar-xs me-3">
                        <a href="#!"> <img class="avatar-img rounded-circle" src="{{asset('images/naruse.JPG')}}" alt=""> </a>
                    </div>
                    <!-- Comment box  -->
                    <div class="d-flex">
                        <h6 class="mb-0 ">友達と日記の共有もできる </h6>
                        <span class="ms-2">🖌</span>
                    </div>
                </div>
            </div>
            <!-- Chat END -->
        </div>
    </div> 
    <!-- Container END -->
</section>
@endsection