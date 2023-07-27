@extends('master_kader.tampil')
@section('title','Category')
@section('content')
@if(Session::get('pesan'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>{{Session::get('pesan')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(Session::get('ubah'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>{{Session::get('ubah')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(Session::get('hapus'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>{{Session::get('hapus')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<br><br>
<div class="alert alert-warning" role="alert">
 Data Category yang sudah ada jangan dihapus!!
</div>
<br><br>
<a href="/kader/category/tambah_category" class="btn btn-primary"><i class="fas fa-plus"></i> Buat Category Baru</a>
<br><br>
<div class="card" style="padding:7px;">
  <table id="tabel-data" class="table display">
 <thead>
    <tr>
    <th>No</th>
    <th>Category</th>
    <th>Aksi</th>
  </tr>
 </thead>
 <tbody>
   <?php $no=1; ?>
  @foreach ($categories as $data)
     <tr>
       <th>{{$no++;}}</th>
       <td>{{$data->name}}</td>
       <td>
        <form method="post" action="/kader/hapus_category/{{$data->id}}"  class="d-inline">
          @csrf
          @method('delete')
          <button onclick="return confirm('Yakin Ingin Menghapus Data Category: {{$data->name}}')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
        </form>

      <a href="#"  data-toggle="modal" data-target="#edit-category{{$data->id}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
       
       </td>
     </tr>
   @endforeach
 </tbody>
</table>
</div>

<!-- Modal  Edit-->
  @foreach ($categories as $data)
<div class="modal fade" id="edit-category{{$data->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Category </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post" action="/kader/proses_edit_category/{{$data->id}}">
   @csrf
    <div class="grup">
    <label for="">Category</label>
    <input type="text" name="name" class="form-control" value="{{$data->name}}">
        @error('name')
          <p class="text-danger">{{$message}}</p>
          @enderror
          <br><br>
          
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Save</button>
         </form>
      </div>
    </div>
  </div>
</div>
@endforeach
<!-- End Edit Category-->

@endsection



  
