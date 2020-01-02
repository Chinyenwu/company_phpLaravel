@extends('layouts.setup')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>網站資訊</h1>
        <form method="post" action="" enctype="multipart/form-data">
            @method('PATCH') 
            @csrf

          <div class="form-group">
              <label for="title">網站標題:</label>
              <input type="text" class="form-control" name="title"  >
          </div>

          <div class="form-group">
              <label for="website_head">網站頁首:</label>
              <textarea id="website_head" class="form-control" name="website_head" ></textarea>
              <script>
                CKEDITOR.replace('website_head');
              </script>
          </div>    

          <div class="form-group">
              <label for="website_tail">網站頁尾:</label>
              <textarea id="website_tail" class="form-control" name="website_tail" ></textarea>
              <script>
                CKEDITOR.replace('website_tail');
              </script>
          </div>

          <button type="submit" class="btn btn-primary">更新</button>

        </form>
        </div>
    </div>
</div>
@endsection