@extends('master.tampil')
@section('tittle','Tambah Merchandise')
@section('page','Tambah Merchandise')
@section('contentt','Halaman Tambah Merchandise')
@section('content')
<form method="post" action="/merchandise/proses_tambah_mrc" enctype="multipart/form-data">
  @csrf
  <div class="grup">
    <label for="">Produk</label>
    <input value="{{old('produk')}}" type="text" class="form-control" name="produk" autocomplete="off">
    @error('produk')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="grup">
    <label for="">Gambar</label>
    <input value="{{old('gambar')}}" type="file" class="form-control" name="gambar">
    @error('gambar')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  
  <div class="grup">
    <label for="">Harga</label>
    <input value="{{old('harga')}}" type="tel" class="form-control" name="harga" autocomplete="off">
    @error('harga')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="grup">
    <label for="">Harga Diskon</label>
    <input value="{{old('diskon')}}" type="tel" class="form-control" name="diskon" autocomplete="off">
  
  </div>
  <br>
  <label>Cp</label>
 <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">+62</span>
  </div>
  <input type="text" class="form-control" value="{{old('cp')}}" placeholder="8153609xxxx" name="cp" aria-label="Username" aria-describedby="basic-addon1">
</div>
    @error('cp')
    <p class="text-danger">{{$message}}</p>
    @enderror
  
  
  <div class="grup">
    <label for="">Description</label>
   <textarea name="desc" id="editor1">{{old('desc')}}</textarea>
       @error('desc')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <br><br>
  <button class="btn btn-primary">
    <i class="fas fa-save"></i>
    Save</button>
    <a href="/merchandise" class="btn btn-warning">
      <i class="fas fa-arrow-left"></i>
      Kembali
    </a>
</form>
@endsection