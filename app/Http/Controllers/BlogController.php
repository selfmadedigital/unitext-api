<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getArticles()
    {
        return response()->json(Blog::all());
    }

    public function getArticle($id)
    {
        return response()->json(Blog::where('id', $this->request->input('id'))->first());
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->update($request->all());
        var_dump($request);
        return response()->json($blog, 200);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
        ]);

        $blog =  Blog::create($request->all());
        return response()->json($blog, 200);
    }
}
