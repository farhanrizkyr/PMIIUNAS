@extends('master.tampil')
@section('tittle','Program Studi')
@section('page',' Program Studi')
@section('contentt','Halaman Program Studi')
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
<a href="/progdi/add" class="btn btn-primary">
  <i class="fas fa-plus"></i>
    Tambah Program Studi
  </a> 
  <br><br>
  <div class="table-wrapper">
  <table class="table" id="tabel-data" >
    <thead>
      <tr>
        <th>no</th>
        <th>program studi</th>
        <th>aksi</th>
      </tr>
    </thead>
    
    <tbody>
      @php $no=1; @endphp
      @foreach($progdi as $data)
      <tr>
        <td>{{$no++;}}</td>
        <td>{{$data->progdi}}</td>
        <td>
           <a href="/progdi/edit_progdi/{{$data->id}}" class="btn btn-info">
        <i class="fas fa-edit"></i>
             edit
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