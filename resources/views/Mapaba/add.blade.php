@extends('master.tampil')
@section('tittle','Tambah Peserta MAPABA')
@section('page','TambahPeserta MAPABA')
@section('contentt','Halaman Tambah Peserta MAPABA')
@section('content')
<form method="post" action="/listmapaba/proses_tambah_mapaba">
  @csrf
  <div class="grup">
    <label for="">Nama</label>
    <input type="text" name="name" class="form-control" value="{{old('name')}}" autocomplete="off">
    
    @error('name')
    <span class="text-danger">
      {{$message}}
    </span>
    @enderror
  </div>
  <div class="grup">
    <label for="">HP</label>
    <input type="tel" name="hp" class="form-control" value="{{old('hp')}}" autocomplete="off">
    
    @error('hp')
    <span class="text-danger">
      {{$message}}
    </span>
    @enderror
  </div>
  
    <div class="grup">
    <label for="">Kampus</label>
    <input type="text" name="kampus" class="form-control" value="{{old('kampus')}}" autocomplete="off">
    
    @error('kampus')
    <span class="text-danger">
      {{$message}}
    </span>
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
    <label for="">Program Studi</label>
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
  
<div class="grup">
    <label for="">Minat</label>
    <textarea name="minat" id="editor1">{{old('minat')}}</textarea>
       @error('minat')
    <span class="text-danger">
      {{$message}}
    </span>
    @enderror
  </div>
  <div class="grup">
    <label for="">Pengalaman</label>
    <textarea name="pengalaman" id="editor2">{{old('pengalaman')}}</textarea>
       @error('pengalaman')
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
  <a href="/listmapaba" class="btn btn-warning">
    <i class="fas fa-arrow-alt-circle-left"></i>
    back
  </a>
</form>



@endsection