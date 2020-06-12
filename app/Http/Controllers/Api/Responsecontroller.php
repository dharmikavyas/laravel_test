<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class Responsecontroller extends Controller
{
   	public function sendResponse($result, $message)
    {
    	$response = [
            'RESULT'=> $result,
            'MESSAGE' => $message,
            'STATUS' => 1,
            "is_token_expire" => 0,
        ];
        return response()->json($response, 200);
    }
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'MESSAGE' => $error,
            'STATUS' => 0,
            "is_token_expire" => 0
        ];
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }
    public function getUser($result, $message,$projectcount)
    {
        $response = [
            'RESULT'=> $result,
            'MESSAGE' => $message,
            'STATUS' => 1,
            'Meeting' => $projectcount,
        ];
        return response()->json($response, 200);
    }
}
