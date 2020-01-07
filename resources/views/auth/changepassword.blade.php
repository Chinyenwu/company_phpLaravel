@extends('layouts.member') 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <h1>這是密碼修改</h1>
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
        <!--<?php //var_dump(Auth::user()->name)?>-->
        <form method="post" action="{{ route('auth.store') }}">
          @csrf
          <div class="form-group" >
              <label for="name">帳號:</label>
              <input type="text" class="form-control" name="name" value={{Auth::user()->name}} >
          </div>          
          <div class="form-group">
              <label for="password">密碼:</label>
              <input type="password" class="form-control" name="password"  >
          </div>
          <div class="form-group">
              <label for="comfirm_password">確認密碼:</label>
              <input type="password" class="form-control" name="comfirm_password"  >
          </div>

        <button type="submit" class="btn btn-primary">更新</button>

        </form>
        </div>
    </div>
</div>

@endsection

