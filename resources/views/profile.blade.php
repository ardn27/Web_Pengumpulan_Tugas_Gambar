<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>User Profile</title>
</head>
<body>

<div class="container-profil">
    <a class="btn-back" href="/project"><i class="fa-solid fa-arrow-left"></i></a>
<div class="profile-container">
    <div class="profile-header">
        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture">
        <h3>{{$user->name}}</h3>
        <h3>{{$user->email}}</h3>
        {{-- <div class="profile-info">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.</p>
      </div> --}}
      <div class="btn-edit">
        <a class="btn-edit-profil" href="">
          <i class="fa-regular fa-pen-to-square"></i>
        </a>
      </div>
      <form action="/add-profile-picture" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="profile_picture">
        <button type="submit">Upload Profil Picture</button>
    </form>
    </div>
  </div>
</div>
    <div class="container-p">
        <h4>{{$totalPosts}} Posts From {{$user->name}}</h4>
        @foreach ($project as $data)
            <div class="post-card">
                <div class="card-username">
                    <div class="header-user">
                        <p class="username-user">{{$data->user->name}} </p>
                        <p class="username-user"><span>
                            {{$data->nama}}</span></p>

                        <p class="username">{{$data->created_at->diffForHumans()}}</p>
                    </div>
                </div>
                    <div class="profil-post">
                    <img class="image" src="{{ asset('public/image/'. $data->gambar) }}" alt="">
                </div>
                <q>{{$data->deskripsi}}</q>
            </div>
        @endforeach
    </div>

</body>
</html>
