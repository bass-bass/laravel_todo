
<div class="col-lg-3">
  <div class="row g-4">
    <!-- Card follow START -->
    <div class="col-sm-6 col-lg-12">
      <div class="card">
       <!-- Card header START -->
       <div class="card-header pb-0 border-0">
        <h5 class="card-title mb-0">ユーザーランキング</h5>
      </div>
      <!-- Card header END -->
      <!-- Card body START -->
      <div class="card-body">


        <!-- Connection item START -->
        <div class="hstack gap-2 mb-3">

          <!-- Avatar -->
          <div class="avatar">
            <a href="#!"><img class="avatar-img rounded-circle" src="{{ Storage::url('uploads/hattori.png') }}" alt=""></a>
          </div>
          <!-- Title -->
          <div class="overflow-hidden">
            <a class="h6 mb-0" href="#!">Tsukasa Hattori </a>
            <p class="mb-0 small text-truncate">CRAID Inc. CEO</p>
          </div>
          <!-- Button -->
          <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i class="fa-solid fa-plus"> </i></a>
        </div>
        <!-- Connection item END -->

        <!-- Connection item START -->
        <div class="hstack gap-2 mb-3">

          <!-- Avatar -->
          <div class="avatar">
            <a href="#!"><img class="avatar-img rounded-circle" src="{{ Storage::url('uploads/hattori.png') }}" alt=""></a>
          </div>
          <!-- Title -->
          <div class="overflow-hidden">
            <a class="h6 mb-0" href="#!">Tsukasa Hattori </a>
            <p class="mb-0 small text-truncate">CRAID Inc. CEO</p>
          </div>
          <!-- Button -->
          <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i class="fa-solid fa-plus"> </i></a>
        </div>
        <!-- Connection item END -->

        <!-- Connection item START -->
        <div class="hstack gap-2 mb-3">

          <!-- Avatar -->
          <div class="avatar">
            <a href="#!"><img class="avatar-img rounded-circle" src="{{ Storage::url('uploads/hattori.png') }}" alt=""></a>
          </div>
          <!-- Title -->
          <div class="overflow-hidden">
            <a class="h6 mb-0" href="#!">Tsukasa Hattori </a>
            <p class="mb-0 small text-truncate">CRAID Inc. CEO</p>
          </div>
          <!-- Button -->
          <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i class="fa-solid fa-plus"> </i></a>
        </div>
        <!-- Connection item END -->
      </div>
      <!-- Card body END -->
    </div>
  </div>
  <!-- Card News START -->
  <div class="col-sm-6 col-lg-12">
    <div class="card">
      <!-- Card header START -->
      <div class="card-header pb-0 border-0">
        <h5 class="card-title mb-0">カテゴリ別ランキング</h5>
      </div>
      <!-- Card header END -->
      <!-- Card body START -->
      <div class="card-body">
        <!-- News item -->
        <div class="mb-3">
          <a class="nav-link" href="my-profile.html"> 
          <h6 class="mb-0"><a href="blog-details.html"><img class="me-2 h-20px fa-fw" src="{{Storage::url('uploads/runk1.png') }}" alt="">総合</a></h6>
          <small></small>
        </div>
        <!-- News item -->
        <div class="mb-3">
          <h6 class="mb-0"><a href="blog-details.html"><img class="me-2 h-20px fa-fw" src="{{Storage::url('uploads/runk2.png') }}" alt="">日常</a></h6>
          <small></small>
        </div>
        <!-- News item -->
        <div class="mb-3">
          <h6 class="mb-0"><a href="blog-details.html"><img class="me-2 h-20px fa-fw" src="{{Storage::url('uploads/runk2.png') }}" alt="">恋愛</a></h6>
          <small></small>
        </div>
        <!-- News item -->
        <div class="mb-3">
          <h6 class="mb-0"><a href="blog-details.html"><img class="me-2 h-20px fa-fw" src="{{Storage::url('uploads/runk3.png') }}" alt="">仕事</a></h6>
          <small></small>
        </div>
        <!-- News item -->
        <div class="mb-3">
          <h6 class="mb-0"><a href="blog-details.html"><img class="me-2 h-20px fa-fw" src="{{Storage::url('uploads/runk2.png') }}" alt="">学校</a></h6>
          <small></small>
        </div>
      </div>
      <!-- Card body END -->

    </div>
  </div>
  <!-- Card News END -->

  </div>
  {{$slot}}
</div>
