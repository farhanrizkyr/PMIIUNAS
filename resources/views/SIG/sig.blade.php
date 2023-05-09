@extends('master.tampil')
@section('tittle','Pendaftaran SIG')
@section('page','Pendaftaran SIG')
@section('contentt','Halaman Pendaftaran SIG')
@section('content1')
<section class="content mt-5">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box badge-success">
              <div class="inner">
                <h3>{{$setuju}}</h3>

                <p>Peserta Sudah Divalidasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$belum}}</h3>

                <p>Peserta Belum Divalidasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
          
            </div>


          </div>
 
          
          </div>
          
          <!-- ./col -->
    </section>

@endsection
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
<button class="btn btn" type="button" style="float:right; background:lightgrey;" 
                onClick="window.location.reload();">Refresh Halaman <i
class="fas fa-sync-alt"></i></button>
<br><br>

  <div class="table-wrapper">
  <table class="table table-hover" id="tabel-data" >
    <thead>
      <tr>
        <th>no</th>
        <th>Nama</th>
        <th>Sertifikat</th>
        <th>Asal Rayon</th>
        <th>Pasangan</th>
        <th>Email 1</th>
        <th>Email 2</th>
        <th>HP</th>
        <th>Status</th>
        <th>Bukti Transfer</th>
        <th>Sertifikat MAPABA</th>
        <th>Surat Rekomendasi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    
    <tbody>
      @php $no=1; @endphp
      @foreach($data_sig as $data)
      <tr>
        <td>{{$no++;}}</td>
        <td>{{$data->name}}</td>
        <td>
           @if($data->sertifat==null)
          <span class="badge badge-danger">
            Sertifikat SIG Belum Diberikan
          </span>
          @endif
          
             @if($data->sertifat)
            <a class="btn btn-success" href="/Sertifikat_SIG/{{$data->sertifat}}">
              <i class="fas fa-download"></i>
              Download</a>
          @endif
        </td>
        <td>{{$data->asalrayon}}</td>
        <td>{{$data->pasangan}}</td>
      <td><a href="mailto:{{$data->email1}}">{{$data->email1}}</a></td>
        <td><a href="mailto:{{$data->email2}}">{{$data->email2}}</a></td>
        <td>{{$data->hp}}</td>
        <td>
          @if($data->status=='Belum Divalidasi')
          <span class="badge badge-danger">
            {{$data->status}}
          </span>
          @endif
        @if($data->status=='Sudah Divalidasi')
          <span class="badge badge-success">
            {{$data->status}}
          </span>
          @endif
  <td><a href="/Bukti_Transfers/{{$data->bukti1}}" class="btn btn-success">
          <i class="fas fa-download"></i>
          Download File</a></td>
          <td><a href="/Bukti_Sertifikat/{{$data->bukti2}}" class="btn btn-success">
          <i class="fas fa-download"></i>
          Download File</a></td>
          
       <td><a href="/Bukti_SuratRekomendasi/{{$data->bukti3}}" class="btn btn-success">
          <i class="fas fa-download"></i>
          Download File</a></td>

        <td>

            <form method="post" action="/listsig/hapus_peserta_sig/{{$data->id}}" class="d-inline">
              @csrf
              @method('delete')
              <button  onclick="return confirm ('yakin ingin menghapus?')" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
            </form>
               
           <a href="/listsig/edit_peserta_sig/{{$data->id}}" class="btn btn-info">
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
	 
	 <script>
  function refresh(){
        window.location.reload("Refresh")
      }
</script>

@endsection