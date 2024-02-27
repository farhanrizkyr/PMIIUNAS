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
<div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg>
  <div>
    Data Tahun Angkatan Yang Sudah Di Input Jangan Di Hapus
  </div>
</div>
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

           <form method="post" action="/tahun/delete-tahun-angkatan/{{$data->id}}" class="d-inline">
            @csrf
             @method('delete')
             <button onclick="return confirm('Yakin Ingin Menghapus?')" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
           </form>
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