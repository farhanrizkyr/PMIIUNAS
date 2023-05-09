@extends('master_kader.tampil')
@section('title','Postingan Artikel')
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
<br>

<br><br><br>
<a href="/kader/artikel/tambah_artikel" class="btn btn-primary mb-4"> <i class="fas fa-plus"></i> Tamabah Post</a>
<div class="table-wrapper card" style="padding:10px;">
  <table id="tabel-data" class="table display">
    <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Gambar</th>
        <th>Category</th>
        <th>Body</th>
        <th>Aksi</th>
      </tr>
    </thead>
    
    <tbody>
      @php $no=1; @endphp
      @foreach($posts as $data)
      @php $body=substr($data->body,0,30)
      @endphp
      <tr>
        <td class="text-center">{{$no++;}} </td>
        <td>{{$data->name}}</td>
        <td><img width="150" src="{{$data->image()}}" alt="{{$data->image}}"></td>
        <td>{{$data->category->name}}</td>
        <td><a href="/kader/detail/{{$data->slug}}">{!!$body!!}</a></td>
        <td>
      <form method="post" action="/kader/proses_hapus_post/{{$data->id}}" class="d-inline">
            @csrf
            @method('delete')
            <button onclick="return confirm ('yakin ingin menghapus?')" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
          </form>
          
         <a href="/kader/edit_post/{{$data->slug}}" class="btn btn-warning">
           <i class="fas fa-edit"></i>
            edit</a>
        </td>
      </tr>
  
@endforeach
</div>
  </table>

   <style>
 .table-wrapper {

  max-width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}
	 </style>

</div>

@endsection
