<?php

namespace Datascaled\FathomStats;

use Datascaled\FathomStats\Fathom;

class Site extends Fathom
{
    public function get(string $siteId): \Illuminate\Http\Client\Response
    {
        return $this->instance->get("/sites/$siteId");
    }
}
