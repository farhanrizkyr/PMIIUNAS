@extends('master.tampil')
@section('tittle','Edit Pemberitahuan')
@section('page','Edit Pemberitahuan')
@section('contentt','Halaman Edit Pemberitahuan')
@section('content')
<form method="post" action="/pemberitahuan/proses_edit_pem/{{$pem->id}}" enctype="multipart/form-data">
  @csrf
  @if($pem->gambar)
    <div class="grup">
  <input type="hidden" name="gambar_lama" value="{{$pem->gambar}}" class="form-control" autocomplete="off">
</div>
  @endif
  <div class="grup">
  <label for="">Judul Pemberitahuan</label>
  <input type="text" name="judulpem" value="{{$pem->judulpem}}" class="form-control" autocomplete="off">
  @error('judulpem')
 <div class="text-danger">
      {{$message}}
    </div>
  @enderror
</div>
<br>
<div class="row">
 <div class="col">
  <div class="grup">
  <label for="">Poster Pemberitahuan</label>
  <input type="file" name="gambar" value="{{old('gambar')}}" class="form-control" autocomplete="off">
  @error('gambar')
 <div class="text-danger">
      {{$message}}
    </div>
  @enderror
</div>
 </div> 
  <div class="col">
    <img width="150" src="{{$pem->gambar()}}" alt="{{$pem->gambar}}">
  </div>
  
</div>
  <div class="grup">
  <label for="">Body</label>
<textarea name="body" id="editor1">{{$pem->body}}</textarea>
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