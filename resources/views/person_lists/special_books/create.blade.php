@extends('layouts.member')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">新增專書</h1>
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
      <form method="post" action="{{ route('special_books.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">書名:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">    
              <label for="chapter">章節:</label>
              <input type="text" class="form-control" name="chapter"/>
          </div>
          <div class="form-group">    
              <label for="main_editer">主編:</label>
              <input type="text" class="form-control" name="main_editer"/>
          </div>
          <div class="form-group">    
              <label for="publish_club">出版社:</label>
              <input type="text" class="form-control" name="publish_club"/>
          </div>
          <div class="form-group">    
              <label for="publish_position">發表地點:</label>
              <input type="text" class="form-control" name="publish_position"/>
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
              <label for="date">類別:</label>
              <input type="text" class="form-control" name="date"/>
          </div>
          <div class="form-group">    
              <label for="page">等級:</label>
              <input type="text" class="form-control" name="page"/>
          </div>
          <div class="form-group">    
              <label for="editer_number">作者人數:</label>
              <input type="text" class="form-control" name="editer_number"/>
          </div>
          <div class="form-group">    
              <label for="editer_type">作者種類:</label>
              <input type="text" class="form-control" name="editer_type"/>
          </div>
          <div class="form-group">    
              <label for="ISSN">ISSN:</label>
              <input type="text" class="form-control" name="ISSN"/>
          </div>
          <div class="form-group">    
              <label for="ISI_Number">ISI_Number:</label>
              <input type="text" class="form-control" name="ISI_Number"/>
          </div>  
          <div class="form-group">    
              <label for="file">檔案名稱:</label>
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
              <label for="project_name">專案名稱:</label>
              <input type="text" class="form-control" name="project_name"/>
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