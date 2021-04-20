<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary;
use Carbon\Carbon;

class UploadController extends Controller
{
    public function upload(Request $request){
        $fileName = Carbon::now()->format('Y-m-d');

        $uploadedFileUrl = $request->file('file')->storeOnCloudinaryAs('',$fileName)->getSecurePath();
        
        return response()->json([
            'message' => 'Success upload to Cloudinary',
            'status' => 200,
            'data' => $uploadedFileUrl
        ]);
    }
}
