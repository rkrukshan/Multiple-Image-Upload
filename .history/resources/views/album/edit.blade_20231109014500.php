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
                    <h2><center>CMS</center></h2>
                </div>
                <div class="card-body">
                    <center>
                    <h2><center>Edit Post</center></h2>

                    <form action="/deletecover/{{ $posts->id }}" method="post">
                        <button class="btn text-danger">X</button>
                        @csrf
                        @method('delete')
                        </form>
                        <center></center>
                        <img src="/cover/{{ $posts->cover }}" class="img-responsive" style="max-height: 250; max-width: 250;" alt="" srcset="">
                        <br>



                         @if (count($posts->images)>0)
                         <p>Images:</p>
                         @foreach ($posts->images as $img)
                         <form action="/deleteimage/{{ $img->id }}" method="post">
                             <button class="btn text-danger">X</button>
                             @csrf
                             @method('delete')
                             </form>
                         <img src="/images/{{ $img->image }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                         @endforeach
                         @endif

                    </div>

<center>
                    <div class="col-lg-6">
                        <h3 class="text-center text-info"><b>Edit Post</b> </h3>
                        <div class="form-group">
                            <form action="/update/{{ $posts->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("put")
                             <label class="m-2">Title</label>
                             <input type="text" name="title" class="form-control m-2" placeholder="title" value="{{ $posts->title }}">
                             <label class="m-2">Author</label>
                             <input type="text" name="author" class="form-control m-2" placeholder="author" value="{{ $posts->author }}">
                             <Textarea name="body" cols="20" rows="4" class="form-control m-2" placeholder="body">{{ $posts->body }}</Textarea>
                             <label class="m-2">Cover Image</label>
                             <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="cover">

                             <label class="m-2">Images</label>
                             <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple>

                            <button type="submit" class="btn btn-success mt-3 ">Submit</button>
                            </form>
                        </center>

                </div>
            </center>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
