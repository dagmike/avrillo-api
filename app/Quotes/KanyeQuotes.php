<?php

namespace App\Quotes;

use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

class KanyeQuotes implements QuotesInterface
{
    public function get(): array
    {
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->get('https://api.kanye.rest'),
            $pool->get('https://api.kanye.rest'),
            $pool->get('https://api.kanye.rest'),
            $pool->get('https://api.kanye.rest'),
            $pool->get('https://api.kanye.rest'),
        ]);

        return array_map(function ($response) {
            return $response->json()['quote'];
        }, $responses);
    }
}