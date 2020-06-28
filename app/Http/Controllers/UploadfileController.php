<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Illuminate\Support\Facades\DB;

class UploadfileController extends Controller
{
    function index()
    {
        $posts = DB::table('posts')->paginate(9);
        return view('upload', ['posts' => $posts]);
    }

    function upload(Request $request)
    {
        if ($file = $request->file()) {
            $this->validate($request, [
                'select_file'  => 'required|image|mimes:jpg,png,gif,jpeg'
            ]);
            $image = $request->file('select_file');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $titles = explode('.', $image->getClientOriginalName());
            $title = $titles[0];
            if ($image->move(public_path('images'), $new_name)) {
                $post = new Post();
                $post->image = $new_name;
                $post->name = $title;
                $post->save();
                return back()->with('success', 'Image Uploaded Successfully')->with('path', $new_name);
            }
        }
    }

    function show($id)
    {
        $image = DB::table('posts')->where('id', $id)->first();
        return view('image', ['image' => $image]);
    }
}
?>