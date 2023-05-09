@extends('master.tampil')
@section('tittle','Tambah Program Studi')
@section('page',' Tambah Program Studi')
@section('contentt','Halaman Tambah Program Studi')
@section('content')
<form method="post" action="/progdi/proses_tambah_progdi">
  @csrf
  <div class="grup">
    <label for="">Program Studi</label>
    <input type="text" name="progdi" autocomplete="off" class="form-control">
    @error('progdi')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <br><br>
  <button class="btn btn-primary"> 
 <i class="fas fa-save"></i>
  Send</button>
  
  <a href="/progdi" class="btn btn-warning">
    <i class="fas fa-arrow-circle-left"></i>
    kembali
  </a>
</form>
                

@endsection