<?php

class FilesHelper
{
    static function saveFile($file, string $path)
    {
        $filename = date('YmdHi') . '.' . $file->extension();
        $path = public_path($path);
        $file->move($path, $filename);
        return $path . $filename;
    }
}

<?php



trait EnumToArray
{

    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function array(): array
    {
        return array_combine(self::values(), self::names());
    }
}
