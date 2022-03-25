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

<div class="button">

<a href="{{ url('/addProduct') }}" type="button" class="btn btn-outline-primary">Add New Stationary</a>
<a href="{{ url('/typeProduct') }}" type="button" class="btn btn-outline-primary">Add New Stationary Type</a>
<a href="{{ url('/editProduct') }}" type="button" class="btn btn-outline-primary">Edit Stationary Type</a>

</div>


<div class="container mt-5">
    <h1>Pen</h1>
    <div class="row">
        <div class="col-4">
            <div class="card p-2 pt-4">
                <div class="row justify-content-center">
                    <img class="card-img-top" src="image/pen1.jpg" alt="dictionary">
                </div>
                <div class="row">
                    <div class="card-body">
                        <h4 class="card-title display-5">Item 1</h4>
                        <h6 class="">IDR 5.000.000</h6>
                        <a href="{{ url('/detailPage') }}" class="btn btn-primary">More Details</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-4">
            <div class="card p-2 pt-4">
                <div class="row justify-content-center" >
                    <img class="card-img-top" src="image/pen2.jpg" alt="book">
                </div>
                <div class="row">
                    <div class="card-body">
                        <h4 class="card-title display-5">Item 1</h4>
                        <h6 class="">IDR 5.000.000</h6>
                        <a href="" class="btn btn-primary">More Details</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-4">
            <div class="card p-2 pt-4">
                <div class="row justify-content-center">
                    <img class="card-img-top" src="image/pen3.jpg" alt="ruler">
                </div>
                <div class="row">
                    <div class="card-body">
                        <h4 class="card-title display-5">Item 1</h4>
                        <h6 class="">IDR 5.000.000</h6>
                        <a href="" class="btn btn-primary">More Details</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="page">
<nav aria-label="...">
  <ul class="pagination">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item active" aria-current="page">
      <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
    </li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>

    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
</div>

@endsection