<?php

namespace Datascaled\FathomStats\Widgets;

use Illuminate\Support\Arr;
use Statamic\Widgets\Widget;
use InvalidArgumentException;

class BaseWidget extends Widget
{
    public function __construct(protected ?int $days = null)
    {
        $this->days = Arr::get($this->config, 'days', 30);

        foreach (['site_id', 'api_token', 'base_url'] as $key) {
            if (!config("statamic.fathom-stats.$key")) {
                throw new InvalidArgumentException("Missing config value: $key");
            }
        }
    }
}
