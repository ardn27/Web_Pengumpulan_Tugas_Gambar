<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
    <body>
    @if ($userLoggedin == true)
    @php
    $namaPengguna = explode(' ', Auth::user()->name);
    $namaDepan = $namaPengguna[0];
    @endphp
    @endif
    <nav class="navbar-nav">
        <ul class="logo-nama">Show<span>Everyone</span></ul>
        <ul class="navbar">
            <li id="nav1" ><a class="nav-items" href="/">Home</a></li>
            <li id="nav2"><a class="nav-items" href="/project">Project</a></li>
            <li id="nav3" ><a class="nav-items" href="/about">About</a></li>
        </ul>
        <ul class="nav-user">
            @if ($userLoggedin == false)
                <li><a class="login-button" href="/login-form"><i class="fa-solid fa-arrow-right-to-bracket"></i>Login</a>
                </li>
            @endif
            @if ($userLoggedin == true)
                <li><a href="/profil">
                        <img class="img-nav" src="{{ asset('storage/' . $user->profile_picture) }}" alt="">
                    </a>
                </li>
                <li><a href="/profil">
                        <p class="nav-user-profil">Halo, <span>{{ $namaDepan }}</span></p>
                    </a> </li>
            @endif
        </ul>
    </nav>
        <div class="countainer">
            <div class="home">
                <img src="assets/" alt="">
                <h1 class="home-caption" >SHOW YOUR</h1>
                <h1 class="home-caption">PROJECT</h1>
                <h1 class="home-caption">TO EVERYONE</h1>
                <p>With ShowEveryone, you can effortlessly <br>share your projects with everyone.
                <br>Upload, narrate, and make your work visible to the world</p>
                <a class="btn-start" href="/project">Get Started ></a>
            </div>
            <div class="project">
                <div class="project-card">
                   <img src="{{('assets/icon.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/main.js') }}"></script>
</body>
</html>
