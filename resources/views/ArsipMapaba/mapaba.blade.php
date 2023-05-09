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
    tambah file baru
  </a> 
  <br><br>
  <div class="table-wrapper">
  <table class="table" id="tabel-data" >
    <thead>
      <tr>
        <th>no</th>
        <th>Judul</th>
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
        <td><a href="/filearsipMAPABA/{{$data->file}}" class="btn btn-success">
          <i class="fas fa-download"></i>
          download file</a></td>
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