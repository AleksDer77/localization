<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageRouteMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $prefix = Language::routePrefix();

        $currentLanguage = app()->getLocale();

        $defaultLanguage = Language::findDefault()->id;

        if ($defaultLanguage === $currentLanguage) {
            if (is_null($prefix)) {
                return $next($request);
            }
            dd(123);
        }

        if ($prefix === $currentLanguage) {
            return $next($request);
        }

      return $this->redirect($request, $currentLanguage, $prefix);
    }

    private function redirect(Request $request, string $language, string|null $prefix = null): RedirectResponse
    {
        $url = $language;

        $segments = $request->segments();

        $prefix && array_shift($segments);

        if ($path = implode('/', $segments)) {
            $url .= "/$path";
        }

        if ($query = $request->getQueryString()) {
            $url .= "?$query";
        }

        return redirect($url);
    }
}
