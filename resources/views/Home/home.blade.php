@extends('master.tampil')
@section('tittle','Home')
@section('page',' Home')
@if ( Auth::user()->role == 'Pengurus')
@section('contentt','Halaman Home')
@endif
@section('content')
 <div class="card-body login-card-body">
      @if(Session::get('pesan'))
            <div class="alert alert-success  mb-5" role="alert">
             <i class="fas fa-check"></i> {{Session::get('pesan')}}
            </div>
            @endif

            <br><br>

@if ( Auth::user()->role == 'Panitia')
<h1>Selamat Datang Di Halaman Dashboard Panitia</h1>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box " style="background:aqua">
              <div class="inner">
                <h3>{{$i}}</h3>

                <p>Pendaftaran SIG</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/listsig" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
             <div class="col-lg-3 col-6">
           <div class="small-box " style="background:aqua">
              <div class="inner">
                <h3>{{$ap}}</h3>

                <p>Data Arsip Mapaba</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/history-datamapaba" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$ma}}</h3>

                <p>Pendaftaran Mapaba</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/listmapaba" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>


          </div>
   <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box " style="background:#646b65;">
              <div class="inner">
                <h3>{{$p}}</h3>

                <p>Program Studi</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/progdi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>

          <!-- ./col -->
          
        
          
          </div>
          
          <!-- ./col -->
    </section>
@endif
@if ( Auth::user()->role == 'Pengurus')

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$s}}</h3>

                <p>Slider</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/sliders" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box " style="background:aqua">
              <div class="inner">
                <h3>{{$i}}</h3>

                <p>Pendaftaran SIG</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/listsig" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$ma}}</h3>

                <p>Pendaftaran Mapaba</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/listmapaba" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$m}}</h3>

                <p>Merchandise</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/merchandise" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box " style="background:#646b65;">
              <div class="inner">
                <h3>{{$p}}</h3>

                <p>Program Studi</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/progdi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

         

             <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg" style="background:#ffa74e;">
              <div class="inner">
                <h3>{{$a}}</h3>

                <p>Pemberitahuan </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/pemberitahuan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg" style="background:#445f7c">
              <div class="inner">
                <h3>{{$u}}</h3>

                <p>Account Pengurus</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/anggota_pengurus" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg" style="background:coral;">
              <div class="inner">
                <h3>{{$k}}</h3>

                <p>Account Kader</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/anggota_kader" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg" style="background:coral;">
              <div class="inner">
                <h3>{{$ap}}</h3>

                <p>Data Arsip Mapaba</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/history-datamapaba" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>



          
          <!-- ./col -->
    </section>
    @endif
@endsection