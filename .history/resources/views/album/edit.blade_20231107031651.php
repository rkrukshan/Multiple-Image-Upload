<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Multiple Image Upload CRUD</h2>
                </div>
                <div class="card-body">
                    <h2>Edit Post</h2>
                   <form action="/update{{$posts->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("put")
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ $posts->title }}" class="form-control m-2">

                    <label for="title">Author</label>
                    <input type="text" name="author" value="{{ $posts->author }}" class="form-control m-2">

                    <label for="body">Description</label><br>
                    <textarea name="body" id="body" cols="20" rows="4" value="">{{ $posts->body }}</textarea><br>

                    <label for="m-2">Cover Image</label><br>
                    <img src="/cover/{{ $posts->cover }}" height="250" width="250" alt=""><br><br>

                    <label for="m-2">Image</label><br>
                    @if(count($posts->images)>0)
                    @foreach ($posts->images as $img )
                    <form action="/deleteimage/{{ $img->id }}" method="post">
                    <button class="danger"></button>
                    </form>
                    <img src="/images/{{ $img->image }}" alt="" height="250" width="250" class="img-responsive">
                    @endforeach
                    @endif
                    <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple>
                    <button type="submit" class="btn btn-success mt-3">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
