@extends('master.tampil')
@section('tittle','Ubah Role ')
@section('page','Role Kepengurusan')
@section('contentt','Halaman Ubah Role')
@section('content')
<form method="post" action="/anggota_pengurus/proses-ubah-role/{{$user->id}}">
	@csrf
	<div class="grup">
		<label>Role</label>
		<select class="form-control" name="role">
			<option value="Pengurus" @if($user->role=='Pengurus')selected @endif>Pengurus</option>
			<option value="Panitia" @if($user->role=='Panitia')selected @endif>Panitia</option>
		</select>
	</div>
	<br><br>
<button class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
</form>

@endsection