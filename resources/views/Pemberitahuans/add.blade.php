@extends('master.tampil')
@section('tittle','Tambah Pemberitahuan')
@section('page','Tambah Pemberitahuan')
@section('contentt','Halaman Tambah Pemberitahuan')
@section('content')
<form method="post" action="/pemberitahuan/proses_tambah_pem" enctype="multipart/form-data">
  @csrf
  <div class="grup">
  <label for="">Judul Pemberitahuan</label>
  <input type="text" name="judulpem" value="{{old('judulpem')}}" class="form-control" autocomplete="off">
  @error('judulpem')
 <div class="text-danger">
      {{$message}}
    </div>
  @enderror
</div>
  <div class="grup">
  <label for="">Poster Pemberitahuan</label>
  <input type="file" name="gambar" value="{{old('gambar')}}" class="form-control" autocomplete="off">
  @error('gambar')
 <div class="text-danger">
      {{$message}}
    </div>
  @enderror
</div>
  <div class="grup">
  <label for="">Body</label>
<textarea name="body" id="editor1">{{old('body')}}</textarea>
  @error('body')
 <div class="text-danger">
      {{$message}}
    </div>
  @enderror
</div>
<br><br>
<button class="btn btn-primary">
  <i class="fas fa-save"></i>
  Save</button>
  <a href="/pemberitahuan" class="btn btn-info">
    <i class="fas fa-arrow-left"></i>
    Kembali</a>
</form>
@endsection