<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function getPartners()
    {
        return response()->json(Partner::all());
    }

    public function update($id, Request $request)
    {
//        $this->validate($request, [
//            'content' => 'required',
//        ]);

        $partner = Partner::findOrFail($id);
        $partner->update($request->all());

        return response()->json($partner, 200);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
        ]);

        $partner = Partner::create($request->all());
        return response()->json($partner, 200);
    }

    public function delete($id)
    {
        Partner::findOrFail($id)->delete();
        return response()->json(['status' => 'ok'], 200);
    }
}
