@extends('master.tampil')
@section('tittle','Data Arsip MAPABA')
@section('page','Data Arsip MAPABA')
@section('contentt','Halaman Data Arsip MAPABA')
@section('content')


@if(Session::get('edit'))
<div class="alert alert-info" role="alert">
 {{Session::get('edit')}}
</div>
@endif


<div class="table-wrapper">
  <table id="tabel-data" class="table table-striped table-hover" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Kampus</th>
                <th>Tahun</th>
                <th>Program Studi</th>
                <th>No HP</th>
                <th>Aksi</th>
              
            </tr>
        </thead>
        
        <tbody>
          @php $no=1;@endphp

          @foreach($data as $list)
        <tr>
            <th>{{$no++;}}</th>
            <td>{{$list->name}}</td>
            <td>{{$list->kampus}}</td>
            <td>{{optional($list->tahun)->tahun??null}} <a href="/history-datamapaba/list-tahun-angkatan/{{$list->tahun->id ?? ''}}"> (Lihat) </a></td>
            <td>{{optional($list->progdi)->progdi??null}}<a href="/history-datamapaba/list-mahasiswa-program-studi/{{$list->progdi->id ?? ''}}"> (Lihat)</a></td>
            <td>{{$list->hp}}</td>
            <td><a href="/history-datamapaba/edit-arsip/{{$list->id}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>

           <form method="post" action="/history-datamapaba/delete-history/{{$list->id}}" class="d-inline">
             @csrf
             @method('delete')
             <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus?')"><i class="fas fa-trash"></i> Hapus</button>
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
	 
	 	 <script>
  function refresh(){
        window.location.reload("Refresh")
      }
</script>
@endsection