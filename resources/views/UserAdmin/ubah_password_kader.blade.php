@extends('master.tampil')
@section('tittle','Edit Password')
@section('page','Edit Password')
@section('contentt','Halaman Edit Password Kader')
@section('content')

<form method="post" action="/anggota_kader/ubah-password-kader/{{$data->id}}">
    @csrf
 <div class="grup">
 	<label>Password Baru</label>
 	<input type="password" class="form-control" name="password">
        @error('password')
    <p class="text-danger">{{$message}}</p>
    @enderror
 </div>

  <div class="grup">
 	<label>Konfirmasi Password Baru</label>
 	<input type="password" name="password_confirmation"  class="form-control">

 </div>
<br><br>
 <button class="btn btn-primary"><i class="fas fa-key"></i> Ubah Password</button>
 <a href="/anggota_kader/" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a>
</form>

@endsection