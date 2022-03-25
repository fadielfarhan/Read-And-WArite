<link rel="stylesheet" href="{{('css/semua.css')}}">

@extends('layouts.app')

<style>
    .card {
        margin: auto;
    }

    .click {
        float: right;
        margin-right: 15px;
    }

    .checkout {
        margin-left: 385px;
        margin-top: 10px;
    }
</style>

@section('content')

<div class="card" style="width: 50%;">
    @foreach ($carts as $c)
        <div class="card-body">
        <h2 class="card-title" style="margin-bottom:30px">Stationary Name: {{$c->name}}</h2>
        <p class="card-text">Stationary Price: {{$c->price}}</p>
        <p class="card-text">Quantity: {{$c->quantity}}</p>
        <p class="card-text">Total: {{$c->price * $c->quantity}}</p>
        <div class="click">
            <button type="button" class="btn btn-danger">Delete Item</button>
            <a href="{{ url('/editCart/'.$c->product_id) }}" type="button" class="btn btn-primary">Edit Item</a>
        </div>
    </div>
    @endforeach
    @if(sizeof($carts) <= 0)
        Do Some Transaction to see your products in cart
    @endif
</div>
@if(sizeof($carts) > 0)
    <form action="{{url('checkout')}}" class="checkout" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Checkout</button>
    </form>
@endif

@endsection