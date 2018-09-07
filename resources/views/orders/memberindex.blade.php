@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Address</th>
                <th>Status</th>
                <th>Product Description</th>
                <th>totalPrice</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
            <td>{{$order->fname}}</td>
            <td>{{$order->lname}}</td>
            <td>{{$order->address}}</td>
            <td>{{$order->status}}</td>
            @foreach($order->cart->items as $item)
            <td>{{$item['item']->name}}&nbsp;|&nbsp;
                {{$item['item']->category->name}}&nbsp;|&nbsp;
                {{$item['item']->price}}&nbsp;|&nbsp;
                quantity:{{$item['qty']}}
            </td>
            @endforeach
            <td>{{$order->cart->totalPrice}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
