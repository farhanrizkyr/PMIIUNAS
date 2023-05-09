@extends('master.tampil')
@section('tittle','Saran')
@section('page',' Saran')
@section('contentt','Halaman Saran')
@section('content')
@if(Session::get('pesan'))
<div class="alert alert-primary" role="alert">
  {{Session::get('pesan')}}
</div>
@endif
<br><br>

  <div class="table-wrapper">
  <table class="table" id="tabel-data" >
    <thead>
      <tr>
        <th>No</th>
        <th>E-Mail</th>
        <th>Subject</th>
        <th>Description</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    	<?php $no=1; ?>
    	@foreach($sarans as $saran)
      <tr>
      	    <td>{{$no++;}}</td>
      	    <td>{{$saran->email}}</td>
      	    <td>{{$saran->subject}}</td>
      	    <td>{!!$saran->description!!}</td>
      	    <td>
      	    	<form method="post" action="/saran/hapus/{{$saran->id}}" class="d-inline">
      	    		@csrf
      	    		@method('delete')
      	    		<button onclick="return confirm('Yakin Ingin Menghapus')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
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