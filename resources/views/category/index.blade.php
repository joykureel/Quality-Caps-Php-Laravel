@extends('layouts.app')
@section('content')
     <h1>Index</h1>
     <a href="/category/create" class="btn btn-default" >Create a cap</a>
     <table class="table table-stripped">
         <thead>
             <tr>
                 <th>Name</th>
                 <th>Description</th>
                
                
             </tr>
         </thead>
         <tbody>
                @if(count($categorys)>0)
                @foreach($categorys as $category)
                <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
                </tr>
                @endforeach
               @endif
         </tbody>
     </table>
@endsection