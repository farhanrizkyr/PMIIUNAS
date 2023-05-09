@extends('master.tampil')
@section('tittle','More')
@section('page','More')
@section('content')
<a href="/profpmiiunas" class="btn btn-default">  <i class="fas fa-arrow-circle-left"></i> Kembali</a>
<hr>
<article>
	<h1>{{$alamat->judul}}</h1>

	{!!$alamat->profile!!}
</article>
@endsection