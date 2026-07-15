<?php

namespace Datascaled\FathomStats\Http\Controllers;

use Datascaled\FathomStats\Aggregation;
use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class AggregationController extends Controller
{
    public function index(string $site): JsonResponse
    {
        $query = request()->query();
        ksort($query);

        $cacheKey = 'fathom-stats:v2:site:' . $site . ':aggregations:'
            . hash('sha256', json_encode($query, JSON_THROW_ON_ERROR));

        $response = Cache::remember(
            $cacheKey,
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

                return [
                    'data' => $data->json(),
                    'status' => $data->status(),
                ];
            }
        );

        return new JsonResponse($response['data'], $response['status']);
    }
}
