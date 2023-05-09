<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Peserta Mapaba</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('v_admin')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('v_admin')}}/dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> PMII Komisariat Universitas Nasional.
          <small class="float-right">Date: {{date('d/m/Y')}}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
  
        <b> Panitia:</b> {{Auth::user()->name}}
         
        </address>
      </div>
      <!-- /.col -->
     
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>Kampus</th>
            <th>Tahun</th>
            <th>Program Studi</th>
            <th>No HP</th>
            <th>Pengalaman</th>
            <th>Minat</th>
          </tr>
          </thead>
          <tbody>
            @php $no=1; @endphp
            @forelse($mapabas as $mapaba)
          <tr>
            <td class="text-center">{{$no++;}}</td>
            <td>{{$mapaba->name}}</td>
            <td>{{$mapaba->kampus}}</td>
            <td>{{$mapaba->tahun->tahun}}</td>
            <td>{{$mapaba->progdi->progdi}}</td>
            <td>{{$mapaba->hp}}</td>
            <td>{!!$mapaba->pengalaman!!}</td>
            <td>{!!$mapaba->minat!!}</td>
          </tr>
          @empty
            <tr >
              <td colspan="8"><div class="alert alert-dark" role="alert">
              Tidak Ada Ada Data Pendaftaran
</div></td>
            </tr>
          @endforelse
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
