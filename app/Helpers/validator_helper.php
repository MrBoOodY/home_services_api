<?php

use App\Helpers\ResponseHelper;
use App\Helpers\ResponseStatusCodes;

class ValidatorHelper
{

    public static function handleFailures($validator)
    {
        // Redirect or return json to frontend with a helpful message to inform the user 
        // that the provided file was not an adequate type
        $error = '';
        foreach ($validator->errors()->getMessages() as $key => $value) {
            $error  = $error   . $value[0] . "\n";
        }
        return ResponseHelper::setError($error, ResponseStatusCodes::$error_status_code, $validator->errors()->getMessages());
    }
}
