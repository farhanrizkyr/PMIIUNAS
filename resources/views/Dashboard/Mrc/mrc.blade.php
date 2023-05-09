<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testing demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
<h1 class="text-center mb-5 mt-5">Merchandise </h1>
<hr>
<div class="container mb-5">
	  	<div class="row col-md-24 mb-5">
  		@forelse($mrc as $data)
  		<div class="col mb-3 ">
  			<div class="card" style="width: 18rem;">
  <img src="{{$data->gambar()}}" class="card-img-top" alt="{{$data->gambar}}">
  <div class="card-body">
    <h5 class="card-title">{{$data->produk}}</h5>
    <hr>
      @if($data->status=='Stock Ada')
        Stock:  <span class="badge bg-success">
            {{$data->status}}
          </span>
          
          @endif
          @if($data->status=='Hampir Habis')
        Stock:  <span class="badge bg-warning">
            {{$data->status}}
          </span>
          
          @endif
          @if($data->status=='Stock Habis')
        Stock:	<span class="badge bg-danger">
            {{$data->status}}
          </span>
          
          @endif
          <br>
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
    <p class="card-text">{!!$data->desc!!}</p>
    @if($data->status=='Stock Ada')
    <a href="https://wa.me/{{$data->cp}}" class="btn btn-success">Pesan</a>
    @endif
     @if($data->status=='Hampir Habis')
    <a href="https://wa.me/{{$data->cp}}" class="btn btn-success">Pesan</a>
    @endif

     @if($data->status=='Stock Habis')
     <a href="https://wa.me/{{$data->cp}}"  class="btn btn-danger disabled">Pesan</a>
    @endif
  </div>
  <div class="card-footer">
  {{$data->created_at->diffForHumans()}}
  </div>
</div>
  		</div>
         @empty
          <div class="alert alert-primary" role="alert">
      <center>Belum Ada Data</center> 
</div>
  		@endforelse


  		{{$mrc->links()}}
  	</div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
