<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <div class="card mt-5" style="padding:5px;">
      <h5 class="text-center">Form Pendaftaran MAPABA </h5>
      <form method="post" action="/formpendaftaranMapaba/proses_pendaftaran_mapaba"enctype="multipart/form-data">
        @csrf
        <div class="grup">
          <label for="">Nama</label>
          <input type="text" name="name" class="form-control " autocomplete="off"  value="{{old('name')}}">
          @error('name')
            <p class="text-danger">{{$message}}</p>
          @enderror
          <div class="grup">
    <label for="">HP</label>
    <input type="tel" name="hp" class="form-control" value="{{old('hp')}}" autocomplete="off">
    
    @error('hp')
    <span class="text-danger">
      {{$message}}
    </span>
    @enderror
  </div>
  
    <div class="grup">
    <label for="">Kampus</label>
    <input type="text" name="kampus" class="form-control" value="{{old('kampus')}}" autocomplete="off">
    
    @error('kampus')
    <span class="text-danger">
      {{$message}}
    </span>
    @enderror
  </div>
    <div class="grup">
    <label for="">Tahun Angkatan</label>
    <select name="tahun_id" class="form-control" >
      <option value="">Pilih</option>
      @foreach($t as $d)
   <option value="{{$d->id}}">{{$d->tahun}}</option>
      @endforeach
    </select>
        @error('tahun_id')
    <span class="text-danger">
      {{$message}}
    </span>
    @enderror
  </div>
  <div class="grup">
    <label for="">Program Studi</label>
    <select name="progdi_id" class="form-control">
      <option value="">Pilih</option>
      @foreach($p as $d)
   <option value="{{$d->id}}">{{$d->progdi}}</option>
      @endforeach
    </select>
        @error('progdi_id')
    <span class="text-danger">
      {{$message}}
    </span>
    @enderror
  </div>
  
<div class="grup">
    <label for="">Minat</label>
    <textarea name="minat" class="form-control">{{old('minat')}}</textarea>
       @error('minat')
    <span class="text-danger">
      {{$message}}
    </span>
    @enderror
  </div>
  <div class="grup">
    <label for="">Pengalaman</label>
    <textarea name="pengalaman" class="form-control">{{old('minat')}}</textarea>
       @error('pengalaman')
    <span class="text-danger">
      {{$message}}
    </span>
    @enderror
  </div>
        <button class="btn btn-primary mt-5">Submit</button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>   
</html>