<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    protected $dontReport = [];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if($request->expectsJson())
        {
            $response = ['MESSAGE' => 'Your Session has expired','STATUS' => 0, "is_token_expire" => 1];
            return response()->json($response);
        }
        $guard = array_get($exception->guards(),0);

        switch ($guard) 
        {
            case 'admin':
                return redirect()->guest(route('securepanel'));
            break;
            
            default:
                return redirect()->guest(route('login'));
            break;
        }
    }
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }
}
