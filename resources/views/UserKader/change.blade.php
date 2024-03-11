@extends('master_kader.tampil')
@section('title')
Setting {{Auth::user()->name}}
@endsection

@section('content')
<div class="card" style="padding:35px;">
	<form method="post" action="/user-profile/update/{{Auth::user()->id}}">
		@csrf
		<div class="group">
			<label>Name</label>
			<input type="text" value="{{Auth::user()->name}}" autofocus class="form-control @error('name')is-invalid @enderror" name="name">
			@error('name')
             <p class="text-danger">{{$message}}</p>
			@enderror
		</div>

			<div class="group">
			<label>Rayon</label>
			<input type="text" value="{{Auth::user()->rayon}}" autofocus class="form-control" name="rayon">
		</div>

			<div class="group">
			<label>Username</label>
			<input type="text" value="{{Auth::user()->username}}" autofocus class="form-control @error('username')is-invalid @enderror" name="username">
				@error('username')
             <p class="text-danger">{{$message}}</p>
			@enderror
		</div>

			<div class="group">
			<label>Gender</label>
			<select name="gender" class="form-control">
				<option value="">Pilih</option>
				<option value="(L)- Laki-Laki" @if(Auth::user()->gender=='(L)- Laki-Laki')selected @endif>Laki Laki</option>
				<option  value="(P)- Perempuan" @if(Auth::user()->gender=='(P)- Perempuan')selected @endif>Perempuan</option>
			</select>
		</div>

			<div class="group">
			<label>Tempat</label>
			<input type="text" value="{{Auth::user()->tempat}}" autofocus class="form-control" name="tempat">
		</div>

			<div class="group">
			<label>Tanggal Lahir</label>
			<input type="date" value="{{Auth::user()->tl}}" autofocus class="form-control" name="tl">
		</div>

			<div class="group">
			<label>E-Mail</label>
			<input type="text" value="{{Auth::user()->email}}" autofocus class="form-control @error('email')is-invalid @enderror" name="email">
				@error('email')
             <p class="text-danger">{{$message}}</p>
			@enderror
		</div>

			<div class="group">
			<label>Bio</label>
			<textarea id="editor1" class="form-control"  name="bio">{{Auth::user()->bio}}</textarea>
				@error('bio')
             <p class="text-danger">{{$message}}</p>
			@enderror
		</div>

		<button class="btn btn-primary mt-2"><i class="fas fa-save"></i> Update</button>
		<a href="/user-profile/" class="btn btn-warning  mt-2"><i class="fas fa-arrow-left"></i> Back</a>
	</form>
</div>
@endsection