{{$slot}}
<form method="post" action="{{ route('article.update',['id' => $article->id]) }}" enctype="multipart/form-data">
      @csrf
      @method('patch')
  <!-- Modal create Feed START -->
  <div class="modal fade" id="modalEditFeed" tabindex="-1" aria-labelledby="modalLabelEditFeed" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <!-- Modal feed header START -->
      <div class="modal-header">
      <!-- Avatar -->
      <div class="avatar avatar-xs me-2">
        @if(is_null(Auth::user()->image))
        <img class="avatar-img rounded-circle" src="{{asset('images/noimage.png')}}" alt="avatar">
       @else
        <img class="avatar-img rounded-circle" src="data:image/png;base64,{{ Auth::user()->image }}" alt="avatar">
       @endif
      </div>
        <h5 class="modal-title" id="modalLabelEditFeed">日記</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="w-100">
          <input type="text" name="title" class="form-control" placeholder="タイトルを入力してください" value="{{ old('title',$article->title)}}">
      </div>
      <!-- Modal feed header END -->

      <!-- Modal feed body START -->
      <div class="modal-body">
         <!-- Add Feed -->
         <div class="d-flex mb-3">
          <!-- Feed box  -->
          <div class="w-100">
            <textarea id="text-update" class="form-control pe-4 fs-3 lh-1 border-0" name="content" rows="4" placeholder="どんなことがありました？😁" autofocus>{{ old('content',$article->content)}}</textarea>
          </div>
        </div>
      </div>
      <!-- Modal feed body END -->

      <!-- Modal feed footer -->
      <div class="modal-footer row justify-content-between">
        <!-- Select -->
        <div class="col-lg-3">
          <select class="form-select js-choice choice-select-text-none" name= "status" data-position="top" data-search-enabled="false" id="select-box">
            <option value="1">公開</option>
            <option value="2">友達</option>
            <option value="3">非公開</option>
          </select>
        </div>
        <div class="col-lg-3 mr-auto">
          <select class="form-select" aria-label="Default select example" name= "category_id" id="categoryselect-box">
            <option value="1">総合</option>
            <option value="2">日常</option>
            <option value="3">仕事</option>
            <option value="4">恋愛</option>
            <option value="5">学校</option>
          </select>
        </div>
        <div class="row ml-auto mr-3 mb-3">
          <div class="col-lg-4 text-sm-end">
            <button type="submit" name="post" class="btn btn-success-soft" id="update-submit">編集する</button>
          </div>
        </div>
      <!-- Modal feed footer -->
    </div>
  </div>
  </div>
  </form>
  <!-- Modal create feed END -->