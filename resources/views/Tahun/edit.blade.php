@extends('master.tampil')
@section('tittle','Edit Tahun Angkatan')
@section('page',' Edit Tahun Angkatan')
@section('contentt','Halaman Edit Tahun Angkatan')
@section('content')
<form method="post" action="/tahun/proses_edit_tahun/{{$tahun->id}}">
  @csrf
  <div class="grup">
    <label for="">Tahun Angkatan</label>
    <input type="text" name="tahun" autocomplete="off" value="{{$tahun->tahun}}" class="form-control">
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