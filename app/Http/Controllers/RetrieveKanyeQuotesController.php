<?php

namespace App\Http\Controllers;

use App\Quotes\Quotes;
use Illuminate\Support\Facades\Cache;

class RetrieveKanyeQuotesController extends Controller
{
    public function __invoke()
    {
        $quotes = Cache::remember(
            'kanyeQuotes',
            env('CACHED_QUOTES_TIME_IN_SECONDS'),
            fn () => Quotes::driver('kanye')->get()
        );

        // Return cache/db quotes
        return response()
            ->json($quotes);
    }
}
