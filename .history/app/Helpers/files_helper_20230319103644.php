<?php



trait FilesHelper
{

    public static function saveFile($file, string $path)
    {
        $filename = date('YmdHi') . '.' . $file->extension();
        $path = public_path($path);
        $file->move($path, $filename);
        return $path . $filename;
    }
}
