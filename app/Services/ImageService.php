<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}

    public function upload(UploadedFile $image, string $folder): string
    {
        return $image->store($folder, 'public');
    }

    public function delete(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
