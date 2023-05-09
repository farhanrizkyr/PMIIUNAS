@extends('master.tampil')
@section('tittle','Tambah Testimoni')
@section('content')
<form method="post" action="/testimoni/proses_tambah_testi" enctype="multipart/form-data">
  @csrf
  <div class="grup">
    <label for="">Nama</label>
    <input type="text" name="name" class="form-control" value="{{old('name')}}" autocomplete="off">
    @error('name')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
    <div class="grup">
    <label for="">Foto</label>
    <input type="file" name="gambar" class="form-control" value="{{old('gambar')}}" autocomplete="off">
    @error('gambar')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="grup">
    <label for="">Catatan</label>
    <textarea name="catatan" id="editor1" >{{old('catatan')}}</textarea>
       @error('catatan')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <br><br>
  <button class="btn btn-primary">
  <i class="fas fa-save"></i>
    Save</button>
  <a href="/testimoni" class="btn btn-info">
    <i class="fas fa-arrow-left"></i>
    Kembali
  </a>
</form>
@endsection