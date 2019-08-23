<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Illuminate\Validation\ValidationException;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Database\QueryException;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Illuminate\Auth\AuthenticationException;

use Illuminate\Auth\Access\AuthorizationException;

use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

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

        if($exception instanceof ValidationException) {
            return $this->convertValidationExceptionToResponse($exception, $request);
        }
        
        if($exception instanceof ModelNotFoundException) {
            $model = $exception->getModel();
            // $model_name = explode("\\", $model)[1];
            $model_name = strtolower(class_basename($model));

            return response()->json('error' => "Model $model_name Does not Exist",'code' => 404], 404);
        }

        if($exception instanceof AuthenticationException) {
            return $this->unauthenticated($request,$exception);
        }

        if($exception instanceof AuthorizationException) {
            return response()->json('error' => $exception->getMessages(),'code' => 403], 403);
        }

        if($exception instanceof NotFoundHttpException) {
            return response()->json('error' => 'The specified URL Does not Exist','code' => 404], 404);
        }

        if($exception instanceof MethodNotAllowedHttpException) {
            return response()->json('error' => 'The specified Method is not Allowed','code' => 405], 405);
        }

        // Exception happen while Deleting related Foriegn keys Table that related to anothers
        if($exception instanceof QueryException) {

            $error_code = $exception->errorInfo[1];

            if($error_code == 1451) {
                return response()->json(['error' => 'Can not remove this resource because Its related to another', 'code' => 409] , 409);
            }
        }

        // if we're in development
        if(config('app.debug')) {
            return parent::render($request, $exception);
        }
        // if Production release this Error
        return $this->errorResponse("Unexpected Exception Try Again Later", 500);
    }


    protected function convertValidationExceptionToResponse(ValidationException $e, $request) {

        $error = $e->validator->errors()->getMessages();
        return $this->errorResponse($error, 422);
    }

    protected function unauthenticated($request, AuthenticationException $exception) {
        return $this->errorResponse("UnAuthinticated", 401);
    }
}
