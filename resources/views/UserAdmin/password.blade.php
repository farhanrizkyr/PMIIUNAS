@extends('master.tampil')
@section('tittle','Ubah Password')
@section('page','Ubah Password')
@section('contentt','HalamanUbah Password')
@section('content')

@if(Session::get('pesan'))
<div class="alert alert-primary" role="alert">
  {{Session::get('pesan')}}
</div>
  @endif
            @if(Session::get('error'))
            <div class="alert alert-primary" role="alert">
              {{Session::get('error')}}
            </div>
            @endif
<form method="post" action="/password/ubah_password">
    @csrf
 <div class="grup">
 	<label>Password Lama</label>
 	<input type="password"  class="form-control" name="old_password">
    @error('old_password')
    <p class="text-danger">{{$message}}</p>
    @enderror
 </div>

 <div class="grup">
 	<label>Password Baru</label>
 	<input type="password" class="form-control" name="new_password">
        @error('new_password')
    <p class="text-danger">{{$message}}</p>
    @enderror
 </div>

  <div class="grup">
 	<label>Konfirmasi Password Baru</label>
 	<input type="password"  class="form-control">

 </div>
<br><br>
 <button class="btn btn-primary"><i class="fas fa-key"></i> Ubah Password</button>
</form>

@endsection