@extends('master.tampil')
@section('tittle','Struktur Organisasi')
@section('page',' Struktur Organisasi')
@section('contentt','Halaman  Struktur Organisasi')
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
<br><br>
<a href="/strukturs/tambah_struktur" class="btn btn-primary">
  <i class="fa fa-plus"></i>
  Tambah Struktur Kepengurusan</a>
  <br><br>
 
<div class="table-wrapper">
  <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama </th>
                <th>Foto</th>
                <th>Twitter</th>
                <th>Instagram</th>
                <th>LinkedIn</th>
                <th>Facebook</th>
                <th>Biro Kepengurusan</th>
                <th>Aksi</th>
              
            </tr>
        </thead>
        <tbody>
          <tr>
            @php $no=1;@endphp
            @foreach($struktur as $data)
            <td>{{$no++;}}</td>
            <td>{{$data->name}}</td>
            <td><img width="100" class="rounded-circle" src="{{url('FotoStruktur',$data->gambar)}}" alt="{{$data->gambar}}"></td>
            <td>
              @if($data->tw==null)
              <p class="text-danger">Tidak diinput </p>
              @endif
               @if($data->tw)
              <p><a href="{{$data->tw}}">Twitter</a></p>
              @endif
            </td>
           <td>
             @if($data->ig==null)
              <p class="text-danger">Tidak diinput </p>
              @endif
               @if($data->ig)
              <p><a href="{{$data->ig}}">Instagram</a></p>
              @endif
           </td>
              
           <td>
         @if($data->linkeld==null)
              <p class="text-danger">Tidak diinput </p>
              @endif
               @if($data->linkeld)
              <a href="{{$data->linkeld}}"> LinkedIn</a>
              @endif
           </td>
 <td>
         @if($data->fb==null)
              <p class="text-danger">Tidak diinput </p>
              @endif
               @if($data->fb)
              <a href="{{$data->fb}}"> Facebook</a>
              @endif
           </td>
           <td>{{$data->biro}}</td>
          <td> 

            <form method="post" action="/strukturs/hapus_pengurus/{{$data->id}}">
              @csrf
              @method('delete')
              <button onclick="return confirm ('yakin ingin menghapus?')" class="btn btn-danger btn-sm">  <i class="fas fa-trash"></i> Delete</button>
            </form>
            <a href="/strukturs/edit_pengurus/{{$data->id}}" class="btn btn-warning btn-sm">
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