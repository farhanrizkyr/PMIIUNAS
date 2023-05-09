@extends('master.tampil')
@section('tittle','Sejarah PMII')
@section('page','Sejarah PMII')
@section('contentt','Halaman Sejarah PMII')
@section('content')
@if(Session::get('pesan'))
<div class="alert alert-primary" role="alert">
  {{Session::get('pesan')}}
</div>
@endif
<br><br>

  <br><br>
  <table class="table table-hover" id="tabel-data">
  	<thead>
      <tr>
  		<th>No</th>
      <th>Judul</th>
  		<th>Profile </th>
  		<th>Aksi</th>
    </tr>
  	</thead>

    <tbody>
     <?php  $no=1; ?>
      @foreach($data as $alamat)
      <?php $profile=substr($alamat->profile,0,30) ?>
      <tr>
        <th>{{$no++;}}</th>
        <td>{{$alamat->judul}}</td>
        <td><a href="/profpmiiunas/more/{{$alamat->id}}">{!!$profile!!}</a></td>
        <td>
          <a href="/profpmiiunas/edit_profile/{{$alamat->id}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>  Edit</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>


@endsection