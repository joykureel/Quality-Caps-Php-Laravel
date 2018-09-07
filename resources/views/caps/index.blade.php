@extends('layouts.app')
@section('content')
     <h1>Index</h1>
     <a href="/caps/create" class="btn btn-default" >Create a cap</a>
     <table class="table table-stripped">
         <thead>
             <tr>
                 <th>Name</th>
                 <th>Description</th>
                 <th>Image</th>
                 <th>Price</th>
                 <th>Category</th>
                 <th>Supplier</th>
                 <th></th>
                
             </tr>
         </thead>
         <tbody>
            @if(count($caps)>0)
             @foreach($caps as $cap)
             <tr>
             <td>{{$cap->name}}</td>
             <td>{{$cap->description}}</td>
             <td><img style="width:200px;height=100px" src="/storage/images/{{$cap->image}}" alt="No Image"></td>
             <td>{{$cap->price}}</td>
             <td>{{$cap->category->name}}</td>
             <td>{{$cap->supplier->name}}</td>
             </tr>
             @endforeach
            @endif
         </tbody>
     </table>
     {{$caps->links()}}
@endsection