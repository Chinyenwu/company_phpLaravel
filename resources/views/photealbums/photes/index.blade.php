@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
  <h1 class="display-3">相片上傳</h1>  
        <form method="post"  enctype="multipart/form-data">
        @method('PATCH')
          @csrf
          <div class="form-group">
              <label for="file">相片:</label>
              <input type="file" class="form-control" name="file">
              <button type="submit" class="btn btn-primary">上傳照片</button>
          </div>     
      </form>  
  <div>
</div>
<!--<div>
  <?php //echo $photes->links(); ?>
</div>-->
@endsection