<link rel="stylesheet" href="{{('css/semua.css')}}">
@extends('layouts.app')


<style>
.form-group{
    margin:auto;
}


</style>

@section('content')

      <form action="{{url('updateProduct/'.$p->id)}}" method="post">
            @csrf
            <div class="form-group" style="max-width:50%;">
              <label for="formGroupExampleInput">Name</label>
              <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Name" value="{{$p->name}}">
              @error('name')
                  <strong>{{ $message }}</strong>
              @enderror
            </div>
            <div class="form-group" style="max-width:50%;">
              <label for="formGroupExampleInput2">Description</label>
              <input type="text" name="description" class="form-control" id="formGroupExampleInput2" placeholder="Description" value="{{$p->description}}">
              @error('description')
                  <strong>{{ $message }}</strong>
              @enderror
            </div>
            <div class="form-group" style="max-width:50%;">
              <label for="formGroupExampleInput3">Stock</label>
              <input type="text" name="stock" class="form-control" id="formGroupExampleInput3" placeholder="Stock" value="{{$p->stock}}">
              @error('stock')
                  <strong>{{ $message }}</strong>
              @enderror
            </div>
            <div class="form-group" style="max-width:50%;">
              <label for="formGroupExampleInput4">Price</label>
              <input type="text" name="price" class="form-control" id="formGroupExampleInput4" placeholder="Price" value="{{$p->price}}">
              @error('price')
                  <strong>{{ $message }}</strong>
              @enderror
            </div>
            <div class="form-group" style="max-width:50%;">
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
      </form>

@endsection