<?php

namespace Datascaled\FathomStats\Http\Controllers;

use Datascaled\FathomStats\Aggregation;
use Illuminate\Support\Carbon;
use Datascaled\FathomStats\Site;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function show(?string $site = null): JsonResponse
    {
        $data = [];

        $data['site'] = Cache::remember('fathom-site-' . $site, Carbon::now()->addDay(), function () use ($site) {
            return (new Site())->get($site)->json();
        });

        $dateTo = Carbon::now();
        $dateFrom = Carbon::now()->subDays(
            request()->integer('days') ?: 7
        );

        $data['pageviews'] = (new Aggregation())->get($site, aggregates: 'pageviews', dateTo: $dateTo, dateFrom: $dateFrom)->json();
        $data['pageviews-by-page'] = (new Aggregation())->get($site, sortBy: 'pageviews:desc', aggregates: 'pageviews', fieldGrouping: 'pathname', dateTo: $dateTo, dateFrom: $dateFrom)->json();

        return new JsonResponse($data);
    }
}
