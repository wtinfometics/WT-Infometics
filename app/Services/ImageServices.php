<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
 use Illuminate\Support\Str;

class ImageServices {

    // Save Image
    public function saveFile($file, $folder, $name = null){
        if (!$file) {
            return null;
        }

        if (!file_exists(public_path($folder))) {
            mkdir(public_path($folder), 0777, true);
        }

        $fileName = time() . '_' .
            Str::slug($name ?? pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
            . '.' . $file->getClientOriginalExtension();

        $file->move(public_path($folder), $fileName);

        return $folder . '/' . $fileName;;
    }

    // Delete Image 
    public function deleteFile($fileName){
        if (!$fileName) {
            # if File Name Exists
            return false;
        }
        $filePath =public_path($fileName);
        if (File::exists($filePath)) {
            # If file pounds
            File::delete($filePath);
        }
    }
}
