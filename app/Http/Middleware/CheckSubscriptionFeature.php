<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscriptionFeature
{
    public function handle(Request $request, Closure $next, string $feature): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        if (!$user->hasFeature($feature)) {
            return redirect()->route('subscription.plans')
                ->with('error', 'This feature requires a higher subscription plan.');
        }

        return $next($request);
    }
}
