@extends('master.tampil')
@section('tittle','Profile Rayon')
@section('content')
@section('page',' Profile Rayon')
@section('contentt','Halaman Profile Rayon')
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
<a href="/profilesrayon/add" class="btn btn-primary">
  <i class="fas fa-plus"></i>
    Tambah Profile Rayon
  </a> 
  <br><br>
  <div class="table-wrapper">
  <table class="table" id="tabel-data" >
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Rayon</th>
        <th>Logo</th>
        <th>Body</th>
        <th>aksi</th>
      </tr>
    </thead>
    
    <tbody>
      @php $no=1; @endphp
      @foreach($rayons as $data)
       @php $body=substr($data->body,0,25) @endphp
      <tr>
        <td>{{$no++;}}</td>
        <td>{{$data->title}}</td>
        <td><img width="100" src="{{url('LogoRayon',$data->gambar)}}" alt="{{$data->gambar}}"></td>
        <td><a href="/profilesrayon/more/{{$data->slug}}">{!!$body!!}</a></td>
        <td>
    
                <form method="post" action="/profilesrayon/hapus_rayon/{{$data->id}}">
              @csrf
              @method('delete')
              <button onclick="return confirm ('yakin ingin menghapus?')" class="btn btn-danger btn-sm">  <i class="fas fa-trash"></i> Delete</button>
            </form>
              
              <a href="/profilesrayon/edit_rayon/{{$data->id}}" class="btn btn-info">
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

@endsection