@extends('master.tampil')
@section('tittle','Pengurus')
@section('page','Pengurus')
@section('contentt','Halaman Pengurus')
@section('content')
@if(Session::get('pesan'))
<div class="alert alert-primary" role="alert">
  {{Session::get('pesan')}}
</div>
@endif
@if(Session::get('hapus'))
<div class="alert alert-warning" role="alert">
  {{Session::get('hapus')}}
</div>
@endif
<br><br>
<a href="/listpengurus/tambah_data_pengurus" class="btn btn-primary">
  <i class="fas fa-plus"></i>
    Tambah Kepengurusan
  </a> 
  <br><br>
  <div class="table-wrapper">
  <table class="table" id="tabel-data" >
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Tahun Angkatan</th>
        <th>Fakultas/Program Studi</th>
        <th>Tempat</th>
        <th>Tanggal Lahir</th>
        <th>E-mail</th>
        <th>Hp</th>
        <th>Alamat</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; ?>
      @foreach($datas as $data)
      <tr>
      <th class="text-center">{{$no++;}}</th>
      <td>{{$data->nama}}</td>
      <td>{{$data->tahun->tahun}}</td>
      <td>{{$data->progdi->progdi}}</td>
      <td>{!!$data->tempat!!}</td>
      <td>{{$data->tanggallahir}}</td>
      <td>{{$data->email}}</td>
      <td>{{$data->hp}}</td>
      <td>{!!$data->alamat!!}</td>
      <td>
       <a href="/listpengurus/edit_pengurus/{{$data->id}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>

          <form method="post" action="/listpengurus/hapus_pengurus/{{$data->id}}" class="d-inline">
              @csrf
              @method('delete')
              <button onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
            </form>
         <form method="post" action="/listpengurus/demisioner_pengurus/{{$data->id}}" class="d-inline">
              @csrf
              @method('put')
              <button onclick="return confirm('Anda Yakin?')" class="btn btn-default btn-sm"><i class="fas fa-check"></i> Domisioner</button>
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