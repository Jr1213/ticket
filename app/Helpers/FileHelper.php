<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileHelper
{
    public static function saveFile(UploadedFile $file, string $path): string
    {
        return $file->store($path, 'public');
    }

    public static function deleteFile($path): void
    {
        if (Storage::drive('public')->exists($path)) {
            Storage::drive('public')->delete($path);
        }
    }
}
