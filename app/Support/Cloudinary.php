<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use JD\Cloudder\Facades\Cloudder;

class Cloudinary
{
    /**
     * update file Cloudinary
     *
     * @param UploadedFile $file
     * @param string $publicId
     * @param string $path
     * @return void
     */
    public function update(UploadedFile $file, string $publicId, string $path)
    {
        $options = [
          'folder' => $path ?? null
        ];
        Cloudder::delete($publicId, $options);
        $cloudder = Cloudder::upload($file, null, $options);
        return $cloudder->getPublicId();
    }

    /**
     * create file base64 Cloudinary
     *
     * @param UploadedFile $file
     * @param string $path
     * @return void
     */
    public function create(UploadedFile $file, string $path)
    {
        $options = [
            'folder' => $path ?? null
        ];
        $cloudder = Cloudder::upload($file, null, $options);
        return $cloudder->getPublicId();
    }

    public function delete(string $publicId, string $path)
    {
        $options = [
            'folder' => $path ?? null
        ];
        return Cloudder::delete($publicId, $options);
    }
}
