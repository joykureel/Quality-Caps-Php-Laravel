@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Address</th>
                <th>Product Description</th>
                <th>Status</th>
                <th>totalPrice</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
            <td>{{$order->fname}}</td>
            <td>{{$order->lname}}</td>
            <td>{{$order->address}}</td>
            
            @foreach($order->cart->items as $item)
            <td>{{$item['item']->name}}&nbsp;|&nbsp;
                {{$item['item']->category->name}}&nbsp;|&nbsp;
                {{$item['item']->price}}&nbsp;|&nbsp;
                quantity:{{$item['qty']}}
            </td>
          @endforeach
          
            <td><a onclick="func();" id="func" href="{{route('orders',['id'=>$order->id])}}" class="btn btn-primary">{{$order->status}}</a></td>
            <td>{{$order->cart->totalPrice}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
<script>
    function func(){
        if(document.getElementById('func').innerHTML=="shipped"){
            alert('its already shipped,dont keep on nagging,u fucking stupid');
        }
    }
</script>