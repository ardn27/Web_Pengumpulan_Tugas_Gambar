<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Edit Postingan</title>
</head>
<body>
    <div class="container-p">
        <form action="/edit-post" enctype="multipart/form-data">
            @csrf
            <div class="tittle">
                <p>Edit postingan Anda</p>
            </div>
            <input type="hidden" name="id" id="id" value="{{ $post->id }}">
            <div class="profil">
                <input type="text" name="nama" id="nama" placeholder="Nama Project" value="{{ $post->nama }}" required>
                <input type="text" name="nbi" id="nbi" placeholder="NBI" value="{{ $post->nbi }}" required>
            </div>
            <textarea name="deskripsi" id="" cols="80" rows="4" placeholder="Deskripsi Project" required>{{ $post->deskripsi }}</textarea>
            <div class="file">
                <label for="gambar">Gambar Saat Ini:</label>
                <img src="{{ asset('path/to/your/images/' . $post->gambar) }}" alt="Current Image" style="max-width: 200px;">
                <input type="file" name="gambar" id="gambar">
            </div>
            <button class="btn-post" type="submit">Update</button>
        </form>
</div>
</body>
</html>
