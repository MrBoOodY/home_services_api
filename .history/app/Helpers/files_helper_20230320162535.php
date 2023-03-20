<?php

class FilesHelper
{
    static function saveFile($file, string $path)
    {
        return date('YmdHims');
        $filename = date('YmdHims') . '.' . $file->extension();
        $path = public_path($path);
        $file->move($path, $filename);
        return $path . $filename;
    }
}
