@extends('master_kader.tampil')
@section('title','All Post')
@section('content')
<h1 class="text-center mt-5">All Post</h1>
<hr>


<div class="row row-cols-1 row-cols-md-2 g-4">
	@forelse($all as $posts)
	@php $body=substr($posts->body,0,500)
	@endphp
  <div class="col">
    <div class="card">
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
  @empty
<img src="{{asset('v_kader')}}/assets/img/avatar/no-article.png" width="90%;">
<h5 class="mb-4 ">Tidak Ada Postingan Silahkan Buat Postingan Pertama Anda</h5>
@endforelse



</div>
{{$all->links()}}
@endsection

