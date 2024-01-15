<?php

namespace Datascaled\FathomStats\Http\Controllers;

use Datascaled\FathomStats\Aggregation;
use Illuminate\Support\Carbon;
use Datascaled\FathomStats\Site;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class SitesController extends Controller
{
    public function show(?string $site = null): JsonResponse
    {
        $data = Cache::remember('fathom-site-' . $site, Carbon::now()->addDay(), function () use ($site) {
            return (new Site())->get($site);
        });

        return new JsonResponse($data->json(), $data->status());
    }
}
