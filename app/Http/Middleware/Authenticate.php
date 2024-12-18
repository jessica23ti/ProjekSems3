<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function redirectTo($request) // Ubah dari protected ke public
    {
        if (!$request->expectsJson()) {
            return route('login'); // Sesuaikan nama route login
        }
    }
}
