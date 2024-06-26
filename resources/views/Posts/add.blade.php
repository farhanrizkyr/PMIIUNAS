@extends('master_kader.tampil')
@section('title','Tambah Postingan Artikel')
@section('content')
<div class="card" style="padding:10px;">
  <form method="post" action="/kader/proses_tambah_postingan/" enctype="multipart/form-data">
    @csrf
    <div class="grup">
      <label for="">Judul</label>
      <input type="text" class="form-control" name="name" value="{{old('name')}}">
      @error('name')
     <p class="text-danger">{{$message}}</p>
      @enderror
    </div>
    <div class="grup">
      <div class="row">
        <div class="col">
          <label for="">Gambar (Optional)</label>
          <input type="file" class="form-control" name="image">
        </div>
        
      </div>
       @error('image')
     <p class="text-danger">{{$message}}</p>
      @enderror
    </div>
    <div class="grup">
      <label for="">Category</label>
      <select id="category_id" class="js-example-basic-multiple" name="category_id"style="width:100%;" >
        @foreach($categories as $category)
       <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
       @error('category_id')
     <p class="text-danger">{{$message}}</p>
      @enderror
    </div>
    
    <div class="grup">
      <label for="">Body</label>
      <textarea name="body" id="editor1">{{old('body')}}</textarea>
     @error('body')
     <p class="text-danger">{{$message}}</p>
      @enderror
    </div>
    <br><br>
    <button class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
    <a href="/kader/artikel" class="btn btn-info"> <i class="fas fa-arrow-circle-left"></i> Kembali</a>
  </form>
</div>

<script>

</script>

@endsection