<link rel="stylesheet" href="{{('css/semua.css')}}">

@extends('layouts.app')

<style>
.card{
    margin-left: 215px;
    
}

.cart{
    float:right;
    margin-right:20px;
}

.card-body{
    margin-top: 40px;

}

</style>


@section('content')

<div class="card mb-3" style="max-width: 1000px; margin:auto">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="{{url('image/'.$cart->image)}}" class="card-img" alt="dictionary" style="width: 100%;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <p>Stationary Name: {{$cart->product_name}}</p>
        <p>Stationary Price: {{$cart->price}}</p>
        <p>Quantity: {{$cart->quantity}}</p>
        <p>Stationary Type: {{$cart->category_name}}</p>
        <p>Description: {{$cart->description}} </p>
      </div>

      <div class="cart">
      <div class="input-group mb-3">
        <form class="input-group-append" action="{{url('editCart/'.$cart->product_id)}}" method="post">
          @csrf
          <input type="number" name="quantity" id="quantity">
          <button class="btn btn-dark" for="inputGroupSelect02">Update Cart</button>
      </form>
      </div>

      
      
    </div>

    
    
    
   

  </div>
</div>

@endsection