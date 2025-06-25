<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckProjectLimit
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        if (!$user->canCreateProject()) {
            return redirect()->route('projects.index')
                ->with('error', 'You have reached your project limit. Please upgrade your plan.');
        }

        return $next($request);
    }
}
