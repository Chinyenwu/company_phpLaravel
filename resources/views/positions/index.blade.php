@extends('layouts.member')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">職務類別</h1>  
    <div>
    <a style="margin: 19px;" href="{{ route('positions.create')}}" class="btn btn-primary">新增頁面類別</a>
    <input id="class" type="radio"  name="class" value="{{ '教師' }}" >教師
    <input id="class" type="radio"  name="class" value="{{ '行政人員' }}" >行政人員
    </div>   
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>職務類別</td>
          <td>職務名稱</td>
        </tr>
    </thead>
    <tbody>
        @foreach($positions as $position)
        <tr>
            <td>{{$position->id}}</td>
            <td>{{$position->class}}</td>
            <td>{{$position->position}}</td>
            <td>
                <a href="{{ route('positions.edit',$position->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('positions.destroy', $position->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>

</div>
@endsection

