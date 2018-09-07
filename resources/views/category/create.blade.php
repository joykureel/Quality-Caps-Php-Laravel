@extends('layouts.app')
@section('content')
     <h1>Create</h1>
     <div class="container">
     {!! Form::open(['action' => 'CategorysController@store','method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name','',['class'=>'form-control'])}}
        </div> 
        <div class="form-group">
            {{Form::label('description','Description')}}
            {{Form::text('description','',['class'=>'form-control'])}}
        </div>    
        {{Form::submit('submit',['class'=>'btn btn-primary'])}}       
     {!! Form::close() !!} 
    </div>
@endsection