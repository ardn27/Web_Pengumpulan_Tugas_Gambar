<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project</title>
</head>
<body>
    <nav class="navbar-nav">
        <ul class="logo-nama">Show<span>Everyone</span></ul>
            <ul class="navbar">
                <li><a href="/">Home</a></li>
                <li><a href="/project">Project</a>
            </li>
            <li><a href="/project">About</a>
            </li>
            @if ($userLoggedin == false)
            <li><a href="/login-form"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
            </li>
            @endif
            @if ($userLoggedin == true)
            <li><a href="/logout-user"><i class="fa-solid fa-right-from-bracket"></i></a>
            </li>
            @endif
        </ul>
    </nav>
    @if (session('success'))
    <div class="message-alert">
        <div class="alert">
            {{(session('success'))}}
        </div>
    </div>
    @endif
    @if ($userLoggedin == true)
    <div class="countainer-post">
        <div class="post" >
            <form action="/Prj-add" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="tittle">
                   <p>Bagikan postingan anda disini</p>
                </div>
                    <div class="profil">
                        <input type="text" name="nama" id="nama" placeholder="Nama Project" required>
                        <input type="text" name="nbi" id="nbi" placeholder="NBI" required>
                    </div>
                    <textarea name="deskripsi" id="" cols="80" rows="4" placeholder="Deskripsi Project" required></textarea>
                <div class="file">
                    <input type="file" name="gambar" id="gambar" required>
                    <button class="btn-post" type="submit">Post</button>
                </div>
            </form>
        </div>
    </div>
    @endif
    <div class="container-p">
        @foreach ($datas as $data)
            <div class="post-card">
                <div class="card-username">
                    <div class="header-user">
                        <p class="username-user">{{$data->user->name}} </p>
                        <p class="username-user"><span>
                            {{$data->nama}}</span></p>

                        <p class="username">{{$data->created_at->diffForHumans()}}</p>
                        <q>{{$data->deskripsi}}</q>
                    </div>
                    @if ($userLoggedin == true)
                    <div class="dropdown">
                        <button class="dropbtn"><i class="fa-sharp fa-solid fa-ellipsis-vertical"></i></button>
                        <div class="dropdown-content">
                          <a class="edit" href="/edit-post/{{$data->id}}">Edit</a>
                          <a class="delete" href="/delete-post/{{$data->id}}">Delete</a>
                        </div>
                    </div>
                    @endif
                </div>
                    <div>
                    <img class="image" src="{{ asset('public/image/'. $data->gambar) }}" alt="">
                </div>
            </div>
        @endforeach
    </div>
    <script src="{{asset('assets/main.js')}}"></script>
</body>
</html>
