@extends('master.tampil')
@section('tittle','Tambah User Kader')
@section('tittle','Tambah User Kader')
@section('page','Tambah User Kader')
@section('content')
<form class="row g-3" method="post" action="/anggota_kader/tambah_user">
  @csrf
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nama</label>
    <input type="text" class="form-control" id="inputEmail4" autocomplete="off" name="name">
    @error('name')

      <p class="text-danger">{{$message}}</p>
    @enderror
  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Username</label>
    <input type="text" class="form-control" id="inputPassword4" autocomplete="off" name="username">
      @error('username')

      <p class="text-danger">{{$message}}</p>
    @enderror
  </div>


  <form class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputEmail4" name="password">
      @error('password')

      <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Konfirmasi Password</label>
    <input type="password" class="form-control" id="inputPassword4" name="password_confirmation">
      @error('password_confirmation')

      <p class="text-danger">{{$message}}</p>
    @enderror
  </div>

   <div class="col">
    <label for="inputPassword4" class="form-label">E-Mail</label>
    <input type="text" class="form-control" id="inputPassword4" autocomplete="off" name="email">
      @error('email')

      <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
 
  <div class="col-12">
      <br><br>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>  Register</button>

          <a href="/anggota_kader" class="btn btn-info">
    <i class="fas fa-arrow-left"></i>
    Kembali
  </a>
  </div>
</form>
@endsection