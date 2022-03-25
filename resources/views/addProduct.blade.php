<link rel="stylesheet" href="{{('css/semua.css')}}">

@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">


<style>
  .file {
    visibility: hidden;
    position: absolute;
  }

  .content {
    margin-left: auto;
    margin-right: auto;
    display: block;
    width: 56%;
  }
</style>

@section('content')

<form action="{{route('add.Product')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
  <div class="content">
    
    <div class="ml-2 col-sm-6" style="width:20%;">
      <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail">
    </div>
    <div class="ml-2 col-sm-6" style="width:40%;">
      <div id="msg"></div>

      <input type="file" name="imageProduct" class="file" accept="image/*">
       <div class="input-group my-3">
        <input type="text" name="imageProduct" class="form-control" disabled placeholder="Upload File" id="file">
        @error('imageProduct')
              <strong>{{ $message }}</strong>
          @enderror
        <div class="input-group-append">
          <button type="button" class="browse btn btn-primary">Browse...</button>
        </div>
        </div>
       <div class="form-group" style="width:200%;">
        <label for="formGroupExampleInput">Name</label>
        <input type="text" name="nameProduct" class="form-control" id="formGroupExampleInput" placeholder="Name">
        @error('nameProduct')
              <strong>{{ $message }}</strong>
          @enderror
        </div>

        <div class="form-group" style="width:200%;">
        <label for="formGroupExampleInput2">Description</label>
        <input type="text" name="descProduct" class="form-control" id="formGroupExampleInput2" placeholder="Description">
        @error('descProduct')
              <strong>{{ $message }}</strong>
          @enderror
        </div>

        <div class="form-group" style="width:200%;">
        <label for="formGroupExampleInput2">Stationary Type</label>
        <select class="form-control" name="typeProduct">
          <option value=""></option>
          @foreach ($categories as $c)
            <option value="{{$c->id}}">{{$c->name}}</option>  
          @endforeach
        </select>
        @error('descProduct')
              <strong>{{ $message }}</strong>
          @enderror
      </div>

      <div class="form-group" style="width:200%;">
        <label for="formGroupExampleInput3">Stock</label>
        <input type="text" name="stockProduct" class="form-control" id="formGroupExampleInput3" placeholder="Stock">
        @error('stockProduct')
              <strong>{{ $message }}</strong>
          @enderror
      </div>
      
      <div class="form-group" style="width:200%;">
        <label for="formGroupExampleInput4">Price</label>
        <input type="text" name="priceProduct" class="form-control" id="formGroupExampleInput4" placeholder="Price">
        @error('priceProduct')
              <strong>{{ $message }}</strong>
          @enderror
      </div>
      <div class="form-group" style="width:200%;">
        <button type="submit" class="btn btn-primary">Add New Stationary</button>
      </div>

    </div>

  </div>
</form>

<script src="{{ asset('js/addimage.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
@endsection