@extends('master.tampil')
@section('tittle','Sliders')
@section('page',' Slider')
@section('contentt','Halaman Slider')
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
<a href="/sliders/add" class="btn btn-primary">
  <i class="fas fa-plus"></i>
    Tambah Slider Baru
  </a> 
  <br><br>
  <div class="table-wrapper">
  <table class="table" id="tabel-data" >
    <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Link Artikel</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    
    <tbody>
      @php $no=1; @endphp
      @foreach($sliders as $data)
      <tr>
        <td>{{$no++;}}</td>
        <td>{{$data->name}}</td>
        <td>
          @if($data->links==null)
          <p class="text-danger">Tidak Ada Link Artikel</p>
          @endif

           @if($data->links)
          <a target="_blank" href="{{$data->links}}">{{$data->links}}</a>
          @endif
        </td>
        <td><img width="100" src="{{url('Slider',$data->gambar)}}" alt=""></td>
        <td>
            <form method="post" action="/sliders/hapus_slider/{{$data->id}}" class="d-inline">
              @csrf
              @method('delete')
              <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus')">
                <i class="fas fa-trash"></i>
            Delete</button>
            </form>
           <a href="/sliders/edit_slider/{{$data->id}}" class="btn btn-info">
        <i class="fas fa-edit"></i>
             Edit
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