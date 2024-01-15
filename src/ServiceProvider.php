<?php

namespace Datascaled\FathomStats;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    public function bootAddon()
    {
        $this->publishes(
            [__DIR__ . '/../config/fathom-stats.php' => config_path('statamic/fathom-stats.php')],
            'statamic-fathom-stats-config'
        );
    }

    /**
     * @var list<class-string<Widget>>
     */
    protected $widgets = [

    ];

    protected $routes = [
        'web' => __DIR__ . '/../routes/web.php',
    ];
}
