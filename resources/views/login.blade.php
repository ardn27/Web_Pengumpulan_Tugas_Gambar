<!DOCTYPE html>
<html>
<head>
  <title>Login Card</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap');
    *{
      font-family: Poppins;
    }
    body {
        background-image: url(assets/6301.jpg);
      background-repeat: no-repeat;
      background-size: 100vw;
    }

    .card {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 2rem;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 5px;
      background-color: #fff;
    }

    .title span{
        padding: 3px;
        color: #fff;
        border-radius: 30px;
        background-color: #0066CC;
    }
    .card-title {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-label {
      font-weight: bold;
    }

    .btn-primary {
      width: 100%;
    }

    .text-center {
      text-align: center;
    }
  </style>
</head>
<body>
    @if (session('regis-success'))
    <div class="alert alert-success text-center">{{session('regis-success')}}</div>
@endif


    @if (session('error'))
    <div class="alert alert-danger text-center">{{(session('error'))}}</div>
    @endif

<div class="row">
    <div class="col-md-4 offset-md-4 mt-5">
        <div class="text-center"><h1 class="title text-primary">Show<span>Everyone</span></h1></div>
        <div class="card">
            <div class="card-header text-center bg-primary text-light">
                ShowEveryone
            </div>
            <div class="card-body p-2">
                <form action="/login" method="post">
                    @csrf
                    <div class="form-group">
                      <input type="email"
                        class="form-control {{$errors->has('email') ? 'is-invalid' : '' }}" value="{{old('email')}}"
                        name="email"
                        placeholder="Email" />
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group pt-2">
                      <input type="password"
                        name="password"
                        class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" value="{{old('password')}}"
                        placeholder="Password" />
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-3">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>
                <div class="card-footer">
                    Belum Memiliki Akun? <a href="/form-regis">Daftar Disini</a>
                </div>
            </div>
        </div>
    </div>
</div>

  <script>
    function togglePage() {
      var loginPage = document.getElementById("login-page");
      var registrationPage = document.getElementById("registration-page");

      if (loginPage.style.display === "none") {
        loginPage.style.display = "block";
        registrationPage.style.display = "none";
      } else {
        loginPage.style.display = "none";
        registrationPage.style.display = "block";
      }
    }
  </script>
</body>
</html>
