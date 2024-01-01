@extends('master_kader.tampil')
@section('title','Dashboard')

@section('content')
 <div class="card" style="padding:35px;">
  <h1>Halaman Dashboard</h1>
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title bg">Posts Blog/Artikel</h5>

        <p class="card-text">{{Auth::user()->posts->count()}}</p>
        <a href="/kader/artikel" ><i class="fas fa-arrow-right"></i> More</a>
      </div>
    </div>
  </div>
 
   <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
       <h3>
        @if ($waktu->hour < 12) {
             Selamat pagi!  
      } @elseif ($waktu->hour < 18) {
          Selamat siang! 
      } @else {
          Selamat malam  
      }
      @endif
</h3>
        <hr>
        <h5 class="card-text">{{Auth::user()->name}}</h5>
      </div>
    </div>
  </div>
 





</div>

@endsection