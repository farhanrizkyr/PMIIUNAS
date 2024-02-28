@extends('master_kader.tampil')
@section('title','Edit Testimoni')
@section('content')

<div class="card" style="padding:33px;">
<form method="post" action="/kader/proses-edit-testimoni/{{$data->id}}">
        	@csrf
        	<div class="form-group">
        		<label>Testimoni</label>
        		<textarea name="catatan" id="editor1">{{$data->catatan}}</textarea>
            @error('catatan')
            <p class="text-danger">{{$message}}</p>
            @enderror
        	</div>
        	<button class="btn btn-primary">Update</button>
        </form>
</div>


@endsection
