@extends('master.tampil')
@section('tittle','Edit Struktur Organisasi')
@section('page','Edit Struktur Organisasi')
@section('contentt','Halaman Edit Struktur Organisasi')
@section('content')
<form method="post"action="/strukturs/proses_edit_pengurus/{{$d->id}}" enctype="multipart/form-data">
  @csrf
 
    <div class="grup"> 
    <input  type="text" name="gambar_lama" class="form-control" value="{{$d->gambar}}">
  </div>

  <div class="grup">
    <label for="">Nama</label>
    <input autocomplete="off" type="text" name="name" class="form-control" value="{{$d->name}}">
    @error('name')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
<br>
<div class="row">
  <div class="col">
        <div class="grup">
    <label for="">Foto</label>
    <input type="file" name="gambar" class="form-control">

        @error('gambar')
      <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  </div>

<div class="col">
  <img width="150" src="{{url('FotoStruktur',$d->gambar)}}" alt="{{$d->gambar}}">
</div>
</div>
  
      <div class="grup">
    <label for="">Twitter</label>
    <input autocomplete="off" type="text" name="tw" class="form-control" value="{{$d->tw}}">

</div>

   <div class="grup">
    <label for="">Instagram</label>
    <input autocomplete="off" value="{{$d->ig}}" type="text" name="ig" class="form-control">

</div>
   <div class="grup">
    <label for="">LinkedIn</label>
    <input autocomplete="off" value="{{$d->linkeld}}" type="text" name="linkeld" class="form-control">

</div>


   <div class="grup">
    <label for="">Facebook</label>
    <input autocomplete="off" value="{{$d->fb}}" type="text" name="fb" class="form-control">

</div>
  
    <div class="grup">
    <label for="">Biro Kepengurusan</label>
    <textarea name="biro" class="form-control" cols="30" rows="10">{{$d->biro}}</textarea>
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