@extends('master.tampil')
@section('tittle','Testimoni')
@section('page',' Testimoni')
@section('contentt','Halaman Testimoni')
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
<a href="/testimoni/add" class="btn btn-primary">
  <i class="fas fa-plus"></i>
    Tambah Testimoni Baru
  </a> 
  <br><br>
  <div class="table-wrapper">
  <table class="table" id="tabel-data" >
    <thead>
      <tr>
        <th>no</th>
        <th>Nama</th>
        <th>Gambar</th>
        <th>Catatan</th>
        <th>aksi</th>
      </tr>
    </thead>
    
    <tbody>
      @php $no=1; @endphp
      @foreach($testimoni as $data)
      <tr>
        <td>{{$no++;}}</td>
        <td>{{$data->name}}</td>
        <td><img width="150" class="rounded-circle" src="{{$data->gambar()}}" alt="{{$data->name}}"></td>
       <td>{!!$data->catatan!!}</td>
        <td>
            <form method="post" action="/testimoni/hapus_testi/{{$data->id}}" class="d-inline">
              @csrf
              @method('delete')
              <button class="btn btn-danger btn-sm"  onclick="return confirm ('yakin ingin menghapus?')"><i class="fas fa-trash"></i> Delete</button>
            </form>
           <a href="/testimoni/edit_testi/{{$data->id}}" class="btn btn-info btn-sm">
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