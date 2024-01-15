<?php

namespace Datascaled\FathomStats;

use Datascaled\FathomStats\Fathom;

class Aggregation extends Fathom
{
    public function get(
        string $siteId,
        ?string $entity = "pageview",
        ?string $aggregates = "pageviews",
        ?string $dateGrouping = "day",
        ?string $fieldGrouping = null,
        ?string $dateFrom = null,
        ?string $dateTo = null,
        ?string $sortBy = 'timestamp:desc',
    ): \Illuminate\Http\Client\Response {
        return $this->instance->get("/aggregations", [
            "entity" => $entity,
            "entity_id" => $siteId,
            "aggregates" => $aggregates,
            "field_grouping" => $fieldGrouping,
            "date_grouping" => $dateGrouping,
            "date_from" => $dateFrom,
            "date_to" => $dateTo,
            "sort_by" => $sortBy,
        ]);
    }
}
