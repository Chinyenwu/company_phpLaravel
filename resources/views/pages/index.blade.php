@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
  <h1 class="display-3">公告</h1>    
<!--<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>-->
    <div>
    <!--<a style="margin: 19px;" href="{{ route('pages.create')}}" class="btn btn-primary">新增公告</a>-->
  <table class="table table-striped">
    <thead>
        <tr>
          <td>id</td>
          <td>類別</td>
          <td>標題</td>
          <td>最後修改人</td>
          <td>修改日期</td>
        </tr>
    </thead>
    <tbody>
        @foreach($pages as $page)
        <tr>
            <td>{{$page->id}}</td>
            <td>{{$page->class}}</td>
            <td>{{$page->title}}</td>
            <td>{{$page->editer}}</td>
            <td>{{$page->edit_time}}</td>
            <td>
                <a href="{{ route('pages.edit',$page->id)}}" class="btn btn-primary">編輯</a>
            </td>
            <td>
                <form action="{{ route('pages.destroy', $page->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">刪除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection