<?php

namespace Datascaled\FathomStats\Http\Controllers;

use Datascaled\FathomStats\Aggregation;
use Illuminate\Support\Carbon;
use Datascaled\FathomStats\Site;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class AggregationController extends Controller
{
    public function index(string $site): JsonResponse
    {
        return Cache::remember(
            'fathom-site-' . $site . '-aggregations-' . json_encode(request()->all()),
            Carbon::now()->addMinute(),
            function () use ($site) {
                $data = (new Aggregation())
                    ->get(
                        siteId: $site,
                        entity: request()->input('entity', 'pageview'),
                        aggregates: request()->input('aggregates', 'pageviews'),
                        dateGrouping: request()->input('date_grouping', 'day'),
                        fieldGrouping: request()->input('field_grouping'),
                        dateFrom: Carbon::now()->subDays(request()->integer('days') ?: 7),
                        dateTo: Carbon::now(),
                        sortBy: request()->input('sort_by', 'timestamp:asc'),
                    );

                return new JsonResponse(
                    $data->json(),
                    $data->status()
                );
            }
        );
    }
}
