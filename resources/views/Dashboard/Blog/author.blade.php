<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Author, {{$kader->name}}</title>
  </head>
  <body>
    <h1 class="text-center mt-5">Posts By:  {{$kader->name}}</h1>
    <hr>

<div class="row justify-content-center"> 
<div class="col-md-7">
  <form action="cari">
  <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Cari">
  <div class="input-group-append">
    <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
  </div>
  </form>
</div>
</div>
</div>

<div class="container">
<div class="row row-cols-1 row-cols-md-3 g-4">

  @forelse($data as $kaders)
  <?php $body=substr($kaders->body,0,500) ?>
  <div class="col-md">
    <div class="card h-100">
      <img src="{{$kaders->image()}}" class="card-img-top" alt="...">
      <div class="card-body">{{$kaders->created_at->isoformat('dddd D, MMMM Y')}}</small>
         <a href="blog/{{$kaders->slug}}" style="text-decoration:none; color:black;"><h5 class="card-title">{{$kaders->name}}</h5></a>
      
        <p class="card-text">{!!$body!!}...</p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><img width="35px;" class="rounded-circle" src="{{$kaders->post->avatar()}}" alt="{{$kaders->post->name}}"> <a href="/blog/author/{{$kaders->post->username}}" style="text-decoration:none;">{{$kaders->post->name}}</a> </small>
      </div>
    </div>
  </div>

  @empty
<div class="alert alert-primary text-center" role="alert">
  Belum Ada Postingan!!
</div>
@endforelse

  
</div>
</div>
<div class="center">
  <div class="mt-5 " style="">
     {{$data->links()}}
</div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>