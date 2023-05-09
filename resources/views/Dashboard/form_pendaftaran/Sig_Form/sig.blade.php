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
      <h5 class="text-center">Form Pendaftaran Sekolah Islam Gender (SIG)</h5>
      <form method="post" action="/formpendaftaranSIG/proses_pendaftaran_sig"enctype="multipart/form-data">
        @csrf
        <div class="grup">
          <label for="">Nama</label>
          <input type="text" name="name" class="form-control " autocomplete="off"  value="{{old('name')}}">
          @error('name')
          <div class="text-danger">
            {{$message}}
          </div>
          @enderror
        </div>
         <div class="grup">
          <label for="">Email 1</label>
          <input type="text" name="email1" class="form-control" autocomplete="off"  value="{{old('email1')}}">
          @error('email1')
          <div class="text-danger">
            {{$message}}
          </div>
          @enderror
        </div>
        <div class="grup">
          <label for="">Email 2</label>
          <input type="text" name="email2" class="form-control" autocomplete="off"  value="{{old('email2')}}">
          @error('email2')
          <div class="text-danger">
            {{$message}}
          </div>
          @enderror
        </div>
 <div class="grup">
          <label for="">HP (WA)</label>
          <input type="tel" name="hp" class="form-control" autocomplete="off"  value="{{old('hp')}}">
          @error('hp')
          <div class="text-danger">
            {{$message}}
          </div>
          @enderror
        </div>
        <div class="grup">
          <label for="">Asal Rayon</label>
          <input type="text" name="asalrayon" class="form-control" autocomplete="off"  value="{{old('asalrayon')}}">
          @error('asalrayon')
          <div class="text-danger">
            {{$message}}
          </div>
          @enderror
        </div>
        <div class="grup">
          <label for="">Pasangan</label>
          <input type="text" name="pasangan" class="form-control" autocomplete="off"  value="{{old('pasangan')}}">
          @error('pasangan')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
 <div class="grup">
          <label for="">Bukti Transfer</label>
          <input type="file" name="bukti1" class="form-control" autocomplete="off"  value="{{old('bukti1')}}">
          @error('bukti1')
          <div class="text-danger">
            {{$message}}
          </div>
          @enderror
        </div>
 <div class="grup">
          <label for="">Sertifikat MAPABA</label>
          <input type="file" name="bukti2" class="form-control" autocomplete="off"  value="{{old('bukti2')}}">
          @error('bukti2')
          <div class="text-danger">
            {{$message}}
          </div>
          @enderror
        </div>
        <div class="grup">
          <label for="">Surat Rekomendasi</label>
          <input type="file" name="bukti3" class="form-control" autocomplete="off"  value="{{old('bukti3')}}">
          @error('bukti3')
          <div class="text-danger">
            {{$message}}
          </div>
          @enderror
        </div>
        <button class="btn btn-primary mt-5">Submit</button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>   
</html>