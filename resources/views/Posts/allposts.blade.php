@extends('master_kader.tampil')
@section('title','All Post')
@section('content')
<h1 class="text-center mt-5">All Post</h1>
<hr>
<div class="row">
    @forelse($all as $posts)

      @php $body=substr($posts->body,0,260)
  @endphp
<div class="col">
  <div class="col">
  <div class="card" style="width: 18rem;">
<a href="/kader/detail/{{$posts->slug}}"> <img src="{{$posts->image()}}" class="card-img-top" width="300px;" alt="{{$posts->image}}"></a>
  <div class="card-body">
   @if(strlen($posts->name)>40)
          <h5 class="card-title"><a href="/kader/detail/{{$posts->slug}}">{{substr($posts->name,0,49)}} ....</a></h5>
          @else
           <h5 class="card-title"><a href="/kader/detail/{{$posts->slug}}">{{$posts->name}}</a></h5>
       @endif
    <p class="card-text">{!!$body!!}</p>
   
  </div>
</div>

</div>

</div>


          @empty

  <div class="card" style="padding:26px;">
<img src="{{asset('v_kader')}}/assets/img/avatar/no-article.png" width="90%;">
<h5 class="mt-4 text-center">Tidak Ada Postingan Silahkan Buat Postingan Pertama Anda <a href="#"  data-toggle="modal" data-target="#exampleModal">Klik</a> Untuk Membuat !!</h5>
</div>


@endforelse


{{$all->links()}}





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-white bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Buat Artikel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post" action="/kader/allposts/proses_tambah_post1/" enctype="multipart/form-data">
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
    
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save </button>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->



@endsection

