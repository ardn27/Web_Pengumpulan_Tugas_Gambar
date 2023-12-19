<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Home</title>
</head>
<body>
    <div class="container" style="max-width: 800px">
        <form class="form-control mt-4 p-3 shadow-lg" action="/edit-post" enctype="multipart/form-data" method="post">
            @csrf
            <input type="hidden" name="id" id="id" value="{{$post->id}}">
            <div class="mb-3">
                <label for="" class="form-label" style="font-size: 14px">Nama Project</label>
                <input type="text" name="nama" id="nama" class="form-control form-control-sm shadow-sm" value="{{ $post->nama }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label"  style="font-size: 14px">NBI</label>
                <input type="text" name="nbi" id="nbi" class="form-control form-control-sm shadow-sm" value="{{ $post->nbi }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label"  style="font-size: 14px">Deskripsi</label>
                <input type="text" name="deskripsi" id="deskripsi" class="form-control form-control-sm shadow-sm"
                    value="{{ $post->deskripsi }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label"></label>
                <img class="image-fluid mb-3" src="{{ asset('public/image/' . $post->gambar) }}" alt="" style="max-width: 100px">
                <input type="file" name="gambar" id="gambar" class="form-control form-control-sm" value="{{ $post->gambar }}">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-info text-light border-1 border-dark rounded-3 ">Update</button>
            </div>

        </form>
    </div>
</body>
</html>
