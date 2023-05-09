@extends('master.tampil')
@section('tittle','Pemberitahuan')
@section('page',' Pemberitahuan')
@section('contentt','Halaman Pemberitahuan')
@section('content')
@if(Session::get('pesan'))
<div class="alert alert-primary" role="alert">
  {{Session::get('pesan')}}
</div>
@endif
@if(Session::get('hapus'))
<div class="alert alert-danger" role="alert">
  {{Session::get('hapus')}}
</div>
@endif
<br><br>
<a href="/pemberitahuan/add" class="btn btn-primary">
  <i class="fas fa-plus"></i>
    Tambah Pemberitahuan Baru
  </a> 
  <br><br>
  <div class="table-wrapper">
  <table class="table" id="tabel-data" >
    <thead>
      <tr>
        <th>No</th>
        <th>Judul pemberitahuan</th>
        <th>Gambar</th>
        <th>Body</th>
        <th>Aksi</th>
      </tr>
    </thead>
    
    <tbody>
      @php $no=1; @endphp
      @foreach($pem as $data)
      @php
      $body=substr($data->body,0,150)
      @endphp
      <tr>
        <td>{{$no++;}}</td>
        <td>{{$data->judulpem}}</td>
        <td><img width="160" src="{{$data->gambar()}}" alt="{{$data->gambar}}"></td>
        <td><a href="/pemberitahuan/{{$data->slug}}">{!!$body!!}</a></td>
        <td>

            <form method="post" action="/pemberitahuan/hapus_pem/{{$data->id}}" class="d-inline">
              @csrf
              @method('delete')
              <button onclick="return confirm('yakin ingin menghapus?')" class="btn btn-danger">  <i class="fas fa-trash"></i> Delete</button>
            </form>
           <a href="/pemberitahuan/edit_pem/{{$data->id}}" class="btn btn-info">
        <i class="fas fa-edit"></i>
             Edit
           </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
   </div>             
 <style>
 .table-wrapper {

  max-width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}
	 </style>          

@endsection