@extends('master.tampil')
@section('tittle','File Arsip pengurus')
@section('page','File Arsip Komi')
@section('contentt','Halaman File Arsip Komisariat')
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
<a href="/filearsipkomi/add" class="btn btn-primary">
  <i class="fas fa-plus"></i>
    Tambah File Baru
  </a> 
  <br><br>
  <div class="table-wrapper">
  <table class="table" id="tabel-data" >
    <thead>
      <tr>
        <th>no</th>
        <th>Masa Kepengurusan</th>
        <th>File PDF</th>
        <th>Aksi</th>
      </tr>
    </thead>
    
    <tbody>
      @php $no=1; @endphp
      @foreach($data_komi as $data)
      <tr>
        <td>{{$no++;}}</td>
        <td>{{$data->name}}</td>
        <td><a href="/FileArsipPengurus/{{$data->file}}" class="btn btn-success">
          <i class="fas fa-download"></i>
          Download File</a></td>
        <td>
            <form method="post" action="filearsipkomi/hapus_file_pengurus/{{$data->id}}" class="d-inline">
              @csrf
              @method('delete')
              <button  onclick="return confirm ('yakin ingin menghapus?')" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
            </form>
           <a href="/filearsipkomi/edit_file_pengurus/{{$data->id}}" class="btn btn-info">
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