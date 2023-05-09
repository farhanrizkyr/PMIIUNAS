@extends('master.tampil')
@section('tittle','More')
@section('content')
<article>
  <a href="/listmapaba" class="btn btn-default">
    <i class="fas fa-angle-left"></i>
    Kembali</a>
    <hr>
  {!!$p->pengalaman!!}


</article>

@endsection