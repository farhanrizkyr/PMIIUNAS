@extends('master.tampil')
@section('tittle','Pendaftaran MAPABA')
@section('page','Peserta MAPABA')
@section('contentt','Halaman  Peserta MAPABA')
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

@if(Session::get('edit'))
<div class="alert alert-info" role="alert">
 {{Session::get('edit')}}
</div>
@endif
<button class="btn" type="button" style="float:right; background:lightgrey;" 
                onClick="window.location.reload();">Refresh Halaman <i
class="fas fa-sync-alt"></i></button>
<br><br><br>
<a href="/listmapaba/tambah_mapaba" class="btn btn-primary">
  <i class="fa fa-plus"></i>
  Tambah Peserta</a>
  <br></br>
  <div class="group">  

    <form method="get" style="float:right;" target="_blank" action="/listmapaba/pdf">
       <button class="btn btn-danger"><i class="fas fa-file-pdf"></i> PDF</button>
    </form>
  </div>
  <br><br>
<div class="table-wrapper">
  <table id="tabel-data" class="table table-striped table-hover" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Tanggal Daftar</th>
                <th>Kampus</th>
                <th>Tahun</th>
                <th>Program Studi</th>
                <th>No HP</th>
                <th>Pengalaman</th>
                <Th>Minat</Th>
                <th>Aksi</th>
              
            </tr>
        </thead>
        
        <tbody>
          @php $no=1; @endphp
          <tr>
         @foreach($mapabas as $datas)
         @php
         $m=substr($datas->minat,0,30)
          @endphp 
          
       
            <td>{{$no++;}}</td>
            <td>{{$datas->name}}</td>
            <td>{{Carbon\Carbon::parse($datas->created_at)->isoformat('dddd ,DD MMMM Y')}}</td>
            <td>{{$datas->kampus}}</td>
            <td>{{optional($datas->tahun)->tahun??null}}</td>
           <td>{{optional($datas->progdi)->progdi??null}}</td>
            <td>{{$datas->hp}}</td>
            <td>
              @if (strlen($datas->pengalaman)>50)
              {!! substr($datas->pengalaman,0,50) !!} <a href="listmapaba/sub/{{$datas->slug}}">Lanjutkan...</a>
              @else
              {!!$datas->pengalaman!!}
              @endif
            </td>
           <td>
            @if (strlen($datas->minat)>50)
                {!! substr($datas->minat,0,50) !!} <a href="/listmapaba/m/{{$datas->slug}}">Lanjutkan</a>
                @else
                {!!$datas->minat!!}
            @endif
           </td>
           <td>
            <form method="post" action="/listmapaba/ver_mapaba/{{$datas->id}}" class="d-inline">
              @csrf
              @method('put')
              <button class="btn btn-info btn-sm"><i class="fab fa-get-pocket"></i> Approve</button>
            </form>

              <form method="post" action="/listmapaba/hapus_mapaba/{{$datas->id}}" class="d-inline">
              @csrf
              @method('delete')
              <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus?')"><i class="fas fa-trash"></i> Hapus</button>
            </form>
               <a href="/listmapaba/edit_mapaba/{{$datas->id}}" class="btn btn-warning btn-sm">
               <i class="fas fa-edit"></i>
                 Edit</a>
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