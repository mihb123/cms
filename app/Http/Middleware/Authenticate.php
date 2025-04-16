<?php

namespace App\Http\Middleware;

use App\Common\Response;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $prefix = $request->route()->getPrefix();
        if ($prefix == config('constants.prefix_api')) {
            $result = Response::error('Token not exit');
            echo json_encode($result);
            die();
        } else {
            if (! $request->expectsJson()) {
                return route('login');
            }
        }
    }
}
