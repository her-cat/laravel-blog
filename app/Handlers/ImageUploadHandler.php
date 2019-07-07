<?php

namespace App\Handlers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ImageUploadHandler
{
    protected static $allowed_ext = ['png', 'jpg', 'gif', 'jpeg'];

    public function save(UploadedFile $file, $folder, $file_prefix)
    {
        $folder_name = "uploads/images/{$folder}/".date('Ym/d');

        $upload_path = public_path($folder_name);

        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';

        $filename = $file_prefix.'_'.time().'_'.Str::random(10).'.'.$extension;

        if (!in_array($extension, self::$allowed_ext)) {
            return false;
        }

        $file->move($upload_path, $filename);

        return config('app.url')."/{$folder_name}/{$filename}";
    }

    public static function getAllowedExtensions()
    {
        return self::$allowed_ext;
    }
}
