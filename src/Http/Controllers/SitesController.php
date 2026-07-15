<?php

namespace Datascaled\FathomStats\Http\Controllers;

use Illuminate\Support\Carbon;
use Datascaled\FathomStats\Site;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class SitesController extends Controller
{
    public function show(?string $site = null): JsonResponse
    {
        $response = Cache::remember(
            'fathom-stats:v2:site:' . $site,
            Carbon::now()->addDay(),
            function () use ($site) {
                $data = (new Site())->get($site);

                return [
                    'data' => $data->json(),
                    'status' => $data->status(),
                ];
            }
        );

        return new JsonResponse($response['data'], $response['status']);
    }
}
