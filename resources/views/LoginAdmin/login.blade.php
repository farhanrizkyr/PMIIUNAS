
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>log in | Back Office</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('v_admin')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('v_admin')}}//plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('v_admin')}}//dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <div class="login-logo">
  
  </div>
  <!-- /.login-logo -->
  <div class="card">
    
    <div class="card-body login-card-body">
      @if(Session::get('pesan'))
            <div class="alert alert-success text-center mb-5" role="alert">
              {{Session::get('pesan')}}
            </div>
            @endif

               @if(Session::get('hapus'))
            <div class="alert alert-warning text-center mb-5" role="alert">
              {{Session::get('hapus')}}
            </div>
            @endif
       <h3 class="text-center"> <i class="fas fa-cog"></i> PMIIUNAS</h3>
      <p class="login-box-msg">Back Office <br>
        Web Application PMII Komisariat Universitas Nasional
       </p>


      <form action="{{route('loginakses')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="username" class="form-control" placeholder="Username" name="username">

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          
          </div>
        </div>
         @error('username')
             <p class="text-danger">{{$message}}</p>
            @enderror
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
         @error('password')
             <p class="text-danger">{{$message}}</p>
            @enderror
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-2 mt-4 text-center">Design and constructed by 
                            <a>PMII © Komisariat Universitas Nasional</a>- {{date('Y')}} All Right Reserved
                        </p>

    
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('v_admin')}}//plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('v_admin')}}//plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('v_admin')}}//dist/js/adminlte.min.js"></script>
</body>
</html>
