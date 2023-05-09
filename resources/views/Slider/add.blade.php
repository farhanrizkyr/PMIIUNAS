@extends('master.tampil')
@section('tittle','Tambah Sliders Baru')
@section('page',' Tambah Slider')
@section('contentt','Halaman Tambah Slider')
@section('content')
<form method="post" action="/sliders/proses_tambah_slider" enctype="multipart/form-data">
  @csrf
  <div class="grup">
  <label for="">Judul</label>
  <input type="text" name="name" class="form-control" autocomplete="off" value="{{old('name')}}">
  @error('name')
  <p class="text-danger">{{$message}}</p>
  @enderror
</div>
  <div class="grup">
  <label for="">Link (Optional)</label>
  <input type="text" name="links" class="form-control" autocomplete="off" value="{{old('links')}}">
  @error('link')
  <p class="text-danger">{{$message}}</p>
  @enderror
</div>
  <div class="grup">
  <label for="">Gambar</label>
  <input type="file" name="gambar" class="form-control" autocomplete="off" value="{{old('gambar')}}">
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