@extends('master.tampil')
@section('tittle','Detail  Merchandise')
@section('page','Detail Merchandise')
@section('contentt','Halaman Detail Merchandise')
@section('content')
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{$slug->gambar()}}" class="img-fluid rounded-start" alt="{{$slug->gambar}}" style="height: :20%;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <a href="/merchandise" style="float:right">
          <i class="fas fa-arrow-left"></i>
          Kembali
        </a>
        <h5 class="card-title">
          
          {{$slug->produk}}</h5>
          <br>
        <hr>
               @if($slug->diskon==null)
          <p>
          Rp.{{$slug->harga}}
          </p>
          @endif
         @if($slug->diskon)
         Harga Normal  <s><p class="text-danger">
         Rp.{{$slug->harga}}
          </p></s>
          
        <p>
      Harga   Diskon Rp.{{$slug->diskon}}
          </p>
          @endif
        @if($slug->status=='Stock Ada')
        Stock:  <span class="badge badge-success">
            {{$slug->status}}
          </span>
          
          @endif
          @if($slug->status=='Hampir Habis')
        Stock:  <span class="badge badge-warning">
            {{$slug->status}}
          </span>
          
          @endif
          @if($slug->status=='Stock Habis')
        Stock:  <span class="badge badge-danger">
            {{$slug->status}}
          </span>
          
          @endif
        <p class="card-text">
          Description
          {!!$slug->desc!!}</p>
       
        <p class="card-text"><small class="text-muted"></small></p>

      </div>
      <div class="card-footer">
     <i class="fas fa-clock"></i>DiBuat: {{$slug->created_at->diffForhumans()}}
     
        </div>
    </div>
  </div>
</div>
@endsection