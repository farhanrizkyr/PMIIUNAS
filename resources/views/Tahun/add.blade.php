@extends('master.tampil')
@section('tittle','Tambah Tahun Angkatan')
@section('page',' Tambah Tahun Angkatan')
@section('contentt','Halaman Tambah Tahun Angkatan')
@section('content')
<form method="post" action="/tahun/proses_tambah_tahun">
  @csrf
  <div class="grup">
    <label for="">Tahun Angkatan</label>
    <input type="text" name="tahun" autocomplete="off" class="form-control">
    @error('tahun')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <br><br>
  <button class="btn btn-primary"> 
 <i class="fas fa-save"></i>
  Send</button>
  
  <a href="/tahun" class="btn btn-warning">
    <i class="fas fa-arrow-circle-left"></i>
    kembali
  </a>
</form>
                

@endsection