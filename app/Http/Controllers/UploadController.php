<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Http\Request;
use Carbon\Carbon;


class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('image');
        if($file->getClientMimeType() != 'image/png' && $file->getClientMimeType() != 'image/jpg' && $file->getClientMimeType() != 'image/jpeg'){
            return response()->json([
                'error' => 'Nepodporovaný formát súboru. Podporované formáty: jpg, jpeg, png'
        ], 400);
        }

        if($file->getClientSize() > 2000000){
            return response()->json([
                'error' => 'Prekročená maximálna veľkosť súboru ('.$file->getClientSize().')! Maximálna povolená veľkosť je 2MB!'
            ], 400);
        }


        $filename = $file->getClientOriginalName();
        if (file_exists( base_path() . '/public/uploads/' . $filename)) {
            $filename = pathinfo($filename, PATHINFO_FILENAME).'-'.Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension();
        }

        $file->move(base_path().'/public/uploads/', $filename);

        return response()->json([
            'file' => '/uploads/'.$filename,
        ], 200);
    }
}
