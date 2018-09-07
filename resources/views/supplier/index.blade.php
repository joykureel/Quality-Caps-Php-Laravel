@extends('layouts.app')
@section('content')
     <h1>Index</h1>
     <a href="/supplier/create" class="btn btn-default" >Create a cap</a>
     <table class="table table-stripped">
         <thead>
             <tr>
                 <th>Name</th>
                 <th>Phone</th>
                 <th>Email</th>
                
             </tr>
         </thead>
         <tbody>
                @if(count($suppliers)>0)
                @foreach($suppliers as $supplier)
                <tr>
                <td>{{$supplier->name}}</td>
                <td>{{$supplier->phone}}</td>                
                <td>{{$supplier->email}}</td>
                </tr>
                @endforeach
               @endif
         </tbody>
     </table>
@endsection