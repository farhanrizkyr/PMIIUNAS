@extends('master.tampil')
@section('tittle','Ubah Profile')
@section('page','Ubah Profile')
@section('contentt','Halaman Ubah Profile')
@section('content')
<form method="post" action="/user/update_check/{{$data->id}}">
	@csrf
	<div class="group">
	<label>Nama</label>
	<input type="text" name="name" value="{{$data->name}}" class="form-control">
	@error('name')
    <p class="text-danger">{{$message}}</p>
	@enderror

</div>

	<div class="group">
	<label>Username</label>
	<input type="text" name="username" value="{{$data->username}}" class="form-control">
	@error('username')
    <p class="text-danger">{{$message}}</p>
	@enderror

</div>
	<div class="group">
	<label>E-Mail</label>
	<input type="text" name="email" value="{{$data->email}}" class="form-control">
	@error('email')
    <p class="text-danger">{{$message}}</p>
	@enderror

</div>

	<div class="group">
		<label>Jenis Kelamin</label>
		<select class="form-control" name="gender">
			<option value="">Pilih</option>
			<option value="Laki-Laki" @if($data->gender=='Laki-Laki')selected @endif>Laki Laki</option>
			<option value="Perempuan" @if($data->gender=='Perempuan')selected @endif>Perempuan</option>
		</select>
	</div>



		<div class="group">
	<label>Biro Kepengurusan</label>
	<input type="text" name="biro" value="{{$data->biro}}" class="form-control">


</div>

	<div class="group">
	<label>Tentang Saya</label>
	<textarea id="editor1" name="bio" class="form-control" rows="12">{{$data->bio}}</textarea>
	@error('bio')
    <p class="text-danger">{{$message}}</p>
	@enderror

</div>

<br><br>
<button class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
<a href="/user/" class="btn btn-default">
  <i class="fas fa-arrow-left"></i>
    Kembali
  </a>
</form>

@endsection