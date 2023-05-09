@extends('master.tampil')
@section('tittle','Tambah File Arsip Mapaba')
@section('page','Tambah File Arsip Pengurus')
@section('contentt','Halaman Tambah File Arsip Pengurus')
@section('content')
<form  method="post" action="/filearsipmapabaraya/proses_tambah_filemapaba" enctype="multipart/form-data">
  @csrf
  <div class="grup">
    <label for="">Judul</label>
    <input name="name" autocomplete="off" type="text" value="{{old('name')}}" class="form-control">
    @error('name')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="grup">
    <label for="">File PDF Kepengurusan</label>
    <input name="file" autocomplete="off" type="file" value="{{old('file')}}" class="form-control">
    @error('file')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <br>
  <button class="btn btn-primary">
    <i class="fas fa-save"></i>
    Save
  </button>
  <a href="/filearsipmapabaraya" class="btn btn-info">
    <i class="fas fa-arrow-left"></i>
    Kembali
  </a>
</form>
@endsection