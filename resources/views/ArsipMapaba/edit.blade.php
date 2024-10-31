@extends('master.tampil')
@section('tittle','Edit File Arsip Mapaba')
@section('page','Edit File Arsip Mapaba')
@section('contentt','Halaman Edit File Mapaba')
@section('content')
<form  method="post" action="/filearsipmapabaraya/proses_edit_file_mapaba/{{$file->id}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="file_lama" value="{{$file->file}}">
  <div class="grup">
    <label for="">Periode Kepengurusan</label>
    <span class="text-danger">Jika ingin menginput file dengan tahun jangan gunakan tanda (/) contoh: 2018/2019</span>
    <input name="name" autocomplete="off" type="text" value="{{$file->name}}" class="form-control">
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
    <hr>
    File PDF:
    <a href="/FileArsipMAPABA/{{$file->file}}">{{$file->file}}</a>
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
