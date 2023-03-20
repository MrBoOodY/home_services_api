<?php

namespace App\Helpers;

class ResponseHelper
{

  static function setResponse(String $message, $data)
  {
dd($message);)
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
