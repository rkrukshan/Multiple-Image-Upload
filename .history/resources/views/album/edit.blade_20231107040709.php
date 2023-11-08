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

                    <form action="/update/{{ $posts->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <input type="text" name="title" class="form-control" value="{{ $posts->title }}">
                        <input type="text" name="author" class="form-control" value="{{ $posts->author }}">
                        <textarea name="body" id="" cols="30" rows="10">{{ $posts->body }}</textarea><br>



                        <label for="">Cover Image</label><br>
                        <img src="/cover/{{ $posts->cover }}" class="img-responsive" alt=""  height="150" width="150"><br>
                        <input type="file" name="cover" class="form-control">


                        <label for="m-2">Image</label><br>
                        @if(count($posts->images)>0)
                        @foreach ($posts->images as $img )
                        <form action="/deleteimage/{{ $img->id }}" method="post">
                        <button class="btn text-danger">X</button>
                        @csrf
                        @method('delete')
                        </form>
                        <img src="/images/{{ $img->image }}" alt="" height="250" width="250" class="img-responsive" name="">
                        @endforeach
                        @endif

                    <input type="file" class="form-control" name="images[]" multiple>
                    <button type="submit" class="btn btn-success">Edit</button></button>
                    </form>


                </div>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
