@extends('master.tampil')
@section('tittle')
Postingan Blog: {{$user->name}}
@endsection
@section('content')
<h3>List Postingan Blog: {{$user->name}}</h3><br><br>
<b><h4 class="text-center">Jumlah Postingan: {{$user->posts->count()}}</h4></b>
<div class="table-wrapper">
	<table class="table table-hover" id="tabel-data">
	<a href="javascript:window.close();" class="btn btn-warning mb-3"><i class="fas fa-arrow-left"></i> Kembali Ke List Anggota Kader</a>
	<thead>
		 <tr>
        <th class="text-center">No.</th>
        <th>Judul Postingan</th>
		<th>Category Postingan</th>
        <th>Gambar</th>
        <th>Upload Postingan</th>
        <th>Body</th>
      </tr>

      <tbody>
      	@foreach($data as $datas)

      	@php $body=substr($datas->body,0,150) @endphp
      	<tr>
      		<td>{{$loop->iteration}}</td>
      		<td>{{$datas->name}}</td>
			<td>{{optional($datas->category)->name ??  ''}}</td>
      		<th><img width="150" src="{{$datas->image()}}" alt="{{$datas->image}}"></th>
      		<td>{{Carbon\Carbon::parse($datas->created_at)->isoformat('dddd D, MMMM Y')}}</td>
      		<td width="30%">{!!$body!!}</td>
      	</tr>

      	@endforeach
      </tbody>
	</thead>

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