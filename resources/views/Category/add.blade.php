@extends('master_kader.tampil')
@section('title','Tambah Category')
@section('content')
<div class="card" style="padding:5px;">
 <form method="post" action="/kader/proses_tambah_category">
   @csrf
    <div class="grup">
    <label for="">Category</label>
    <input type="text" name="name" class="form-control">
        @error('name')
          <p class="text-danger">{{$message}}</p>
          @enderror
          <br><br>
          <button class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
           <a href="/kader/category" class="btn btn-info"> <i class="fas fa-arrow-circle-left"></i> Kembali</a>
  </div>
 </form>
</div>

@endsection