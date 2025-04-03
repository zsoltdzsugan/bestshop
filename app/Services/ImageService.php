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

    /**
     * Upload multiple images and return paths.
     */
    public function uploadMultiple(array $images, string $folder): array
    {
        $paths = [];

        foreach ($images as $image) {
            if ($image instanceof UploadedFile) {
                $paths[] = $this->upload($image, $folder);
            }
        }

        return $paths;
    }

    public function delete(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    /**
     * Delete multiple images.
     */
    public function deleteMultiple(array $paths): void
    {
        // Filter out invalid paths or empty paths
        $validPaths = array_filter($paths, function ($path) {
            return ! empty($path);
        });

        // Delete multiple files in one call to Storage::delete
        if (! empty($validPaths)) {
            Storage::disk('public')->delete($validPaths);
        }
    }
}
