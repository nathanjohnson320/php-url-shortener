<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\RedirectResponse;

class UrlController extends Controller
{
    /**
     * Redirects a user to the long Url if the given shortUrl exists
     */
    public function show(string $shortUrl): RedirectResponse
    {
        $url = Url::where('shortUrl', $shortUrl)->firstOrFail();
        return redirect($url->longUrl);
    }
}
