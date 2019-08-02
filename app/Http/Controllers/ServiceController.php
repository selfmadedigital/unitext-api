<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function getServices()
    {
        return response()->json(Service::all());
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'sort' => 'required'
        ]);

        $service = Service::findOrFail($id);
        $service->update($request->all());

        return response()->json($service, 200);
    }
}
