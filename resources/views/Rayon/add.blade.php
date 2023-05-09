@extends('master.tampil')
@section('tittle','Tambah Profile Rayon')
@section('page','Tamabah Profile Rayon')
@section('contentt','Halaman Tambah  Profile Rayon')
@section('content')
<form method="post" action="/profilesrayon/proses_tambah_rayon" enctype="multipart/form-data">
  @csrf
  <div class="grup">
  <label for="">Nama Rayon</label>
  <input type="text" class="form-control" autocomplete="off" name="title" value="{{old('title')}}">
  @error('title')
  <p class="text-danger">{{$message}}</p>
  @enderror
</div>
<div class="grup">
  <label for="">Logo Rayon</label>
  <input type="file" class="form-control" autocomplete="off" name="gambar">
    @error('gambar')
  <p class="text-danger">{{$message}}</p>
  @enderror
</div>
<div class="grup">
  <label for="">Body</label>
  <textarea name="body" id="editor1">{{old('body')}}</textarea>
  @error('body')
  <p class="text-danger">{{$message}}</p>
  @enderror
</div> 
<br>
 <button class="btn btn-primary">
   <i class="fas fa-save"></i>
   Save</button>
   <a href="/profilesrayon" class="btn btn-warning">
     <i class="fas fa-arrow-left"></i>
     Kembali
   </a>
   
</form>
@endsection