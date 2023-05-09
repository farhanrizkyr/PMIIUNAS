@extends('master.tampil')
@section('tittle','User Pengurus')
@section('page','User Pengurus')
@section('contentt','Halaman User Pengurus')
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
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box badge-success">
              <div class="inner">
                <h3>{{$pengurus}}</h3>

                <p>Pengurus</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$panitia}}</h3>

                <p>Panitia</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
          
            </div>


          </div>
 
          
          </div>
          
          <!-- ./col -->
    </section>


<a href="/anggota_pengurus/tambah_pengurus" class="btn btn-primary">
<i class="fas fa-plus"></i>
Tambah Pengurus</a>
<br><br>
  <div class="table-wrapper">
  <table class="table" id="tabel-data" >
    <thead>
      <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Role</th>
        <th>Username</th>
        <th>aksi</th>
      </tr>
    </thead>
    <tbody>
      @php $no=1;@endphp
        @foreach($users as $user)
      <tr>
      
         <th>{{$no++}}</th>
         <td>{{$user->name}}</td>
         <td>
           @if($user->role=='Pengurus')
           <p class="badge badge-success">{{$user->role}}</p>
           @endif
            @if($user->role=='Panitia')
           <p class="badge badge-primary">{{$user->role}}</p>
           @endif
         </td>
         <td>{{$user->username}}</td>
         <td>
          <a href="/anggota_pengurus/ubah-role/{{$user->username}}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
           <form method="post" action="/anggota_pengurus/{{$user->id}}" class="d-inline">
             @csrf
             @method('delete')
             <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
           </form>
         </td>


        @endforeach
      </tr>
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