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

    body{
        background-color: #E0F4FF;
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

    .card-title {
      text-align: center;
      margin-bottom: 20px;
    }

    .card-title span{
        background-color: #0066CC;
        color: #fff;
        border-radius: 40px;
        padding-left: 4px;
        padding-right: 4px;
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
<div class="countainer">
    <div class="col-md-4 offset-md-4 mt-5">
        <div class="text-center"><h1 class="card-title">Show<span>Everyone</span></h1></div>
        <div class="card">
            <div class="card-header text-center bg-primary text-light">
                ShowEveryone
            </div>
            <div class="card-body p-2">
                <form action="/registrasi-action" method="post">
                    @csrf
                    <div class="form-group">
                      <input type="text"
                        class="form-control"
                        name="name"
                        placeholder="Masukkan Nama Anda" required/>
                    </div>
                    <div class="form-group pt-2">
                      <input type="email"
                        name="email"
                        class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{old('email')}}"
                        placeholder="Masukkan Email Anda"  required/>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group pt-2">
                        <input type="password"
                        name="password"
                          class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" value="{{old('password')}}"
                          placeholder="Masukkan Password Anda"  required/>
                          @error('password')
                            <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                      </div>
                    <div class="form-group p-3">
                        <button type="submit" class="btn btn-primary btn-block">Registrasi</button>
                    </div>
                </form>
                <div class="card-footer">
                    Sudah Memiliki Akun? <a href="/login-form">Login Disini</a>
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
