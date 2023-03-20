<?php

namespace App\Helpers;

class ResponseHelper
{

  static function setResponse(String $message, $data)
  {

    return response([
      'message' =>  $message,
      'data' =>  $data,
    ], ResponseStatusCodes::$success_status_code);
  }
  static function setError(String $message, int $code, $data)
  {


    return response([
      'message' =>  $message,
      'data' => $data,

    ],  $code);
  }
}
<?php



trait FilesHelper
{

    static function saveFile($file, string $path)
    {
        $filename = date('YmdHi') . '.' . $file->extension();
        $path = public_path($path);
        $file->move($path, $filename);
        return $path . $filename;
    }
}
