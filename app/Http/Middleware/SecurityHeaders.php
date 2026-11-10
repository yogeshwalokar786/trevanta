<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request and enforce strict security headers.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Mitigate Clickjacking: prevent framing on third-party domains
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');

        // Mitigate MIME Sniffing attacks
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // Legacy XSS filter defense for older browsers
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        // Prevent leaking full URL paths or sensitive tokens across origins
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // Restrict sensitive browser features/APIs
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=(), payment=()');

        // Remove server signature
        header_remove('X-Powered-By');
        $response->headers->remove('X-Powered-By');

        // HSTS: Enforce HTTPS when running under SSL/TLS
        if ($request->isSecure()) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        }

        return $response;
    }
}

