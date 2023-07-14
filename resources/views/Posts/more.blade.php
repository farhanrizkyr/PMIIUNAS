@extends('master_kader.tampil')
@section('title')
{{$post->name}}
@endsection
@section('content')



<div class="card" style="padding:30px;">

<div class="row">
  <div class="col ">
    <img width="90%;" class="hero" src="{{$post->image()}}"  alt="{{$post->image}}">
  </div>

  <div class="col lg-5">
  <a href="#" style="font-size:12px; background:lightgrey;" class="btn ">{{$post->category->name}}</a>
    <h1>{{$post->name}}</h1>
   <br> <i class="bi bi-clock"></i>  {{$post->created_at->isoFormat(' D, MMMM Y')}}
   <br><br><br>

  </div>
  <article class="mt-5">
     {!!$post->body!!}
  </article>
</div>

<!-- End card --> 
</div>

<style>
  .hero{
    border-radius:9px;
    border: solid 2px;
    border-color:black;
  }
</style>
@endsection
