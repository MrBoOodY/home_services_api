<?php

namespace App\Helpers;


trait ResponseHelper
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
