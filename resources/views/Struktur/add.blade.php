@extends('master.tampil')
@section('tittle','Tambah Struktur Organisasi')
@section('page','Tambah Struktur Organisasi')
@section('contentt','Halaman Tambah Struktur Organisasi')
@section('content')
<form method="post"action="/strukturs/proses_tambah_struktur" enctype="multipart/form-data">
  @csrf
  <div class="grup">
    <label for="">Nama</label>
    <input type="text" name="name" class="form-control" autocomplete="off" value="{{old('name')}}">
    @error('name')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  
    <div class="grup">
    <label for="">Foto</label>
    <input type="file" name="gambar" class="form-control">
        @error('gambar')
      <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  
      <div class="grup">
    <label for="">Link Twitter (Optional) </label>
    <input value="{{old('tw')}}" type="text" name="tw" class="form-control" autocomplete="off">

</div>

   <div class="grup">
    <label for="">Link Instagram (Optional)</label>
    <input value="{{old('ig')}}" type="text" name="ig" class="form-control" autocomplete="off">

</div>
   <div class="grup">
    <label for="">Link LinkedIn (Optional)</label>
    <input value="{{old('linkeld')}}" type="text" name="linkeld" class="form-control" autocomplete="off">
</div>

   <div class="grup">
    <label for="">Link Facebook (Optional)</label>
    <input value="{{old('fb')}}" type="text" name="fb" autocomplete="off" class="form-control">

</div>
  
    <div class="grup">
    <label for="">Biro Kepengurusan</label>
    <textarea name="biro" class="form-control" cols="30" rows="10">{{old('biro')}}</textarea>
            @error('biro')
      <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  
  
    <br>
  <button class="btn btn-primary">
    <i class="far fa-save"></i>
    
    Save
  </button>
  <a href="/strukturs" class="btn btn-warning">
    
    <i class="fas fa-arrow-alt-circle-left"></i>
    back
  </a>
</form>
@endsection