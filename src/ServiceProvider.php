<?php

namespace Datascaled\FathomStats;

use Datascaled\FathomStats\Widgets\FathomStats;
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

    protected $viewNamespace = 'datascaled';

    protected $widgets = [
        FathomStats::class
    ];

    protected $routes = [
        'web' => __DIR__ . '/../routes/web.php',
    ];

    protected $vite = [
        'input' => [
            'resources/js/cp.js',
        ],
        'publicDirectory' => 'resources/dist',
    ];
}
