@extends('master.tampil')
@section('tittle','Pengurus')
@section('page','Tambah Pengurus')
@section('contentt','Halaman Tambah Pengurus')
@section('content')
   <form method="post" action="/listpengurus/proses_tambah_data">
   	@csrf
   	<div class="group">
   		<label>Nama</label>
   		<input type="text" name="nama" class="form-control" autocomplete="off" value="{{old('nama')}}">
   		@error('nama')
   		<p class="text-danger">{{$message}}</p>
   		@enderror
   	</div>
     <div class="grup">
    <label for="">Tahun Angkatan</label>
    <select class="js-example-basic-single" name="tahun_id" style="width:100%;">
      <option value="">Pilih</option>
      @foreach($t as $d)
   <option value="{{$d->id}}">{{$d->tahun}}</option>
      @endforeach
    </select>
        @error('tahun_id')
    <span class="text-danger">
      {{$message}}
    </span>
    @enderror
  </div>
  <div class="grup">
    <label for="">Fakultas/Program Studi</label>
    <select class="js-example-basic-single" name="progdi_id" style="width:100%;">
      <option value="">Pilih</option>
      @foreach($p as $d)
   <option value="{{$d->id}}">{{$d->progdi}}</option>
      @endforeach
    </select>
        @error('progdi_id')
    <span class="text-danger">
      {{$message}}
    </span>
    @enderror
  </div>

  	<div class="group">
   		<label>Tempat</label>
   		<input type="text" name="tempat" class="form-control" value="{{old('tempat')}}" autocomplete="off">
   		@error('tempat')
   		<p class="text-danger">{{$message}}</p>
   		@enderror
   	</div>

 	<div class="group">
   		<label>Tanggal Lahir</label>
   		<input type="date" name="tanggallahir" class="form-control" autocomplete="off"  value="{{old('tanggallahir')}}">
   		@error('tanggallahir')
   		<p class="text-danger">{{$message}}</p>
   		@enderror
   	</div>


<div class="group">
   		<label>Email</label>
   		<input type="text" name="email" class="form-control" autocomplete="off" value="{{old('email')}}">
   		@error('email')
   		<p class="text-danger">{{$message}}</p>
   		@enderror
   	</div>

   	<div class="group">
   		<label>HP</label>
   		<input type="text" name="hp" class="form-control" autocomplete="off" value="{{old('hp')}}">
   		@error('hp')
   		<p class="text-danger">{{$message}}</p>
   		@enderror
   	</div>

   	  <div class="grup">
    <label for="">Alamat</label>
    <textarea name="alamat" id="editor1">{{old('alamat')}}</textarea>
       @error('alamat')
    <span class="text-danger">
      {{$message}}
    </span>
    @enderror
  </div>
  <br>
  <button class="btn btn-primary">
    <i class="far fa-save"></i>
    
    Save
  </button>
  <a href="/listpengurus" class="btn btn-warning">
    <i class="fas fa-arrow-alt-circle-left"></i>
    back
  </a>
   </form>
@endsection