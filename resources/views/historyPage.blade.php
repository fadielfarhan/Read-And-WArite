<link rel="stylesheet" href="{{('css/semua.css')}}">

@extends('layouts.app')

<style>

.table{
    margin:auto;
}

</style>

@section('content')

@foreach ($headers as $h)
  <table class="table table-striped table-dark" style="width:40%">
    <thead>
      <tr>
        <th scope="col">{{$h->date}}</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col">{{$h->total()}}</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($h->detail as $d)
        <tr>
          <td>{{$d->product->name}}</td>
          <td>{{$d->product->price}}</td>
          <td>{{$d->quantity}}</td>
          <td>{{$d->quantity * $d->product->price}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endforeach

@endsection