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
    <!--<a style="margin: 19px;" href="{{ route('imformations.create')}}" class="btn btn-primary">新增公告</a>-->
  <table class="table table-striped">
    <thead>
        <tr>
          <td>id</td>
          <td>類別</td>
          <td>開始日期</td>
          <td>結束日期</td>
          <td>標題</td>
          <td>最後修改人</td>
        </tr>
    </thead>
    <tbody>
        @foreach($imformations as $imformation)
        <tr>
            <td>{{$imformation->id}}</td>
            <td>{{$imformation->class}}</td>
            <td>{{$imformation->start_date}}</td>
            <td>{{$imformation->end_date}}</td>
            <td>{{$imformation->title}}</td>
            <td>{{$imformation->person}}</td>
            <td>
                <a href="{{ route('imformations.edit',$imformation->id)}}" class="btn btn-primary">編輯</a>
            </td>
            <td>
                <form action="{{ route('imformations.destroy', $imformation->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">刪除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <div>
    <?php echo $imformations->links(); ?>
  </div>
@endsection