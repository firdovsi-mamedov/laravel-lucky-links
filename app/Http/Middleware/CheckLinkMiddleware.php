<?php

namespace App\Http\Middleware;

use App\Models\Link;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLinkMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->route('token');
        $link = Link::query()->where('token', $token)
            ->where('active', true)
            ->where('user_id', auth()->id())
            ->first();

        if (!$link || $link->expires_at->isPast()) {
            return response('The link is invalid or has expired.', 403);
        }

        return $next($request);
    }
}
