<?php

namespace App\Http\Middleware;

use App\Models\Organisation;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Context;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class CaptureSubdomainOrganisation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $subdomain = $request->route('subdomain');

        if ($subdomain === null) {
            return $next($request);
        }

        URL::defaults(['subdomain' => $subdomain]);

        $organisation = Organisation::query()->where('subdomain', $subdomain)->firstOrFail();
        Context::add('organisation', $organisation->id);

        return $next($request);
    }
}
