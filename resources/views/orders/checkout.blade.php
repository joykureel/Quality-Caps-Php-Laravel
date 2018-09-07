@extends('layouts.app')

@section('content')
{!! Form::open(['action' => 'OrdersController@store','method'=>'POST']) !!}
<div class="form-group">
    {{Form::label('fname','First Name')}}
    {{Form::text('fname','',['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('lname','Last Name')}}
    {{Form::text('lname','',['class'=>'form-control'])}}
</div> 
<div class="form-group">
    {{Form::label('address','Address')}}
    {{Form::textArea('address','',['class'=>'form-control'])}}
</div>

{{Form::submit('submit',['class'=>'btn btn-primary'])}}       
{!! Form::close() !!} 
</div>
@endsection
