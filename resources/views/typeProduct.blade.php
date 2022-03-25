<script src="{{ asset('js/addimage.js') }}" defer></script>
<link rel="stylesheet" href="{{('css/semua.css')}}">

@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

<style>
  .table {
    margin-left: 200px;
  }

  .content {
    display: flex;
  }

  .file {
    visibility: hidden;
    position: absolute;
  }
</style>

@section('content')
<div class="content">
  <table class="table table-dark" style="width:30%;">


    <thead>
      <tr>
        <th scope="col">Number</th>
        <th scope="col">Stationary Type Name</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $key => $c)
      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$c->name}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="ml-2 col-sm-6">
    <div id="msg">
    </div>
    <form method="post" id="image-form" enctype="multipart/form-data" action="{{url('addTypeProduct')}}">
      @csrf
      <!-- <div class="ml-2 col-sm-6" style="width:140px" style="height: 140px">
        <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail">
      </div>
      <input type="file" name="image" class="file" accept="image/*">
      <div class="input-group my-3">
        <input type="text" name="img" class="form-control" disabled placeholder="Upload File" id="file">

        <div class="input-group-append" style="width:70%">
          <button type="button" class="browse btn btn-primary">Browse...</button>
        </div>
      </div> -->

      <h1 class="text-center">Upload an image!</h1>
      <div class="col-ting">
        <div class="control-group file-upload" id="file-upload1">
          <div class="image-box text-center">
            <p>Upload Image</p>
            <img src="" alt="">
          </div>
          <div class="controls" style="display: none;">
            <input type="file" name="contact_image_1" />
          </div>
        </div>
      </div>
      @error('image')
      <strong>{{ $message }}</strong>
      @enderror

      <div class="form-group" style="width:50%;">
        <label for="formGroupExampleInput"></label>
        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Stationary Type Name">
        @error('name')
        <strong>{{ $message }}</strong>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Add New Stationary Type</button>

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
  