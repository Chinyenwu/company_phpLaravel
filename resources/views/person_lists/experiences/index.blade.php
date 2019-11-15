@extends('layouts.member')

@section('content')
<div class="row">
<div class="col-sm-12">
  <h1 class="display-3">經歷</h1>   
    <div>
    <a style="margin: 19px;" href="{{ route('experiences.create')}}" class="btn btn-primary">新增活動</a>
    </div>  
  <div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>id</td>
          <td>標題</td>
        </tr>
    </thead>
    <tbody>
        @foreach($experiences as $experience)
        <tr>
            <td>{{$experience->id}}</td>
            <td>{{$experience->angency_name}}</td>
            <td>
                <a href="{{ route('experiences.edit',$experience->id)}}" class="btn btn-primary">編輯</a>
            </td>
            <td>
                <form action="{{ route('experiences.destroy', $experience->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">刪除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
<div>

</div>
@endsection