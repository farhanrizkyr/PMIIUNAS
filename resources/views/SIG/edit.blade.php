@extends('master.tampil')
@section('tittle','Edit Peserta SIG')
@section('page','Edit Pserta')
@section('contentt','Halaman Edit Peserta')
@section('content')
<form action="/listsig/proses_edit_peserta/{{$sig->id}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="grup">
    <label for="">Nama</label>
    <input type="text" name="name" class="form-control" value="{{$sig->name}}" autocomplete="off">
    @error('name')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="grup">
    <label for="">HP</label>
    <input type="tel" name="hp" class="form-control" value="{{$sig->hp}}" autocomplete="off">
    @error('hp')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
 <div class="grup">
    <label for="">E-Mail1</label>
    <input type="text" name="email1" class="form-control" value="{{$sig->email1}}" autocomplete="off">
    @error('email1')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
   <div class="grup">
    <label for="">E-Mail2</label>
    <input type="text" name="email2" class="form-control" value="{{$sig->email2}}" autocomplete="off">
    @error('email2')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
 <div class="grup">
    <label for="">Asal Rayon</label>
    <input type="text" name="asalrayon" class="form-control" value="{{$sig->asalrayon}}" autocomplete="off">
    @error('asalrayon')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>
 <div class="grup">
    <label for="">Status</label>
   <select name="status" class="form-control">
     <option value="Belum Divalidasi"@if($sig->status=='Belum Divalidasi')selected @endif>Belum Divalidasi</option>
     <option value="Sudah Divalidasi"@if($sig->status=='Sudah Divalidasi')selected @endif>Divalidasi</option>
   </select>
   </div>
      <div class="grup">
    <label for="">Sertifikat</label>
    <input type="file" name="sertifat" class="form-control" autocomplete="off">
    <hr>
               @if($sig->sertifat==null)
        Sertifikat: <br>  <span class="badge badge-danger">
            Sertifikat SIG Belum Diberikan
          </span>
          @endif
          
             @if($sig->sertifat)
         Sertifikat: <br> <a  href="/Sertifikat_SIG/{{$sig->sertifat}}">{{$sig->sertifat}}</a>
          @endif
  </div>
  <br><br>
   <button class="btn btn-primary">
     <i class="fas fa-save"></i>
     Save</button>
     <a href="/listsig" class="btn btn-warning">
       <i class="fas fa-arrow-left"></i>
       Kembali
     </a>
</form>

@endsection