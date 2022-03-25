<link rel="stylesheet" href="{{('css/semua.css')}}">

@extends('layouts.app')

<style>
    .button{
        margin-left: 215px;
    }

    .button button{
        margin-right: 10px;
    }

    .page{
        margin-top: 50px;
        margin-left: 215px;
    }
    .card-body a{
        margin-left: auto;
        margin-right: auto;
        display:block;
        width: 40%;
       
    }

</style>

@section('content')



@if(Auth::check() && auth()->user()->admin == true)
    <div class="button">
        <a href="{{ url('/addProduct') }}" type="button" class="btn btn-outline-primary">Add New Stationary</a>
        <a href="{{ url('/typeProduct') }}" type="button" class="btn btn-outline-primary">Add New Stationary Type</a>
        <a href="{{ url('/editProduct') }}" type="button" class="btn btn-outline-primary">Edit Stationary Type</a>
    </div>
@endif

<div class="container-sm">
    <div class="row" style="height:50%;">
        @foreach ($products as $p)
            <div class="col-4">
                <div class="card p-2 pt-4">
                    <div class="row justify-content-center">
                        <img class="card-img-top" src="image/{{$p->image}}" alt="dictionary">
                    </div>
                    <div class="row">
                        <div class="card-body">
                            <h4 class="card-title display-5">{{$p->name}}</h4>
                            <h6 class="">IDR {{$p->price}}</h6>
                            <a href="{{ url($p->category->name.'/'.$p->id) }}" class="btn btn-primary" style="width: 100px;">More Details</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <div class="page">
    {{$products->links()}}
    </div>
</div>
@endsection