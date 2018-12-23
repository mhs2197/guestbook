<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ZipUploadController extends Controller
{
    public function index()
    {
        return view('zipUpload.zipUpload');
    }
    public function zipUploadToS3(Request $request)
    {
        $file = $request->zip_file;
        $fileName =str_random(6). '.zip';


        //To use s3 storage system please run command " composer require league/flysystem-aws-s3-v3 "
        $S3 = Storage::disk('s3');
       //dd($request->zip_file);
        //$t = Storage::disk('s3')->put($imageName, file_get_contents($image), 'public');
        $S3->put('releases/'.$fileName,file_get_contents($file));


    }
}
