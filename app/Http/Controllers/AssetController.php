<?php

namespace App\Http\Controllers;


use App\Contracts\AssetServiceContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\UploadRequest;


class AssetController extends Controller
{
    private $assetService;

    public function __construct(AssetServiceContract $assetService)
    {
        $this->assetService = $assetService;
    }

    public function showUpload()
    {
        return view('upload');
    }

    public function upload(UploadRequest $request)
    {
        $file = $request->file;

        $response = $this->assetService->upload($file);

        return $response;
    }

    public function showDownload()
    {
        $images = $this->assetService->getFiles();

        return view('download', [
            'images' => $images
        ]);
    }
}
