@extends('layouts.app')
@section('content')

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 >新增公告</h1>
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
      <form method="post" action="{{ route('imformations.store') }}" enctype="multipart/form-data">
          
          @csrf
          <div class="form-group">
              <label for="class">類別:</label>
              <!--<input type="text" class="form-control" name="class"/>-->
              <?php $imformation_classes = DB::table('imformation_classes')->get();?>
              <select class="form-control" name="class" >
                  @foreach($imformation_classes as $imformation_class)
                  <option value="{{$imformation_class->class}}">{{$imformation_class->class}}</option>
                  @endforeach
              </select>    
          </div>

          <div class="form-group">    
              <label for="start_date">開始日期:</label>
              <input type="date" class="form-control" name="start_date" value = "{{date('Y-m-d')}}">
          </div>

          <div class="form-group">
              <label for="end_date">結束日期:</label>
              <input type="date" class="form-control" name="end_date" value = "{{date('Y-m-d', strtotime('+1 year'))}}">
          </div>

          <div class="form-group">
              <label for="title">標題:</label>
              <input type="text" class="form-control" name="title">
          </div>

          <div class="form-group">
              <label for="second_title">副標題:</label>
              <input type="text" class="form-control" name="second_title">
          </div>

          <div class="form-group">
              <label for="website">網站:</label>
              <input type="text" class="form-control" name="website">
          </div>

          <div class="form-group" style="display:none">
              <label for="person">編輯人:</label>
              <input type="text" class="form-control" name="person" value="{{ Auth::user()->name }}">
          </div>

          <div class="form-group">
              <label for="context">內文:</label>
              <textarea id="context"  name="context"></textarea>
              <script>
              CKEDITOR.replace( "context" );
              </script>
          </div>   

          <div class="form-group">
              <label for="file">檔案:</label>
              <input type="file" class="form-control" name="file">
          </div>  

          <button type="submit" class="btn btn-primary">新增公告</button>
      </form>
  </div>

</div>
</div>
@endsection

