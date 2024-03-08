@extends('master.tampil')
@section('tittle','Setting Profile')
@section('page','Settings Profile')
@section('content')
  
  <h3>{{Auth::user()->name}}</h3>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->

            @if(Session::get('pesan'))
            <div class="alert alert-primary" role="alert">
              {{Session::get('pesan')}}
            </div>

            @endif
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">

                  <img class="profile-user-img img-fluid img-circle"
                       src="{{Auth::user()->avatar()}}"
                       alt="User profile picture">

                       <br>
                      @if ( Auth::user()->role == 'Panitia')
                    Role: <p class="badge badge-primary">Panitia</p>
                        @endif

                        @if ( Auth::user()->role == 'Pengurus')

                    Role: <p class="badge badge-success">Pengurus</p>
                        @endif
                       <br><br>
                       <form action="/user/update_avatar/{{Auth::user()->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(Auth::user()->avatar)
                         <input type="hidden" name="avatar_lama" value="{{Auth::user()->avatar}}">
                         @endif
                       	<div class="group">
                       		<label>Photo Profile</label>
                       		<input type="file" name="avatar" class="form-control">
                          @error('avatar')
                          <p class="text-danger">{{$message}}</p>
                          @enderror
                       		<br><br>
                       <button style="float:left;" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                       	</div>
                       </form>


                </div>

            
              </div>
                  <!-- /.card-body -->
              <div class="card-footer">
     <i class="fas fa-clock"></i>    Diupdate:{{Auth::user()->updated_at->DiffForHumans()}}
        </div>
               
            </div>
             <div class="bio">
               <label>Tentang Saya:</label>
                {!!Auth::user()->bio!!}
             </div>
            <!-- /.card -->

            <!-- About Me Box -->
          
            <!-- /.card -->
          </div>

          <!-- /.col -->

          <div class="col-md-9">
            <div class="card">
                 <div class="card card-primary card-outline">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                 
                
                  <li class="nav-item"><a class="nav-link bg-primary" href="#settings" data-toggle="tab">Settings Profile</a></li>

                </ul>
                
                <form method="post" action="/user/hapus/{{Auth::user()->id}}" style="float: right;">
                  @csrf
                  @method('delete')
                  <button onclick="return confirm('Yakin Ingin Menghapus?')" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus Akun</button>
                </form>
                <br><br>
                 <h5 style="float:right;"><i class="fas fa-calendar-week"></i> Dibuat: {{Auth::user()->created_at->isoformat('MMMM Y')}}</h5>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="#Profile">
                   
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="Profile">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" readonly placeholder="Name" value="{{Auth::user()->name}}">
                        </div>
                      </div>

                        <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control" id="inputName2" placeholder="Jenis Kelamin" value="{{Auth::user()->gender}}" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" readonly class="form-control" id="inputEmail" placeholder="Email" value="{{Auth::user()->email}}">
                        </div>
                      </div>
           

                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control" id="inputName2" placeholder="Username" value="{{Auth::user()->username}}">
                        </div>
                      </div>

                        <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Biro Kepengurusan</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control" id="inputName2" placeholder="Biro Kepengurusan" value="{{Auth::user()->biro}}">
                        </div>
                      </div>
                   
                    
                    
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                         <a href="/user/ubah/{{Auth::user()->username}}" class="btn btn-warning"> <i class="fas fa-user-edit"></i> Edit Profile</a>
                        </div>
                      </div>
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
      </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>


@endsection