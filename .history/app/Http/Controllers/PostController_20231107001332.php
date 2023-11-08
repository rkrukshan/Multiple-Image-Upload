<?php

namespace App\Http\Controllers;

use App\Models\image;
use App\Models\Post;
use Illuminate\Http\Request;
use Spatie\Backtrace\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('album.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('album.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile("cover")) {
            $file = $request->file("cover");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("cover/"), $imageName);

            $post = new Post([
                "title" => $request->title,
                "author" => $request->author,
                "body" => $request->body,
                "cover" => $imageName,
            ]);
            $post->save();
        }

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $request['post_id'] = $post->id;
                $request['image'] = $imageName;
                $file->move(\public_path("/images"), $imageName);
                Image::create($request->all());
            }
        }
        return redirect("/");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posts = Post::findOrfail($id);
        return view('album.edit', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrfail($id);
        if ($request->hasFile("cover"))
        {
            if (file_exists("cover/".$post->cover))
            {
                unlink(public_path("cover/.$post->cover"));
            }
            $file = $request->file("cover");
            $post->cover = time() ."_".$file->getClientOriginalName();
            $file->move(\public_path("/cover"), $post->cover);
            $request['cover'] = $post->cover;
        }
        if ($request->hasFile("images"))
        {
            $files = $request->file("images");
            foreach ($files as $file)
            {
                $imageName = time().'_'.$file->getClientOriginalName();
                $request["post_id"] = $id;
                $request["images"] = $imageName;
                $file->move(\public_path("images"),$imageName);
                image::create($request->all());
            }
        }
        return
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
