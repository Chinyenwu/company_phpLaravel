@extends('layouts.member')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">新增類別</h1>
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
      <form method="post" action="{{ route('reserches.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">研究名字:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">    
              <label for="brief">簡介:</label>
              <input type="text" class="form-control" name="brief"/>
          </div>
          <div class="form-group">    
              <label for="all_editer">全部作者:</label>
              <input type="text" class="form-control" name="all_editer"/>
          </div>
          <div class="form-group">    
              <label for="year">年度:</label>
              <input type="text" class="form-control" name="year"/>
          </div>
          <div class="form-group">    
              <label for="type">種類:</label>
              <input type="text" class="form-control" name="type"/>
          </div> 
          <div class="form-group">    
              <label for="start_date">開始日期:</label>
              <input type="text" class="form-control" name="start_date"/>
          </div>                   
          <div class="form-group">    
              <label for="file">檔案名:</label>
              <input type="text" class="form-control" name="file"/>
          </div>
          <div class="form-group">    
              <label for="file_path">檔案路徑:</label>
              <input type="text" class="form-control" name="file_path"/>
          </div>  
          <div class="form-group">    
              <label for="website">網站:</label>
              <input type="text" class="form-control" name="website"/>
          </div>
          <div class="form-group">    
              <label for="language">語言:</label>
              <input type="text" class="form-control" name="language"/>
          </div>
          <div class="form-group">    
              <label for="remark">備註:</label>
              <input type="text" class="form-control" name="remark"/>
          </div> 
                     
          <button type="submit" class="btn btn-primary">新增</button>
      </form>
  </div>
</div>
</div>
@endsection