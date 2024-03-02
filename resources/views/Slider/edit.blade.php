@extends('master.tampil')
@section('tittle','Edit  Slider')
@section('page',' Edit Slider')
@section('contentt','Halaman Edit Slider')
@section('content')
<form method="post" action="/sliders/proses_edit_slider/{{$slider->id}}" enctype="multipart/form-data">
  @csrf

    
    <input type="hidden" name="gambar_lama" value="{{$slider->gambar}}">

  <div class="grup">
  <label for="">Judul</label>
  <input type="text" name="name" class="form-control" autocomplete="off" value="{{$slider->name}}">
  @error('name')
  <p class="text-danger">{{$message}}</p>
  @enderror
</div>
  <div class="grup">
  <label for="">Link (Optional)</label>
  <input type="text" name="links" class="form-control" autocomplete="off" value="{{$slider->links}}">
  @error('link')
  <p class="text-danger">{{$message}}</p>
  @enderror
</div>
<br>
<div class="row">
<div class="col">
    <div class="grup">
  <label for="">Gambar</label>
  <input type="file" name="gambar" class="form-control" autocomplete="off" value="{{old('gambar')}}">

</div>
</div>  
<div class="col">
  <img width="160" src="{{url('Slider',$slider->gambar)}}" alt="{{$slider->gambar}}">
</div>
  @error('gambar')
  <p class="text-danger">{{$message}}</p>
  @enderror  
</div>
<br><br>
<button class="btn btn-primary">
  <i class="fas fa-save"></i>
Save</button>
<a href="/sliders" class="btn btn-info">
 <i class="fas fa-arrow-left"></i>
  Kembali
</a>
</form>

@endsection