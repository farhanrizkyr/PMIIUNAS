@extends('master.tampil')
@section('tittle','Edit Merchandise')
@section('page','Edit Merchandise')
@section('contentt','Halaman Edit Merchandise')
@section('content')
<form method="post" action="/merchandise/proses_edit_mrc/{{$mrc->id}}" enctype="multipart/form-data">
  @csrf
  @if($mrc->gambar)
<div class="grup">
  <input type="hidden" name="gambar_lama" value="{{$mrc->gambar}}">
</div>
@endif
  <div class="grup">
    <label for="">Produk</label>
    <input value="{{$mrc->produk}}" type="text" class="form-control" name="produk" autocomplete="off">
    @error('produk')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="grup">
    <label for="">Status</label>
    <select name="status" class="form-control">
     <option value="Stock Ada"@if($mrc->status=='Stock Ada')selected @endif>Stock Ada</option>
      <option value="Hampir Habis"@if($mrc->status=='Hampir Habis')selected @endif>Hampir Habis</option>
     <option value="Stock Habis"@if($mrc->status=='Stock Habis')selected @endif>Stock Habis</option>
     
    </select>
  </div>
  <br>
 <div class="row">
   <div class="col">
      <div class="grup">
    <label for="">Gambar</label>
    <input value="{{old('gambar')}}" type="file" class="form-control" name="gambar">
    @error('gambar')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
   </div>
   <div class="col">
     <img width="100" src="{{$mrc->gambar()}}" alt="{{$mrc->gambar}}">
   </div>
 </div>
  
  <div class="grup">
    <label for="">Harga</label>
    <input value="{{$mrc->harga}}" type="tel" class="form-control" name="harga" autocomplete="off">
    @error('harga')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="grup">
    <label for="">Harga Diskon</label>
    <input value="{{$mrc->diskon}}" type="tel" class="form-control" name="diskon" autocomplete="off">
    @error('diskon')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
    <br>
  <label>Cp</label>
 <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">+62</span>
  </div>
  <input type="text" class="form-control" value="{{$mrc->cp}}" placeholder="8153609xxxx" name="cp" aria-label="Username" aria-describedby="basic-addon1">
</div>
    @error('cp')
    <p class="text-danger">{{$message}}</p>
    @enderror
  
  <div class="grup">
    <label for="">Description</label>
   <textarea name="desc" id="editor1">{{$mrc->desc}}</textarea>
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