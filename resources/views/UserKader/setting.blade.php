@extends('master_kader.tampil')
@section('title')
Setting-  {{Auth::user()->name}}
@endsection

@section('content')
    <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/kader">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div>
          </div>

@if(Auth::user()->status=='disable')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong> <i class="fas fa-info-circle"></i> User Account Anda, Telah Di Blokir Jika Ingin Membuka Silahkan Hubungi Pengurus
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


@if(Session::get('pesan'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong> <i class="fas fa-info-circle"></i> {{Session::get('pesan')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
          <div class="section-body">
            <h2 class="section-title">Hi, {{Auth::user()->name}}!</h2>
            <p class="section-lead">
              Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <img alt="image" src="{{Auth::user()->avatar()}}" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label"><i class="fas fa-newspaper"></i> Postingan Artikel</div>
                        <div class="profile-widget-item-value">{{Auth::user()->posts->count()}}</div>
                      </div>
                     
                    </div>
                  </div>
                  <div class="profile-widget-description">

                    <div class="profile-widget-name">{{Auth::user()->name}} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Bio</div></div>
                  @if(strlen(Auth::user()->bio)>370)
                {!!substr(Auth::user()->bio,0,370)!!}
                <a href="#" style="text-decoration:none;"  data-toggle="modal" data-target="#detail-bio">Tampilkan...</a>
                @else
                {!!Auth::user()->bio!!}
                @endif
                  </div>
                  <div class="card-footer text-center">
                    <div class="font-weight-bold mb-2">Log Aktivity</div>
                     @if(Auth::user()->status=='active')
                    Status: <p class="text-success">Akun Aktif</p>
                    @endif

                       @if(Auth::user()->status=='disable')
                    Status: <p class="text-danger">Akun DiBlokir</p>
                    @endif
                  <h6> <i class="fas fa-calendar-week"></i> DiBuat: {{Auth::user()->created_at->isoformat('DD MMMM Y')}}</h6>
                    <h6> <i class="fas fa-clock"></i> DiUpdate: {{Auth::user()->updated_at->diffForHumans()}}</h6>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4><i class="fas fa-user-edit"></i> Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label> Name</label>
                            <input type="text" class="form-control" value="{{Auth::user()->name}}" readonly>
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Username</label>
                            <input type="text" class="form-control" value="{{Auth::user()->username}}" readonly>
                            <div class="invalid-feedback">
                              Please fill in the last name
                            </div>
                          </div>
                        </div>

                         <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label> Email</label>
                            <input type="text" class="form-control" value="{{Auth::user()->email}}" readonly>
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Rayon</label>
                            <input type="text" class="form-control" value="{{Auth::user()->rayon}}" readonly>
                            <div class="invalid-feedback">
                              Please fill in the last name
                            </div>
                          </div>
                        </div>


                         <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label> Tempat</label>
                            <input type="text" class="form-control" value="{{Auth::user()->tempat}}" readonly>
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Tanggal Lahir</label>
                            @if(Auth::user()->tl)
                            <input type="text" class="form-control" value="{{Carbon\Carbon::parse(Auth::user()->tl)->isoformat('dddd, DD MMMM Y')}}" readonly>
                            @endif

                             @if(Auth::user()->tl==null)
                            <input type="text" class="form-control" value="" readonly>
                            @endif
                            <div class="invalid-feedback">
                              Please fill in the last name
                            </div>
                          </div>
                        </div>


                         <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label> Gender</label>
                            <input type="text" class="form-control" value="{{Auth::user()->gender}}" readonly>
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>User ID</label>
                            <input type="text" class="form-control" value="{{Auth::user()->id}}" readonly>
                            <div class="invalid-feedback">
                              Please fill in the last name
                            </div>
                          </div>
                        </div>

                         


                       
                  
                    <div class="card-footer text-right">
                     <a href="/user-change-profile/" class="btn btn-primary"><i class="fas fa-edit"></i> Edit </a>
                     <button type="button" style="background:salmon;" class="btn" data-toggle="modal" data-target="#exampleModal">
                   <i class="fas fa-user-edit"></i> Change Avatar
                  </button>

                 
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Choose Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="/user-profile/check_avatar/{{Auth::user()->id}}" enctype="multipart/form-data">
        @csrf
         @if(Auth::user()->avatar)
            <input type="hidden" name="avatar_lama" value="{{Auth::user()->avatar}}">
          @endif
        <div class="grup">
          <label>Avatar</label>
          <input type="file" name="avatar" class="form-control @error('avatar')is-invalid @enderror">
          @error('avatar')
          <p class="text-danger">{{$message}}</p>
          @enderror

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- detail data -->
    <div class="modal fade" id="detail-bio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-user"></i> Detail Bio Saya :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="table-responsive">
         {!!Auth::user()->bio!!}
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
        
      </div>
    </div>
  </div>
  <!--End detail data -->


@endsection
