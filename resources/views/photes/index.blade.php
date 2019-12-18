@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
  <h1 class="display-3">相簿</h1>    
  <a href="{{ route('photes.create')}}" class="btn btn-primary">新增</a>
  <div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>id</td>
          <td>屬於</td>
          <td>名子</td>
          <td>功能</td>
        </tr>
    </thead>
    <tbody>
        @foreach($photes as $phote)
        <tr>
            <td>{{$phote->id}}</td>
            <td>{{$phote->belong}}</td>
            <td>{{$phote->name}}</td>
            <td>
                <form action="{{ route('photes.destroy', $phote->id)}}" method="post">
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
  <?php echo $photes->links(); ?>
</div>
@endsection