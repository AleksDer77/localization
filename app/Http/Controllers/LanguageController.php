<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function __invoke(Language $language)
    {
        abort_unless($language->active, 404);

        $cookie = cookie()->forever('language', $language->id);

        return back()->withCookie($cookie);
    }
}
