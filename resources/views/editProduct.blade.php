<link rel="stylesheet" href="{{('css/semua.css')}}">
<link rel="stylesheet" href="{{('css/contoh.scss')}}">

@extends('layouts.app')

<style>
.table{
    margin:auto;
}


.form-group{
    display: flex;
    margin-right:10px;
}

.form-group button{
    display: inline;
    margin-right:5px;
}

</style>

@section('content')

<table class="table table-hover table-dark" style="width:70%;">
  <thead>
    <tr>
      <th scope="col">Number</th>
      <th scope="col">Stationary Type</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $key => $c)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$c->name}}</td>
      <td>
            <div class="form-group" style="width:80%;" >
             <label for="exampleFormControlInput1"></label>
             <form action="{{url('editProduct/'.$c->id)}}" method="post" class="d-flex">
              @csrf
              <input type="text" name="{{'name'.$c->id}}" class="form-control" id="exampleFormControlInput1" placeholder="Type Name" style="margin-right:10px;">
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <form action="{{url('deleteCategory/'.$c->id)}}" method="post">
              @csrf
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </div>
            @error('name'.$c->id)
              <strong>{{ $message }}</strong>
          @enderror
            
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
<h1>Image-upload with preview</h1>
<div class="wrapper">
  <div class="box">
    <div class="js--image-preview"></div>
    <div class="upload-options">
      <label>
        <input type="file" class="image-upload" accept="image/*" />
      </label>
    </div>
  </div>

  <div class="box">
    <div class="js--image-preview"></div>
    <div class="upload-options">
      <label>
        <input type="file" class="image-upload" accept="image/*" />
      </label>
    </div>
  </div>

  <div class="box">
    <div class="js--image-preview"></div>
    <div class="upload-options">
      <label>
        <input type="file" class="image-upload" accept="image/*" />
      </label>
    </div>
  </div>
</div>

<script>
  function initImageUpload(box) {
  let uploadField = box.querySelector('.image-upload');

  uploadField.addEventListener('change', getFile);

  function getFile(e){
    let file = e.currentTarget.files[0];
    checkType(file);
  }
  
  function previewImage(file){
    let thumb = box.querySelector('.js--image-preview'),
        reader = new FileReader();

    reader.onload = function() {
      thumb.style.backgroundImage = 'url(' + reader.result + ')';
    }
    reader.readAsDataURL(file);
    thumb.className += ' js--no-default';
  }

  function checkType(file){
    let imageType = /image.*/;
    if (!file.type.match(imageType)) {
      throw 'Datei ist kein Bild';
    } else if (!file){
      throw 'Kein Bild gewählt';
    } else {
      previewImage(file);
    }
  }
  
}

// initialize box-scope
var boxes = document.querySelectorAll('.box');

for (let i = 0; i < boxes.length; i++) {
  let box = boxes[i];
  initDropEffect(box);
  initImageUpload(box);
}



/// drop-effect
function initDropEffect(box){
  let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;
  
  // get clickable area for drop effect
  area = box.querySelector('.js--image-preview');
  area.addEventListener('click', fireRipple);
  
  function fireRipple(e){
    area = e.currentTarget
    // create drop
    if(!drop){
      drop = document.createElement('span');
      drop.className = 'drop';
      this.appendChild(drop);
    }
    // reset animate class
    drop.className = 'drop';
    
    // calculate dimensions of area (longest side)
    areaWidth = getComputedStyle(this, null).getPropertyValue("width");
    areaHeight = getComputedStyle(this, null).getPropertyValue("height");
    maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

    // set drop dimensions to fill area
    drop.style.width = maxDistance + 'px';
    drop.style.height = maxDistance + 'px';
    
    // calculate dimensions of drop
    dropWidth = getComputedStyle(this, null).getPropertyValue("width");
    dropHeight = getComputedStyle(this, null).getPropertyValue("height");
    
    // calculate relative coordinates of click
    // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
    x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10)/2);
    y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10)/2) - 30;
    
    // position drop and animate
    drop.style.top = y + 'px';
    drop.style.left = x + 'px';
    drop.className += ' animate';
    e.stopPropagation();
    
  }
}

</script>

@endsection