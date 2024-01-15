<?php

namespace Datascaled\FathomStats;

use Datascaled\FathomStats\Fathom;

class Site extends Fathom
{
    public function __construct(
        protected string $siteId,
    ) {}

    public function get(): \Illuminate\Http\Client\Response
    {
        return $this->instance->get("/sites/$this->siteId");
    }
}
