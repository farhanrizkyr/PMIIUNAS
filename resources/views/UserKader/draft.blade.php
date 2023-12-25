@extends('master_kader.tampil')
@section('title','Not Found (404)')

@section('content')
<div class="card" style="padding:35px;">
	<h1 class="text-center">Postingan Artikel Dengan Judul: {{$post->name}} Telah Diturunkan....</h1>
	<h5 class="text-center">Postingan Artikel Sedang dalam Draft</h5>
</div>
@endsection