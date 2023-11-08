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

                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <input type="text" name="title" class="" value="{{ $posts->title }}">
                        <input type="text" name="author" class="" value="{{ $posts->author }}">
                        <textarea name="body" id="" cols="30" rows="10">(($posts->body))</textarea>
                        <label for="">Cover Image</label>
                        <img src="/cover/{{ $posts->cover }}" class="img-responsive" alt=""><br>
                        <input type="file" name="cover" class="form-control">


                        <label for="m-2">Image</label><br>
                    @if(count($posts->images)>0)
                    @foreach ($posts->images as $img )
                    <img src="/images/{{ $img->image }}" class="img-responsive" alt="">
                    @endforeach
                    @endif
                    
                    </form>


                </div>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
