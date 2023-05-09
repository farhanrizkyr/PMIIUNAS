@extends('master.tampil')
@section('tittle','Ubah Status')
@section('page','Ubah Status')
@section('contentt','Halaman Ubah Status')
@section('content')
<form method="post" action="/anggota_kader/proses-ubah-status/{{$user->id}}">
	@csrf
	<div class="group">
		<label>Status</label>
		<select class="form-control" name="status">
			<option value="active" @if($user->status=='active')selected @endif>Buka Blok</option>
			<option value="disable" @if($user->status=='disable')selected @endif> Blok</option>
		</select>
	</div>
	<br><br>
	<button class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
	<a href="/anggota_kader" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a>
</form>

@endsection