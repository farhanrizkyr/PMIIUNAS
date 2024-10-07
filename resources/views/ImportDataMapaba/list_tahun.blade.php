@extends('master.tampil')
@section('tittle')
List Data Tahun Angkatan Mahasiswa: {{$id->tahun}}
@endsection
@section('page','Data Arsip MAPABA')
@section('contentt')
List Data Tahun Angkatan Mahasiswa: {{$id->tahun}}
@endsection
@section('content')
<a href="/history-datamapaba/" class="btn btn-success mb-4"><i class="fas fa-arrow-left"></i> Kembali Ke List Data History Mapaba</a>
<div class="table-wrapper">

  <table id="tabel-data" class="table table-striped table-hover" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Program Studi </th>    
            </tr>
        </thead>
        
        <tbody>
          @php $no=1;@endphp
          @foreach($datas as $list)
           <tr>
           	<th>{{$loop->iteration}}</th>
           	<td>{{$list->name}}</td>
            <td>{{optional($list->progdi)->progdi}}</td>
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