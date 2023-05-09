@extends('master.tampil')
@section('tittle')
{{$pem->judulpem}}
@endsection
@section('content')




<div class="row">
  <div class="col ">
    <img width="100%" src="{{$pem->gambar()}}" class="hero" alt="{{$pem->gambar}}">
  </div>

  <div class="col lg-5">

    <h1>{{$pem->judulpem}}</h1>
   <br> <i class="fas fa-clock"></i>  {{$pem->created_at->diffForHumans()}}
   <br><br><br>

  </div>
  <article class="mt-5">
      {!!$pem->body!!}
  </article>
</div>



<style>
  .hero{
    border-radius:9px;
    border: solid 2px;
    border-color:black;
  }
</style>
@endsection

