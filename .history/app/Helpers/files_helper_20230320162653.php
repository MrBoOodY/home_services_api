<?php

class FilesHelper
{
    static function saveFile($file, string $path)
    {
        $filename = date('YmdHisms') . '.' . $file->extension();
        $path = public_path($path);
        $file->move($path, $filename);
        return $path . $filename;
    }
}
