@extends('layouts.member')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">新增經驗</h1>
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
      <form method="post" action="{{ route('experiences.store') }}">
          @csrf
          <div class="form-group">    
              <label for="angency_name">機構名字:</label>
              <input type="text" class="form-control" name="angency_name"/>
          </div>
          <div class="form-group">    
              <label for="agency">機構:</label>
              <input type="text" class="form-control" name="agency"/>
          </div>
          <div class="form-group">    
              <label for="job_name">工作:</label>
              <input type="text" class="form-control" name="job_name"/>
          </div>
          <div class="form-group">    
              <label for="start_date">起始日期:</label>
              <input type="text" class="form-control" name="start_date"/>
          </div>
          <div class="form-group">    
              <label for="end_date">結束日期:</label>
              <input type="text" class="form-control" name="end_date"/>
          </div>           
          <div class="form-group">    
              <label for="website">網站:</label>
              <input type="text" class="form-control" name="website"/>
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