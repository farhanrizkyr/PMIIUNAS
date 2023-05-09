@extends('master.tampil')
@section('tittle','Tahun Angkatan')
@section('page',' Tahun Angkatan')
@section('contentt','Halaman Tahun Angkatan')
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
<a href="/tahun/add" class="btn btn-primary">
  <i class="fas fa-plus"></i>
    Tambah Tahun Angkatan
  </a> 
  <br><br>
  <div class="table-wrapper">
  <table class="table" id="tabel-data" >
    <thead>
      <tr>
        <th>No</th>
        <th>Tahun Angkatan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    
    <tbody>
      @php $no=1; @endphp
      @foreach($tahun as $data)
      <tr>
        <td>{{$no++;}}</td>
        <td>{{$data->tahun}}</td>
        <td>
          
           <a href="/tahun/edit_tahun/{{$data->id}}" class="btn btn-info">
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