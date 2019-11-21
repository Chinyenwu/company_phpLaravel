@extends('layouts.app') 
@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">編輯公告</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('imformations.update', $imformation->id) }}">
            @method('PATCH') 
            @csrf

          <div class="form-group">
              <label for="class">類別:</label>
              <?php $imformation_classes = DB::table('imformation_classes')->get();?>
              <select class="form-control" name="class" >
                  <option value={{ $imformation->class }} selected='selected'>{{ $imformation->class }}</option>
                  @foreach($imformation_classes as $imformation_class)
                  <option value="{{$imformation_class->class}}" >{{$imformation_class->class}}</option>
                  @endforeach
              </select> 
          </div>

          <div class="form-group">    
              <label for="start_date">開始日期:</label>
              <input type="date" class="form-control" name="start_date" value={{ $imformation->start_date }} >
          </div>

          <div class="form-group">
              <label for="end_date">結束日期:</label>
              <input type="date" class="form-control" name="end_date" value={{ $imformation->end_date}} >
          </div>

          <div class="form-group">
              <label for="title">標題:</label>
              <input type="text" class="form-control" name="title" value={{ $imformation->title }} >
          </div>

          <div class="form-group">
              <label for="second_title">副標題:</label>
              <input type="text" class="form-control" name="second_title" value={{ $imformation->second_title }} >
          </div>

          <div class="form-group">
              <label for="website">網站:</label>
              <input type="text" class="form-control" name="website" value={{ $imformation->website }} >
          </div>

          <div class="form-group" style="display:none">
              <label for="person" >編輯人:</label>
              <input type="text" class="form-control" name="person" value={{ Auth::user()->name }} >
          </div>

          <div class="form-group">
              <label for="context">內文:</label>
              <textarea id="context"  name="context" >{{ $imformation->context }}</textarea>
              <script>
                CKEDITOR.replace('context');
              </script>
          </div>    
 

            <button type="submit" class="btn btn-primary">更新</button>

        </form>
    </div>
</div>
@endsection


