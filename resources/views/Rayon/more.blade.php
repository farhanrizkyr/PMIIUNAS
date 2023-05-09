@extends('master.tampil')
@section('tittle','More Profile Rayon')
@section('page','Detail Profile Rayon')

@section('content')
<article>
  <a href="/profilesrayon"class="btn btn-default">
    <i class="fas fa-arrow-left"></i>
    Kembali
  </a>
  <hr>
  <img width="100%;" src="{{url('LogoRayon',$rayon->gambar)}}" alt="{{$rayon->gambar}}">
  <br><br>
  {!!$rayon->body!!}
</article>
@endsection