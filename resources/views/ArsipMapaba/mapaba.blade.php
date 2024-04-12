@extends('master.tampil')
@section('tittle','File Arsip Pengurus')
@section('page','File Arsip Pengurus')
@section('contentt','Halaman File Pengurus')
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
<a href="/filearsipmapabaraya/add" class="btn btn-primary">
  <i class="fas fa-plus"></i>
   Tambah File Baru
  </a> 
  <br><br>
  <div class="table-wrapper">
  <table class="table" id="tabel-data" >
    <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Tanggal Upload</th>
        <th>Tanggal Update</th>
        <th>File PDF</th>
        <th>Aksi</th>
      </tr>
    </thead>
    
    <tbody>
      @php $no=1; @endphp
      @foreach($data_mapaba as $data)
      <tr>
        <td>{{$no++;}}</td>
        <td>{{$data->name}}</td>
        <td>{{$data->time()}}</td>
         <td>{{$data->timeupdate()}}</td>
        <td>

           <form method="get" target="framename" target="_blank" action="/filearsipMAPABA/{{$data->file}}">
            <button class="btn  btn-success btn-sm"> <i class="fas fa-download"></i> Download</button>
        </form>
        </td>
        <td>

         <form method="post" action="filearsipmapabaraya/hapus_file_mapaba/{{$data->id}}" class="d-inline">
              @csrf
              @method('delete')
              <button  onclick="return confirm ('yakin ingin menghapus?')" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
            </form>
           <a href="/filearsipmapabaraya/edit_file_mapaba/{{$data->id}}" class="btn btn-info">
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