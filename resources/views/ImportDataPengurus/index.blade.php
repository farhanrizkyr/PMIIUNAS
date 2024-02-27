@extends('master.tampil')
@section('tittle','Arsip Pengurus')
@section('page',' Arsip Pengurus')
@section('contentt','Halaman Arsip Pengurus')
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

  <div class="table-wrapper">
  <table class="table" id="tabel-data" >
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Tahun Angkatan</th>
        <th>Fakultas/Program Studi</th>
        <th>Tempat/Tanggal Lahir</th>
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
      <td>{{optional($data->tahun)->tahun??null}}</td>
      <td>{{optional($data->progdi)->progdi??null}}</td>
      <td>{!!$data->tempat!!} <b>{{Carbon\Carbon::parse($data->tanggallahir)->isoformat('D, MMMM Y')}}</b></td>
      <td>{{$data->email}}</td>
      <td>{{$data->hp}}</td>
      <td>{!!$data->alamat!!}</td>
      <td>
       <a href="/historydatapengurus/edit_data/{{$data->id}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>

          <form method="post" action="/historydatapengurus/hapus_pengurus/{{$data->id}}" class="d-inline">
              @csrf
              @method('delete')
              <button onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
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