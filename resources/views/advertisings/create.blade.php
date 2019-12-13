@extends('layouts.app')

@section('content')

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">相簿</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('advertisings.store') }}">
          @csrf
          <div class="form-group">
              <label for="title">橫幅名稱:</label>
              <input type="text" class="form-control" name="title">
          </div>
     
          <div class="form-group">
              <label for="interval">轉換間隔:</label>
              <input type="text" class="form-control" name="interval">
          </div>

          <div class="form-group">
              <label for="speed">轉換速度:</label>
              <input type="text" class="form-control" name="speed">
          </div>

          <div class="form-group">
              <label for="height">橫幅高度:</label>
              <input type="text" class="form-control" name="height">
          </div>

          <div class="form-group">
              <label for="width">橫幅寬度:</label>
              <input type="text" class="form-control" name="width">
          </div>

          <div class="form-group">
              <label for="effect">橫幅效果:</label>
              <input type="text" class="form-control" name="effect">
          </div>
                    
          <button type="submit" class="btn btn-primary">新增相簿</button>
      </form>
  </div>

</div>
</div>
@endsection

