@extends('master.tampil')
@section('tittle','Edit Peserta MAPABA')
@section('page','Edit Peserta MAPABA')
@section('contentt','Halaman Edit Peserta MAPABA')
@section('content')
<form method="post" action="/history-datamapaba/proses_update_data/{{$m->id}}">
  @csrf
  <div class="grup">
    <label for="">Nama</label>
    <input type="text" name="name" class="form-control" value="{{$m->name}}" autocomplete="off">
    
    @error('name')
    <span class="text-danger">
      {{$message}}
    </span>
    @enderror
  </div>
  <div class="grup">
    <label for="">HP</label>
    <input type="tel" name="hp" class="form-control" value="{{$m->hp}}" autocomplete="off">
    
    @error('hp')
    <span class="text-danger">
      {{$message}}
    </span>
    @enderror
  </div>
  
    <div class="grup">
    <label for="">Kampus</label>
    <input type="text" name="kampus" class="form-control"value="{{$m->kampus}}" autocomplete="off">
    
    @error('kampus')
    <span class="text-danger">
      {{$message}}
    </span>
    @enderror
  </div>
    <div class="grup">
    <label for="">Tahun Angkatan</label>
    <select name="tahun_id"  style="width:100%;"  class="js-example-basic-single">
      <option value="{{$m->tahun_id}}">{{optional($m->tahun)->tahun??null}}</option>
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
    <select name="progdi_id"  style="width:100%;"  class="js-example-basic-single">
      <option value="{{$m->progdi_id}}">{{optional($m->progdi)->progdi??null}}</option>
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
  

  <br>
  <button class="btn btn-primary">
    <i class="far fa-save"></i>
    
    Save
  </button>
  <a href="/history-datamapaba" class="btn btn-warning">
    <i class="fas fa-arrow-alt-circle-left"></i>
    back
  </a>
</form>

@endsection