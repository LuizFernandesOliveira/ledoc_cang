<?php
/**
 * Created by PhpStorm.
 * User: 20161197100045
 * Date: 03/10/2018
 * Time: 18:14
 */

namespace App\Middleware\Admin;

class AuthMiddleware
{

    public function __invoke($request, $response, $next)
    {
        if (!isset( $_SESSION["Usuario"] )){

            return $response->withRedirect(PAF . '/admin/login');

        }

        $response = $next($request, $response);

        return $response;
    }

}