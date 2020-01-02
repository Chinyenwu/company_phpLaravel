@extends('layouts.setup')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>網站架構</h1>
            <h3 class="text-center title-color">Drag and Droppable Cards using Vue.Draggable Demo</h3>
            <div class="well" id="app">
            <task-draggable :tasks-completed="{{ $tasksCompleted }}" :tasks-not-completed="{{ $tasksNotCompleted }}"></task-draggable>
            </div> <!-- end app -->
            <h5>Drag and Drop the cards and <button class="btn btn-default" onclick="window.location.reload()"><b>REFRESH</b></button> the page to check the Demo. For the complete tutorial of how to make this demo app visit the following <a href="#">Link</a>.</h5>

            <script src="{{ asset('js/app.js') }}"></script>         
            </div>
    </div>
</div>
@endsection