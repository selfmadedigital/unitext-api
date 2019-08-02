<?php

namespace App\Http\Controllers;

use App\Partner;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function getReviews()
    {
        return response()->json(Review::all());
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'allowed' => 'required',
        ]);

        $review = Review::findOrFail($id);
        $review->update($request->all());

        return response()->json($review, 200);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'allowed' => 'required',
        ]);

        $review = Review::create($request->all());
        return response()->json($review, 200);
    }
}
