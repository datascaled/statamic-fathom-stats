<?php

namespace Datascaled\FathomStats;

use Illuminate\Support\Facades\Http;

class Fathom
{
    public function __construct(
        protected Http $instance
    ) {
        $this->instance = Http::withToken(
            config('fathom.api_token')
        )
        ->baseUrl(
            config('fathom.base_url')
        )
        ->acceptJson();
    }
}
