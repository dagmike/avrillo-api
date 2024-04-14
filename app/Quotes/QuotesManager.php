<?php

namespace App\Quotes;

use Illuminate\Support\Manager;

class QuotesManager extends Manager
{
    public function getDefaultDriver()
    {
        return 'kanye';
    }

    public function createKanyeDriver()
    {
        return new KanyeQuotes();
    }
}