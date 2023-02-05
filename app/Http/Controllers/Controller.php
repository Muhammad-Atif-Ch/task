<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function data($message, $alert) {
        return [
            'message' => $message,
            'alert' => $alert,
        ];
    }

    public function message($variable, $route, $successMessage, $errorMessage)
    {
        if ($variable) {
            return redirect()->route($route)->with(['message' => $successMessage, 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => $errorMessage, 'alert' => 'error']);
        }
    }

    function sendError($error_message, $code = 400){
        return Response::json(['status' => $code, 'message' => $error_message], $code)->setStatusCode($code, $error_message);
    }

    function sendSuccess($message, $data = ''){
        return Response::json(['status' => 200, 'message' => $message, 'successData' => $data], 200, []);
    }
}
