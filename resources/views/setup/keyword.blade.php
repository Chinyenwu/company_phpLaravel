@extends('layouts.setup')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>關鍵字設定</h1>
        <form method="post" action="" enctype="multipart/form-data">
            @method('PATCH') 
            @csrf

          <div class="form-group">
              <label for="website_head">Google分析碼:</label>
              <textarea id="website_head" class="form-control" name="website_head" ></textarea>
          </div>  

          <div class="form-group">
              <label for="website_head">網站關鍵字:</label>
              <textarea id="website_head" class="form-control" name="website_head" ></textarea>
          </div>    

          <div class="form-group">
              <label for="website_tail">網站描述:</label>
              <textarea id="website_tail" class="form-control" name="website_tail" ></textarea>
          </div>

          <button type="submit" class="btn btn-primary">更新</button>

        </form>
        </div>
    </div>
</div>
@endsection