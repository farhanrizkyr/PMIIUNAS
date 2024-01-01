@extends('master.tampil')
@section('tittle')
@section('page','Detail')
@section('contentt','Detail User Kader')
profile: {{$user->name}}
@endsection
@section('content')
  
<h3>{{$user->name}}</h3>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="rounded-circle"
                       src="{{$user->avatar()}}"
                       alt="User profile picture"  width="50%;">
                      
                </div>
                <br><br>
                	<center>  Status Akun: <h6   
          @if($user->status=='active')
           <p class="text-success"><i class="fas fa-check"></i> Aktif</p>
           @endif

            @if($user->status=='disable')
           <p class="text-danger"><i class="fas fa-times"></i> Akun Di Blokir</p>
           @endif</h6></center>
              <hr>  
            <strong><h6><i class="fas fa-newspaper"></i> Posts Artikel: {{$user->posts->count()}}</h6></strong>
            
              </div>
              <!-- /.card-body -->
                 <div class="card-footer">
     <i class="fas fa-clock"></i>Diupdate: {{$user->updated_at->diffForhumans()}}
     

        </div>
            </div>
                  <!-- /.card-body -->

            <!-- /.card -->

            <!-- About Me Box -->
            <h5>Tentang Saya : </h5>

            <article class="comment more">
               {!!$user->bio!!}
            </article>
          
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                 
                
                  <li class="nav-item"><a class="nav-link bg-primary" href="#data-profile" data-toggle="tab"><i class="fas fa-user"></i>  Data Profile</a></li>
                </ul>
                   <h5 style="float:right;"><i class="fas fa-calendar-week"></i> Dibuat: {{$user->created_at->isoformat('D MMMM Y ')}}</h5>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="settings">
                   
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="data-profile">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" value="{{$user->name}}" readonly placeholder="Name">
                        </div>
                      </div>
                       <div class="form-group row">
                         <label for="inputName" class="col-sm-2 col-form-label">ID User</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" value="{{$user->id}}" readonly placeholder="Name">
                        </div>
                      </div>

                       <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">E mail</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control" id="inputName2"  value="{{$user->email}}" placeholder="Email">
                        </div>
                      </div>

                       <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Tempat</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" value="{{$user->tempat}}" readonly placeholder="Tempat">
                        </div>
                      </div>

                       <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" value="{{$user->tl}}" readonly placeholder="Tanggal Lahir">
                        </div>
                      </div>

                        <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control" value="{{$user->gender}}" id="inputName2" placeholder="Jenis Kelamin">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" readonly class="form-control" value="{{$user->email}}" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control" id="inputName2" value="{{$user->username}}" placeholder="Username">
                        </div>
                      </div>

                        <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Rayon</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control" value="{{$user->rayon}}" id="inputName2" placeholder="Rayon">
                        </div>
                      </div>
                   
                   
                    
                     <a href="/anggota_kader" style="float:right;" class="btn btn-default"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>






@endsection

