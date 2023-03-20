<?php


namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadFile
{
    public function uploadFile($file, $path): string
    {
        $uniqueFileName = $file->hashName();

        Storage::disk('local')->put($path . '/' . $uniqueFileName, file_get_contents($file));

        return $uniqueFileName;
    }

    public function deleteFile($filepath): bool
    {
        try {
            $file_path_segments = (explode('/', $filepath, 5));
            $path = $file_path_segments[count($file_path_segments) - 1];

            Storage::disk('local')->delete("public/$path");
            return true;

        } catch (\Exception) {

            return false;
        }
    }
}
