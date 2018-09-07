@extends('layouts.app')

@section('content')

@if(Session::has('cart'))
   <div class="row text-center">
       
       <div class="col-3"></div>
       <div class="jumbotron">
           <table class="table">
               @foreach($caps as $cap)
               <br>
               <thead>
                   <tr>
                       <th>Cap Name</th>
                       <th>Price</th>
                       <th>Quantity</th>
                       <th>Remove Item</th>
                   </tr>
               </thead>
               <tbody>
                   <tr>
                       <td>{{$cap['item']->name}}</td>
                       <td>{{$cap['price']}}</td>
                       <td>{{$cap['qty']}}</td>
                       
                       <td><a href="{{route('membercaps.remove',['id'=>$cap['item']->id])}}" style="color:white;" class="btn btn-danger">remove</a>
                       </td>
                   </tr>
               </tbody>
               @endforeach
            </table>
            <h3>Total Price:{{$totalPrice}}</h3>
            <a href="/checkout" class="btn btn-secondary">Proceed To Checkout</a>
       </div>
   </div>
@else
<br><br>

<h2 class="jumbotron text-center">You have nothing in your cart</h2>
@endif
@endsection
