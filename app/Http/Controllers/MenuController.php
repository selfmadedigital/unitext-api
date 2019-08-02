<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getMenu()
    {
        return response()->json(Menu::all());
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'text' => 'required',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update($request->all());

        return response()->json($menu, 200);
    }
}
