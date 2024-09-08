@extends('master_kader.tampil')
@section('title','Postingan Artikel')
@section('content')
@if(Session::get('pesan'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>{{Session::get('pesan')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(Session::get('hapus'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{Session::get('hapus')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<br>

<br><br><br>
@if(Auth::user()->status=='active')
<a href="/kader/artikel/tambah_artikel" class="btn btn-primary mb-4"> <i class="fas fa-plus"></i> Tamabah Post</a>

@endif

@if(Auth::user()->status=='disable')
<button class="btn btn-secondary mb-4" disabled><i class="fas fa-plus "></i> Tambah Post</button>


          <div class="alert alert-warning" role="alert">
 <i class="fas fa-info-circle"></i>  Akun Anda Sudah DiBlokir Jika Ingin Membuka Blokir Silahkan Hubungi Pengurus
</div>
@endif

<h1>Post Artikel</h1>
<div class="table-wrapper card" style="padding:10px;">
  <table id="tabel-data" class="table display">
    <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Status</th>
        <th>Upload Artikel</th>
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
        <td>
          @if($data->status=='publish')
          <span class="badge badge-success">Publish</span>
          @endif


         @if($data->status=='draft')
          <span class="badge badge-danger">UnPublish</span>
          @endif
        </td>
        <td>{{$data->created_at->isoformat('dddd D, MMMM Y')}}</td>
        <td><img width="150" src="{{$data->image()}}" alt="{{$data->image}}"></td>
        <td>
            <span class="badge badge-primary">
            {{optional($data->category)->name??null}}
            </span>
          </td>
        <td><a href="#" data-toggle="modal" data-target="#detail-artikel{{$data->id}}">{!!$body!!}</a></td>
        <td>
     
       <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapus-artikel{{$data->id}}"><i class="fas fa-trash"></i> Delete</a>
          
         <a href="/kader/edit_post/{{$data->slug}}" class="btn btn-warning">
           <i class="fas fa-edit"></i>
            edit</a>
        </td>
      </tr>
  
@endforeach
</div>
@foreach($posts as $data)
<div class="modal fade" id="detail-artikel{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-white bg-primary">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-newspaper"></i> Postingan Draft Artikel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <article>
          <h5>{{$data->name}}</h5>
          <hr>
          {!!$data->body!!}
        </article>
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
@endforeach


@foreach ($posts as $data)
    <div class="modal fade" id="hapus-artikel{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-white bg-danger">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-newspaper"></i> Hapus Postingan  Artikel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda ingin menghapus Artikel dengan judul {{$data->name}} ?
      </div>
      <div class="modal-footer">

      <form method="post" action="/kader/proses_hapus_post/{{$data->id}}" class="d-inline">
            @csrf
            @method('delete')
            <button class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
          </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ocatagone"></i> Close</button>
        
      </div>
    </div>
  </div>
</div>
@endforeach
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
