<?php

namespace Torralbodavid\DuckFunkCore\Http\Middleware;
use Closure;
use Illuminate\Auth\AuthenticationException;


class AvatarAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, Closure $next)
    {
        if (! auth()->guard('avatars')->check()) {
            //TODO: Construct authenticate exception
            die('unauthenticated avatar');
        }

        auth()->shouldUse('avatars');

        dd(auth()->guard('avatars')->user()->username);

        return $next($request);
    }
}
