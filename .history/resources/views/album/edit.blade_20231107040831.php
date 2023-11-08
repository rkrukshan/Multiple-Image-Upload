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
    <form action="/deletecover/{{ $posts->id }}" method="post">
    <button class="btn text-danger">X</button>
    @csrf
    @method('delete')
    </form>
    <img src="/cover/{{ $posts->cover }}" height="250" width="250" alt=""><br><br>
    <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="cover">





    <label for="m-2">Image</label><br>
    @if(count($posts->images)>0)
    @foreach ($posts->images as $img )
    <form action="/deleteimage/{{ $img->id }}" method="post">
    <button class="btn text-danger">X</button>
    @csrf
    @method('delete')
    </form>
    <img src="/images/{{ $img->image }}" alt="" height="250" width="250" class="img-responsive">
    @endforeach
    @endif
    <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple>
    <button type="submit" class="btn btn-success mt-3">Submit</button>
</form>
