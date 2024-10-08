@extends('master.tampil')
@section('tittle')
List Data Program Studi: {{$id->progdi}}
@endsection
@section('page','Data Arsip MAPABA')
@section('contentt')
List Data Program Studi Mahasiswa: {{$id->progdi}}
@endsection
@section('content')
<a href="/history-datamapaba/" class="btn btn-success mb-4"><i class="fas fa-arrow-left"></i> Kembali Ke List Data History Mapaba</a>
<div class="table-wrapper">

  <table id="tabel-data" class="table table-striped table-hover" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Tahun Angkatan</th>    
            </tr>
        </thead>
        
        <tbody>
          @php $no=1;@endphp
          @foreach($datas as $list)
           <tr>
           	<th>{{$loop->iteration}}</th>
           	<td>{{$list->name}}</td>
            <td>{{optional($list->tahun)->tahun}}</td>
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
	 
	 	 <script>
  function refresh(){
        window.location.reload("Refresh")
      }
</script>
@endsection