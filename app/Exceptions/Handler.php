<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Illuminate\Database\QueryException;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
    
    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function report(Exception $exception)
    {   

        parent::report($exception);
    }

    public function render($request, Exception $exception)
    {   

        // Handling Connection Exception
        if($exception instanceof QueryException) {
            return response()->view('errors.connection');
        }

        
        if($exception instanceof ErrorException) {
            return response()->view('errors.ExceptionError');
        }


        if($exception instanceof QueryException) {
            return response()->view('errors.connection');
        }

        if($exception instanceof QueryException) {
            return response()->view('errors.connection');
        }
        return parent::render($request, $exception);
    }
}
