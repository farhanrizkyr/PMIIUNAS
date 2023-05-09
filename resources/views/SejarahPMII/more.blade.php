@extends('master.tampil')
@section('tittle','More')
@section('page','More')
@section('content')
<a href="/sejarah-pmii" class="btn btn-default">  <i class="fas fa-arrow-circle-left"></i> Kembali</a>
<hr>
<article>
	<h1>{{$sejarah->judul}}</h1>

	{!!$sejarah->profile!!}
</article>
@endsection