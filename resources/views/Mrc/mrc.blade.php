@extends('master.tampil')
@section('tittle','Merchandise')
@section('page','Merchandise')
@section('contentt','Halaman Merchandise')
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

<a href="/merchandise/add_mrc" class="btn btn-primary">
  <i class="fas fa-plus"></i>
    Tambah Merchandise Baru
  </a> 
  <br><br>
  <div class="table-wrapper">
  <table class="table" id="tabel-data" >
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Status</th>
        <th>Cp</th>
        <th>Aksi</th>
      </tr>
    </thead>
    
    <tbody>
      @php $no=1; @endphp
      @foreach($mrc as $data)
      <tr>
        <td>{{$no++;}}</td>
        <td>{{$data->produk}}</td>
        <td>
          @if($data->diskon==null)
          <p>
          Rp.{{$data->harga}}
          </p>
          @endif
         @if($data->diskon)
         Harga Normal  <s><p class="text-danger">
         Rp.{{$data->harga}}
          </p></s>
          
        <p>
      Harga   Diskon Rp.{{$data->diskon}}
          </p>
          @endif
        </td>
        <td>
          @if($data->status=='Stock Ada')
          <span class="badge badge-success">
            {{$data->status}}
          </span>
          
          @endif
          @if($data->status=='Hampir Habis')
          <span class="badge badge-warning">
            {{$data->status}}
          </span>
          
          @endif
          @if($data->status=='Stock Habis')
          <span class="badge badge-danger">
            {{$data->status}}
          </span>
          
          @endif
          
       <td><a href="https://wa.me/{{$data->cp}}" target="_blank">{{$data->cp}}</a></td>
        </td>
        <td>

            <form action="/merchandise/hapus_mrc/{{$data->id}}" method="post" class="d-inline">
              @csrf
              @method('delete')
              <button onclick="return confirm('yakin ingin menghapus?')" class="btn btn-danger" > <i class="fas fa-trash"></i>Hapus</button>
            </form>
           <a href="/merchandise/edit_mrc/{{$data->id}}" class="btn btn-info">
        <i class="fas fa-edit"></i>
             Edit
           </a>
           <a href="/merchandise/detail/{{$data->slug}}" class="btn btn-warning">
             <i class="fas fa-eye"></i>
             Detail
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

@endsection