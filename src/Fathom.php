<?php

namespace Datascaled\FathomStats;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;

class Fathom
{
    public function __construct(
        protected ?PendingRequest $instance = null
    ) {
        $this->instance = Http::withToken(
            config('statamic.fathom-stats.api_token')
        )
        ->baseUrl(
            config('statamic.fathom-stats.base_url')
        )
        ->acceptJson();
    }
}
