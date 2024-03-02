@extends('master.tampil')
@section('tittle','Edit Profile Rayon')
@section('page','Edit Profile Rayon')
@section('contentt','Halaman Edit Profile Rayon')
@section('content')
<form method="post" action="/profilesrayon/proses_edit_rayon/{{$rayon->id}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="gambar_lama" value="{{$rayon->gambar}}">
  <div class="grup">
  <label for="">Nama Rayon</label>
  <input type="text" class="form-control" autocomplete="off" name="title" value="{{$rayon->title}}">
  @error('title')
  <p class="text-danger">{{$message}}</p>
  @enderror
</div>
<br>
<div class="row">
  <div class="col">
    <div class="grup">
  <label for="">Logo Rayon</label>
  <input type="file" class="form-control" autocomplete="off" name="gambar">
    @error('gambar')
  <p class="text-danger">{{$message}}</p>
  @enderror
</div>
  </div>
  <div class="col">
    <img width="150" src="{{url('LogoRayon',$rayon->gambar)}}" alt="{{$rayon->gambar}}">
  </div>
</div>
<div class="grup">
  <label for="">Body</label>
  <textarea name="body" id="editor1">{{$rayon->body}}</textarea>
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