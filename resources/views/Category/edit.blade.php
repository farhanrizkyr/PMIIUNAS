@extends('master_kader.tampil')
@section('title','Edit Category')
@section('content')
<div class="card" style="padding:5px;">
 <form method="post" action="/kader/proses_edit_category/{{$category->id}}">
   @csrf
    <div class="grup">
    <label for="">Category</label>
    <input type="text" name="name" class="form-control" value="{{$category->name}}">
        @error('name')
          <p class="text-danger">{{$message}}</p>
          @enderror
          <br><br>
          <button class="btn btn-primary"><i class="bi bi-send"></i> Update</button>
           <a href="/kader/category" class="btn btn-info"> <i class="fas fa-arrow-circle-left"></i> Kembali</a>
  </div>
 </form>
</div>

@endsection