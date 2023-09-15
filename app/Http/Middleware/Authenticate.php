<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->is('admin') || $request->is('admin/*') ||
            $request->is('ar/admin') || $request->is('ar/admin/*') ||
            $request->is('en/admin') || $request->is('en/admin/*'))
            return route('admin.login');
        else
            return route('login');
    }
}
