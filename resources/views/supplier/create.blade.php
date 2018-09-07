@extends('layouts.app')
@section('content')
     <h1>Create</h1>
     <div class="container">
     {!! Form::open(['action' => 'SuppliersController@store','method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name','',['class'=>'form-control'])}}
        </div> 
        <div class="form-group">
            {{Form::label('phone','Phone')}}
            {{Form::text('phone','',['class'=>'form-control'])}}
        </div>
        <div class="form-group">
                {{Form::label('email','Email')}}
                {{Form::text('email','',['class'=>'form-control'])}}
            </div>        
        {{Form::submit('submit',['class'=>'btn btn-primary'])}}       
     {!! Form::close() !!} 
    </div>
@endsection