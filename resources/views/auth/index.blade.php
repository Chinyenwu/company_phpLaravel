@extends('layouts.member')

@section('content')
<div class="row">
<div class="col-sm-12">
  <h1 class="display-3">成員列表</h1>    
  <div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>id</td>
          <td>帳號</td>
          <td>姓名</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->first_name}}</td>
            <td>
                <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">編輯</a>
            </td>
            <td>
                <form action="{{ route('users.destroy', $user->id)}}" method="post">
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
@endsection
