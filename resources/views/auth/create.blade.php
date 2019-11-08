@extends('layouts.member') 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <h1>這是個人頁面</h1>
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
        <form method="post" action="{{ route('auth.store', $user->Auth::user()->name) }}">
            @method('PATCH') 
            @csrf
          <div class="form-group">
              <label for="first_name">姓:</label>
              <input type="text" class="form-control" name="first_name" value={{ $user->first_name }} />
          </div>

          <div class="form-group">
              <label for="last_name">名:</label>
              <input type="text" class="form-control" name="last_name" value={{ $user->last_name }} />
          </div>

          <div class="form-group">
              <label for="email">信箱:</label>
              <input type="text" class="form-control" name="email" value={{ $user->email }} />
          </div>

          <div class="form-group">
              <label for="staff_number">員編標號:</label>
              <input type="text" class="form-control" name="staff_number" value={{ $user->staff_number }} />
          </div>

          <div class="form-group">
              <label for="contact_phone">連絡電話:</label>
              <input type="text" class="form-control" name="contact_phone" value={{ $user->contact_phone }} />
          </div>

          <div class="form-group">
              <label for="contact_phone">連絡電話:</label>
              <input type="text" class="form-control" name="contact_phone" value={{ $user->contact_phone }} />
          </div>

          <div class="form-group">
              <label for="fax">傳真:</label>
              <input type="text" class="form-control" name="fax" value={{ $user->fax }} />
          </div>

          <div class="form-group">
              <label for="cell_phone">手機:</label>
              <input type="text" class="form-control" name="cell_phone" value={{ $user->cell_phone }} />
          </div>

          <div class="form-group">
              <label for="gender">性別:</label>
              <input type="text" class="form-control" name="gender" value={{ $user->gender }} />
          </div>

          <div class="form-group">
              <label for="birthday">生日:</label>
              <input type="date" class="form-control" name="birthday" value={{ $user->birthday}} />
          </div>  
 
          <div class="form-group">
              <label for="contact_address">住址:</label>
              <input type="text" class="form-control" name="contact_address" value={{ $user->contact_address }} />
          </div>

          <div class="form-group">
              <label for="class">職務類別:</label>
              <input type="text" class="form-control" name="class" value={{ $user->class}} />
          </div>

          <div class="form-group">
              <label for="position">職稱:</label>
              <input type="text" class="form-control" name="position" value={{ $user->position }} />
          </div> 

            <button type="submit" class="btn btn-primary">更新</button>

        </form>
        </div>
    </div>
</div>

@endsection
