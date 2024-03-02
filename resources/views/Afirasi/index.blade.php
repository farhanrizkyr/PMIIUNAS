@extends('master_kader.tampil')
@section('title','Buat Testimoni')

@section('content')
<br><br><br>
@if(Session::get('pesan'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>{{Session::get('pesan')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<br><br><br>
@if($datas->count()<1)
<button type="button" class="btn btn-primary  mb-4" data-toggle="modal" data-target="#exampleModal">
  <i class="fas fa-plus"></i> Buat Testimoni
</button>
@endif

@if($datas->count()>0)
<button type="button" disabled class="btn btn-secondary mb-4" data-toggle="modal" data-target="#exampleModal">
  <i class="fas fa-plus"></i> Buat Testimoni
</button>
@endif




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
              {!!substr($data->catatan,0,150)!!} <a href=""class="mb-4" data-toggle="modal" data-target="#detail-catatan{{$data->id}}">more....</a>
              @else
              {!!$data->catatan!!}
            @endif
          </td>
          <td>{{$data->created_at->isoformat('dddd, D MMMM Y')}}</td>
          <td>
            <a href="/kader/testimoni/edit-testimoni/{{$data->id}}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
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
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Catatan</h5>
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


@endsection