@extends('layouts.member')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">期刊編輯</h1>
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
      <form method="post" action="{{ route('seminars.update',$seminar->id) }}">
          @method('PATCH')
          @csrf
          <div class="form-group">    
              <label for="speech_name">論文名稱:</label>
              <input type="text" class="form-control" name="speech_name" value={{ $journal->speech_name}} />
          </div>
          <div class="form-group">    
              <label for="meeting_name">會議名稱:</label>
              <input type="text" class="form-control" name="journal_name" value={{ $journal->meeting_name}}/>
          </div>
          <div class="form-group">    
              <label for="position">地點:</label>
              <input type="text" class="form-control" name="journal_name" value={{ $journal->position}}/>
          </div>
          <div class="form-group">    
              <label for="agency ">機構:</label>
              <input type="text" class="form-control" name="agency " value={{ $journal->agency }}/>
          </div>
          <div class="form-group">    
              <label for="all_editer">所有作者:</label>
              <input type="text" class="form-control" name="all_editer" value={{ $journal->all_editer}}/>
          </div>
            <div class="form-group">    
              <label for="year">年度:</label>
              <input type="text" class="form-control" name="year" value={{ $journal->year}}/>
          </div>
          <div class="form-group">    
              <label for="type">類別:</label>
              <input type="text" class="form-control" name="type" value={{ $journal->type}}/>
          </div>
          <div class="form-group">    
              <label for="level">等級:</label>
              <input type="text" class="form-control" name="level" value={{ $journal->level}}/>
          </div>   
          <div class="form-group">    
              <label for="start_date">起始日期:</label>
              <input type="text" class="form-control" name="start_date" value={{ $journal->start_date}}/>
          </div>
            <div class="form-group">    
              <label for="end_date">結束日期:</label>
              <input type="text" class="form-control" name="end_date" value={{ $journal->end_date}}/>
          </div>
          <div class="form-group">    
              <label for="publish_year">發表年度:</label>
              <input type="text" class="form-control" name="page" value={{$journal->publish_year}}/>
          </div>  
          <div class="form-group">    
              <label for="editer_number">作者人數:</label>
              <input type="text" class="form-control" name="editer_number" value={{$journal->editer_number}}/>
          </div>   
          <div class="form-group">    
              <label for="editer_type">作者類別:</label>
              <input type="text" class="form-control" name="editer_type" value={{$journal->editer_type}}/>
          </div>
          <div class="form-group">    
              <label for="ISSN">ISSN:</label>
              <input type="text" class="form-control" name="ISSN" value={{$journal->ISSN}}/>
          </div>
            <div class="form-group">    
              <label for="ISI_Number">ISI_Number:</label>
              <input type="text" class="form-control" name="ISI_Number" value={{$journal->ISI_Number}}/>
          </div>
          <div class="form-group">    
              <label for="file">檔案名稱:</label>
              <input type="text" class="form-control" name="file" value={{$journal->file}}/>
          </div>
          <div class="form-group">    
              <label for="file_path">檔案路徑:</label>
              <input type="text" class="form-control" name="file_path" value={{$journal->file_path}}/>
          </div>
          <div class="form-group">    
              <label for="website">網站:</label>
              <input type="text" class="form-control" name="website" value={{$journal->website}}/>
          </div>
            <div class="form-group">    
              <label for="language">語言:</label>
              <input type="text" class="form-control" name="language" value={{$journal->language}}/>
          </div> 
          <div class="form-group">    
              <label for="remark">備註:</label>
              <input type="text" class="form-control" name="remark" value={{$journal->remark}}/>
          </div> 
                     
          <button type="submit" class="btn btn-primary">新增</button>
      </form>
  </div>
</div>
</div>
@endsection