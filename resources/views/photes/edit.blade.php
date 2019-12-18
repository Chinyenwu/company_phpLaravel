@extends('layouts.app') 
@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">上傳照片</h1>

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
        <form method="post" action="{{ route('photes.update', $phote->id) }}" enctype="multipart/form-data">
            @method('PATCH') 
            @csrf

          <div class="form-group">
              <label for="class">類別:</label>
              <?php $phote_classes = DB::table('phote_classes')->get();?>
              <select class="form-control" name="class" >
                  <option value={{ $phote->class }} selected='selected'>{{ $phote->class }}</option>
                  @foreach($phote_classes as $phote_class)
                  <option value="{{$phote_class->class}}" >{{$phote_class->class}}</option>
                  @endforeach
              </select> 
          </div>   

          <div class="form-group">
              <label for="file">檔案:</label>
              <input type="file" class="form-control" name="file">
          </div> 

          <button type="submit" class="btn btn-primary">更新</button>

        </form>
    </div>
</div>
@endsection


