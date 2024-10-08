@extends('master_kader.tampil')
@section('title','Buat Testimoni')

@section('content')
<br><br><br>
@if(Session::get('gagal'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>{{Session::get('gagal')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(Session::get('pesan'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>{{Session::get('pesan')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<h1>Berikan Testimoni</h1>
@if($datas->count()>0)
<div class="alert alert-warning" role="alert">
 Anda Hanya Bisa Input Testimoni Hanya 1x 
</div>
@endif
<br><br><br>
@if(Auth::user()->status=='active')
@if($datas->count()<1)
<button type="button" class="btn btn-primary  mb-4" data-toggle="modal" data-target="#exampleModal">
  <i class="fas fa-plus"></i> Buat Testimoni
</button>
@endif
@endif



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Buat Testimoni</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/kader/create-testimoni">
        	@csrf
        	<div class="form-group">
        		<label>Testimoni</label>
        		<textarea name="catatan" id="editor1"></textarea>
            @error('catatan')
            <p class="text-danger">{{$message}}</p>
            @enderror
        	</div>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="card" style="padding:33px;">
 <div class="table-responsive">
   <table class="table">
     <thead>
       <tr>
         <th>Testimoni</th>
         <th>Upload</th>
         <th>Aksi</th>
       </tr>
     </thead>
    
      <tbody>
        @foreach($datas as $data)
        <tr>
          <td>
            @if(strlen($data->catatan)>150)
              {!!substr($data->catatan,0,150)!!} <a href=""class="mb-4" data-toggle="modal" data-target="#detail-catatan{{$data->id}}">Lanjutkan Membaca....</a>
              @else
              {!!$data->catatan!!}
            @endif
          </td>
          <td>{{$data->time()}}</td>
          <td>

            @if(Auth::user()->status=='active')
            <a href="/kader/testimoni/edit-testimoni/{{$data->id}}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
            <a href=""class="btn btn-danger " data-toggle="modal" data-target="#delete-catatan{{$data->id}}"><i class="fas fa-trash"></i> Delete</a>
            @endif


            @if(Auth::user()->status=='disable')
            <a href=""class="btn btn-danger " data-toggle="modal" data-target="#delete-catatan{{$data->id}}"><i class="fas fa-trash"></i> Delete</a>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
   </table>
 </div> 
</div>

  @foreach($datas as $data)
<div class="modal fade" id="detail-catatan{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Detail Testimoni</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       {!!$data->catatan!!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
      </div>
    </div>
  </div>
</div>

  @endforeach



  @foreach ($datas as $data)
  <div class="modal fade" id="delete-catatan{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Testimoni</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <p>
          Apakah Anda Ingin Menghapus Testimoni?
         </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
          <form method="post" action="/kader/testimoni/delete-testimoni/{{$data->id}}" class="d-inline">
            @csrf
            @method('delete')
            <button  class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach


@endsection