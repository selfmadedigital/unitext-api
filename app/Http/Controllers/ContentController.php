<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function getContent()
    {
        return response()->json(Content::all());
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);

        $content = Content::findOrFail($id);
        $content->update($request->all());

        return response()->json($content, 200);
    }
}
