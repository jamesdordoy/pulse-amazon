<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssetController extends Controller
{
    //

    public function showUpload()
    {
        return view('upload');
    }

    public function upload()
    {

    }

    public function showDownload()
    {
        return view('download');
    }

    public function download()
    {

    }
}
