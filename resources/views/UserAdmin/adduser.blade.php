@extends('master.tampil')
@section('tittle','Tambah User Pengurus')
@section('page','Tambah User Pengurus')
@section('contentt','Halaman Tambah User Pengurus')
@section('content')
<form action="{{route('register_admin')}}" method="post" class="row g-3">
  @csrf
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nama</label>
    <input type="text" class="form-control" id="inputEmail4" value="{{old('name')}}" name="name">
    @error('name')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Username</label>
    <input type="text" class="form-control" name="username" id="inputPassword4" value="{{old('username')}}">
        @error('username')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>

  <form class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="inputEmail4">
        @error('password')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Konfirmasi Password</label>
    <input type="password" class="form-control"  name="password_confirmation" id="inputPassword4">
        @error('password_confirmation')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
 <form class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">E-Mail</label>
    <input type="text" class="form-control" name="email" id="inputEmail4">
        @error('email')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Role</label>
  <select class="form-control" name="role">
    <option value="Pengurus">Pengurus</option>
    <option value="Panitia">Panitia</option>
  </select>
  </div>
 
  <div class="col-12">
      <br><br>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>  Register</button>
      <a href="/anggota_pengurus" class="btn btn-info">
    <i class="fas fa-arrow-left"></i>
    Kembali
  </a>
  </div>
</form>
@endsection