<?php

namespace App\Services;

use App\Contracts\AssetServiceContract;

class AssetService implements AssetServiceContract
{   

    private $s3Client;

    public function __construct()
    {
        $this->s3Client = \App::make('aws')->createClient('s3');
    }


    public function upload($file)
    {
        try {
            return $this->s3Client->putObject(array(
                'Bucket'     => 'jd-pulse-test-bucket',
                'Key'        => $file->getClientOriginalName(),
                'SourceFile' => $file->path(),
            ));
        }
        catch (Exception $e) {
            return abort(400, "Duplicate Filename");
        }
    }

    public function getFiles()
    {
        $response = $this->s3Client->listObjects([
            'Bucket' => 'jd-pulse-test-bucket',
        ]);

        return $response->toArray()["Contents"];
    }
}
