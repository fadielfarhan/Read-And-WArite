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

.tombol{
  float:right;
    margin-right:20px;
}

</style>


@section('content')
<div class="card mb-3" style="max-width: 1000px; margin:auto">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="{{url('image/'.$p->image)}}" class="card-img" alt="dictionary" style="width: 100%;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <p>Stationary Name: {{$p->name}}</p>
        <p>Stationary Price: {{$p->price}}</p>
        <p>Stationary Stock: {{$p->stock}}</p>
        <p>Stationary Type: {{$name}}</p>
        <p>Description: {{$p->description}} </p>
      </div>

      @if(Auth::check() && auth()->user()->admin == false)
      <div class="cart">
      <div class="">
        <form class="d-flex" action="{{url('addCart/'.$p->id)}}" method="post">
          @csrf
          <input type="number" name="quantity" id="inputGroupSelect02">
          <div class="input-group-append">
            <button class="btn btn-dark">Add to Cart</button>
          </div>
        </form>
          @error('quantity')
              <strong>{{ $message }}</strong>
          @enderror
          @endif
          @if(auth::check() && auth()->user()->admin == true)
                    
                    <div class="tombol d-flex">
                      <form action="{{url('deleteProduct/'.$p->id.'/'.$name)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger" style="margin-right:10px; margin-left:10px; border-radius:5px">Delete</button>
                      </form>
                      <div>
                        <a href="{{ url('/updatePage/'.$p->id) }}" class="btn btn-primary" style="border-radius:5px">Update</a>
                      </div>
                    </div>
                    @endif
      
      </div>

      
      
    </div>

    
    
    
   

  </div>
</div>

@endsection