<?php

namespace App\Http\Controllers;

use App\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function getPrices()
    {
        return response()->json(Price::all());
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'price' => 'required',
        ]);

        $price = Price::findOrFail($id);
        $price->update($request->all());

        return response()->json($price, 200);
    }
}
