<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException; // Import the exception class

use Illuminate\Database\Eloquent\ModelNotFoundException;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    public function render($request, \Throwable $exception)
    {
        //LS用エラーページの追加対応 2024.12.18（by a.u)
        if ($exception instanceof NotFoundHttpException) {
            //return response()->view('pages.404', [], 404); // You can customize the view name and status code
            return response()->view('pages.ls_error', [], 404); 
        }

        if ($exception instanceof ModelNotFoundException) {
           //LS用エラーページの追加対応 2024.12.18（by a.u)
           //return response()->view('pages.404', [], 404); // You can customize the view name and status code
            return response()->view('pages.ls_error', [], 404); 
        }
        
        return parent::render($request, $exception);
    }
}
