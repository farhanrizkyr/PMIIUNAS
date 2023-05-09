@extends('master.tampil')
@section('tittle','Edit Sejarah')
@section('page','Edit Sejarah')
@section('contentt','Halaman Edit Sejarah')
@section('content')
<form method="post" action="/sejarah-pmii/proses-edit/{{$sejarah->id}}"> 
@csrf
<div class="group">
  <label>Judul</label>
  <input type="text" name="judul" autocomplete="off" class="form-control"  value="{{$sejarah->judul}}">
  @error('judul')
 <p class="text-danger">{{$message}}</p>
  @enderror
</div>
<div class="group">
  <label>Isi Profile</label>
  <textarea name="profile"  id="editor1">{{$sejarah->profile}}</textarea>
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