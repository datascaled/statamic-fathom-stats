<?php

namespace Datascaled\FathomStats;

use Datascaled\FathomStats\Widgets\Footer;
use Statamic\Providers\AddonServiceProvider;
use Datascaled\FathomStats\Widgets\Pageviews;
use Datascaled\FathomStats\Widgets\ViewsPerPage;
use Datascaled\FathomStats\Widgets\ViewsPerDevice;

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
        Pageviews::class,
        ViewsPerPage::class,
        ViewsPerDevice::class,
        Footer::class,
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
