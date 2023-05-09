@extends('master_kader.tampil')
@section('title','Category')
@section('content')
@if(Session::get('pesan'))
<div class="alert alert-primary" role="alert">
  {{Session::get('pesan')}}
</div>
@endif
@if(Session::get('ubah'))
<div class="alert alert-warning" role="alert">
  {{Session::get('ubah')}}
</div>
@endif
@if(Session::get('hapus'))
<div class="alert alert-danger" role="alert">
  {{Session::get('hapus')}}
</div>
@endif
<br><br>
<a href="/kader/category/tambah_category" class="btn btn-primary">Buat Category Baru</a>
<br><br>
<div class="card" style="padding:7px;">
  <table id="tabel-data" class="table display">
 <thead>
    <tr>
    <th>No</th>
    <th>Category</th>
    <th>Aksi</th>
  </tr>
 </thead>
 <tbody>
   <?php $no=1; ?>
  @foreach ($categories as $data)
     <tr>
       <th>{{$no++;}}</th>
       <td>{{$data->name}}</td>
       <td>
         <a href="/kader/edit_category/{{$data->id}}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
       </td>
     </tr>
   @endforeach
 </tbody>
</table>
</div>

@endsection
