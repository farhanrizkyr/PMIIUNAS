@extends('master.tampil')
@section('tittle','User Account Kader')
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
                <h3>{{$aktif}}</h3>

                <p>Akun Aktif</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$not}}</h3>

                <p>Akun DiBlock</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
          
            </div>


          </div>
 
          
          </div>
          
          <!-- ./col -->
    </section>
<a href="/anggota_kader/tambah_akun" class="btn btn-primary">
<i class="fas fa-plus"></i>
Tambah Kader</a>
<br><br>

  <div class="table-wrapper">
  <table class="table" id="tabel-data" >
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th>Nama</th>
        <th>Postingan Artikel</th>
        <th>Status</th>
        <th>aksi</th>
      </tr>
    </thead>

    <tbody>
      @php $no=1; @endphp
      @foreach($kaders as$kader)
       <tr>
         <th class="text-center">{{$no++}}</th>
         <td><a href="/anggota_kader/detail-kader/{{$kader->username}}">{{$kader->name}}</a></td>
         <td>{{$kader->posts->count()}}</td>
         <td>
           @if($kader->status=='active')
           <p class="badge badge-success">Akun Aktif</p>
           @endif

            @if($kader->status=='disable')
           <p class="badge badge-danger">Akun Di Blokir</p>
           @endif
         </td>

         <td>
           <a href="/anggota_kader/ubahstatus/{{$kader->id}}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
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