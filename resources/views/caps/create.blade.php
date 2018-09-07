@extends('layouts.app')
@section('content')
     <h1>Create</h1>
     <div class="container">
     {!! Form::open(['action' => 'CapsController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name','',['class'=>'form-control'])}}
        </div> 
        <div class="form-group">
            {{Form::label('description','Description')}}
            {{Form::text('description','',['class'=>'form-control'])}}
        </div>   
        <div class="form-group">
                {{Form::label('image','Image')}}
                {{Form::file('image')}}
            </div>
        <div class="form-group">
            {{Form::label('price','Price')}}
            {{Form::text('price','',['class'=>'form-control'])}}
        </div> 
        <div class="form-group">
        <select name="category_id" class="form-control">
                <option>Select Category</option><!--selected by default-->
                @foreach($categorys as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
           </select>
        </div>
        <div class="form-group">
        <select name="supplier_id" class="form-control">
                <option>Select Supplier</option><!--selected by default-->
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">
                        {{ $supplier->name }}
                    </option>
                @endforeach
           </select>
        </div> 
      
        {{Form::submit('submit',['class'=>'btn btn-primary'])}}       
     {!! Form::close() !!} 
    </div>
@endsection