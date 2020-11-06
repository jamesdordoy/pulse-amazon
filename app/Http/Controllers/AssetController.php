<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\UploadRequest;


class AssetController extends Controller
{
    //
    private $s3Client;

    public function __construct()
    {
        $this->s3Client = \App::make('aws')->createClient('s3');
    }

    public function showUpload()
    {
        return view('upload');
    }

    public function upload(UploadRequest $request)
    {
        $file = $request->file;

        try {
            $response = $this->s3Client->putObject(array(
                'Bucket'     => 'jd-pulse-test-bucket',
                'Key'        => $file->getClientOriginalName(),
                'SourceFile' => $file->path(),
            ));
        }
        catch (Exception $e) {
            return abort(400);
        }

        return $response;
    }

    public function showDownload()
    {
        $response = $this->s3Client->listObjects([
            'Bucket' => 'jd-pulse-test-bucket',
        ]);

        $images = $response->toArray()["Contents"];

        return view('download', [
            'images' => $images
        ]);
    }
}
