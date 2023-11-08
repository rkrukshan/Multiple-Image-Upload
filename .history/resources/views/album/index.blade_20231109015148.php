<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multiple Image Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2><center>Multiple Image Upload</center></h2>
                </div>
                <div class="card-body">
                    <center></center>
                    <h2>Post List</h2>
                    <a href="{{ url('/create') }}" class="btn btn-success btn-sm">Add Post</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>description</th>
                                <th>Cover</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)

                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->author }}</td>
                                <td>{{ $post->body }}</td>
                                <td><img src="cover/{{ $post->cover }}" class="img-responsive" width="155" height="100"></td>
                                <td>{{ $post->update }} <a href="edit/{{ $post->id }}" class="btn btn-outline-info">Update</a> </td>
                                {{--  <td>{{ $post->delete }} ></td>  --}}
                                <td>
                                    <form action="/delete/{{ $post->id }}" method="post">
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    @csrf
                                    @method("delete")
                                </form>
                            </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
