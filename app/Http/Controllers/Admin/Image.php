<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;

use App\Utils\Md5;
use App\Conf\BaseConf;
use App\Http\Controllers\Controller;


class Image extends Controller
{
    public function upload()
    {
        $file = request()->file('uploadFile');

        if (is_null($file)) {
            return $this->respFailure('param upload file miss');
        }

        if ($file->getSize() > BaseConf::$UploadMaxSize) {
            return $this->respFailure($file->getSize());
        }

        $dir = request()->get('dir');

        if (is_null($dir)) {
            return $this->respFailure('param dir miss');
        }

        if (!array_key_exists($dir, BaseConf::$UploadPath)) {
            return $this->respSuccess('param dir error');
        }

        $fileType = $file->getClientOriginalExtension();
        if (!in_array($fileType, BaseConf::$UploadFileType)) {
            return $this->respFailure('file type error');
        }

        $filename = Md5::encode(date('y-m-d-h-i-s')) . '.' . $fileType;

        if (Storage::disk(BaseConf::$UploadPath[$dir])->put($filename, file_get_contents($file))) {
            return $this->respSuccess([
                'url' => '/storage/' . BaseConf::$UploadPath[$dir] . '/' . $filename
            ]);
        } else {
            return $this->respFailure('save file error');
        }

    }
}
