<?php

namespace App\Http\Controllers\Api;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ZipArchive;

class FileCopyController extends Controller
{
    public function index()
    {
       return view('filesCopy.fileCopy');
    }

    public function unzipAction(Request $request, $version)
    {
        $zip = new ZipArchive;
        $zipFile = 'zipFiles\\'.$version.'.zip';
        $zipOpen = $zip->open($zipFile);
        $File = new Filesystem;
        $path = 'zipFiles\temp';
        if($File->exists($path))
        {
            $File->deleteDirectory($path);
        }
        else
        {
            $File->makeDirectory($path);
        }
        if ($zipOpen === TRUE) {
            $zip->extractTo($path);
            $filesInFolder = $File->allFiles($path.'\\'.$version);
            foreach($filesInFolder as $filePath) {
                $pastePath = substr($filePath,strlen($path.'\\'.$version));
                $rootDir = substr(base_path().$pastePath,0,strrpos(base_path().$pastePath,'\\'));
                if(!$File->exists($rootDir))
                {
                    $File->makeDirectory($rootDir);
                }
                copy(public_path().'\\'.$filePath, base_path().$pastePath);
            }
            $zip->close();
            unlink($zipFile);
            $File->deleteDirectory($path);

            echo 'Zip file extracted!';
        } else {
            echo 'Zip file not found!';
        }
    }
}
