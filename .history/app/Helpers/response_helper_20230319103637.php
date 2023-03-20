<?php

namespace App\Helpers;


trait ResponseHelper
{

  public static function setResponse(String $message, $data)
  {

    return response([
      'message' =>  $message,
      'data' =>  $data,
    ], ResponseStatusCodes::$success_status_code);
  }
  public static function setError(String $message, int $code, $data)
  {


    return response([
      'message' =>  $message,
      'data' => $data,

    ],  $code);
  }
}
