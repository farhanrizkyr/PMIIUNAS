@extends('master_kader.tampil')
@section('title','Edit Postingan Artikel')
@section('content')
<div class="card" style="padding:10px;">
  <form method="post" action="/kader/proses_edit_post/{{$post->id}}" enctype="multipart/form-data">
    @csrf
    <div class="grup">
      <label for="">Judul</label>
      <input type="text" class="form-control" name="name" value="{{$post->name}}">
      @error('name')
     <p class="text-danger">{{$message}}</p>
      @enderror
    </div>

   <div class="grup">
      <label for="">Status</label>
     <select class="js-example-basic-multiple" style="width:100%;" name="status">
       <option @if($post->status=='publish')selected @endif value="publish">Publish</option>
        <option @if($post->status=='draft')selected @endif value="draft">Draft</option>
     </select>
    </div>


    <div class="grup">
      <div class="row">
        <div class="col">
          <label for="">Gambar (Optional)</label>
          <input type="file" class="form-control" name="image">
        </div>
        
        <div class="col">
          <img width="100" src="{{$post->image()}}" alt="{{$post->image}}">
        </div>
      </div>
       @error('image')
     <p class="text-danger">{{$message}}</p>
      @enderror
    </div>
    <div class="grup">
      <label for="">Category</label>
      <select  id="category_id" class="js-example-basic-multiple" name="category_id"style="width:100%;">
        @if(optional($post->category)->name??null)
        <option value="{{$post->category_id}}">{{$post->category->name}}</option>
        @endif
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
      <textarea name="body" id="editor1">{{$post->body}}</textarea>
     @error('body')
     <p class="text-danger">{{$message}}</p>
      @enderror
    </div>
    <br><br>
    <button class="btn btn-primary">
     <i class="fas fa-save"></i>
      Update
    </button>
    <a href="/kader/artikel" class="btn btn-info"> <i class="fas fa-arrow-circle-left"></i> Kembali</a>
  </form>
</div>

@endsection