@extends('master.tampil')
@section('tittle','Edit Profile')
@section('page','Edit Profile')
@section('contentt','Halaman Edit Profile PMIIUNAS')
@section('content')
<form method="post" action="/profpmiiunas/proses-edit/{{$alamat->id}}"> 
@csrf
<div class="group">
  <label>Judul</label>
  <input type="text" name="judul" autocomplete="off" class="form-control"  value="{{$alamat->judul}}">
  @error('judul')
 <p class="text-danger">{{$message}}</p>
  @enderror
</div>
<div class="group">
  <label>Isi Profile</label>
  <textarea name="profile"  id="editor1">{{$alamat->profile}}</textarea>
  @error('profile')
 <p class="text-danger">{{$message}}</p>
  @enderror
</div>

  <br><br>
  <button class="btn btn-primary"> 
 <i class="fas fa-save"></i>
  Send</button>
  
  <a href="/profpmiiunas" class="btn btn-warning">
    <i class="fas fa-arrow-circle-left"></i>
    kembali
  </a>

</form>
@endsection