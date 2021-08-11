<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register - Toposa</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('login/css/login.css')}}">
  <link rel="stylesheet" href="{{asset('login/css/error.css')}}">
</head>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="{{asset('login/img/log.jpg')}}" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <!-- <img src="{{asset('login/img/logo.svg')}}" alt="logo" class="logo"> -->
                <h2 style="font-weight: bold;">Register here</h2>
                     <!-- <p class="login-card-description">Sign into your account</p> -->
                  @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <div style="text-align: center; margin-top: 15px">{{ $errors->first('erro') }}</div>
                            @endforeach
                        </ul>
                    </div>
                  @endif
              </div>
              <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                      <label for="name" class="sr-only">User name</label>
                      <input type="text" name="name" id="email" class="form-control" placeholder="User name">
                      <p class="error-message ">{{ $errors->first('name') }}</p>
                    </div>
                    <div class="form-group">
                      <label for="email" class="sr-only">Email Address</label>
                      <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                      <p class="error-message ">{{ $errors->first('email') }}</p>
                    </div>
                    <div class="form-group mb-4">
                      <label for="password" class="sr-only">Password</label>
                      <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                      <p class="error-message ">{{ $errors->first('password') }}</p>
                    </div>
                    <div class="form-group mb-4">
                      <label for="password" class="sr-only">Confirm - Password </label>
                      <input type="password" name="password_confirm" id="password" class="form-control" placeholder="Cofirm-Password">
                      <p class="error-message ">{{ $errors->first('password_confirm') }}</p>
                    </div>
                    <input name="register"  id="login" class="btn btn-block login-btn mb-4" type="submit" value="Register">
                </form>
                <a href="#!" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text">Don't have an account?<a href="{{url('/logins')}}">Login here</a></p>
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
