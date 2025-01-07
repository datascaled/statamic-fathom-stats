<?php

namespace Datascaled\FathomStats;

use Datascaled\FathomStats\Widgets\AverageDuration;
use Datascaled\FathomStats\Widgets\Footer;
use Statamic\Providers\AddonServiceProvider;
use Datascaled\FathomStats\Widgets\VisitorsPerPage;
use Datascaled\FathomStats\Widgets\VisitorsPerDevice;
use Datascaled\FathomStats\Widgets\GeneralStatistics;

class ServiceProvider extends AddonServiceProvider
{
    public function bootAddon()
    {
        $this->publishes(
            [__DIR__ . '/../config/fathom-stats.php' => config_path('statamic/fathom-stats.php')],
            'statamic-fathom-stats-config'
        );

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'statamic-fathom-stats');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang/', 'statamic-fathom-stats');
    }

    protected $viewNamespace = 'statamic-fathom-stats';

    protected $widgets = [
        GeneralStatistics::class,
        VisitorsPerPage::class,
        VisitorsPerDevice::class,
        AverageDuration::class,
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
