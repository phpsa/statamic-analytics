<?php

namespace Phpsa\StatamicAnalytics;

use Phpsa\StatamicAnalytics\Tags\Tracking;
use Phpsa\StatamicAnalytics\Widgets\Analytics;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{

    protected $viewNamespace = 'phpsa-analytics';

    protected $routes = [
        'cp' => __DIR__.'/../routes/cp.php',
    ];

    protected $scripts = [
    __DIR__.'/../resources/dist/js/cp.js'
];

    protected $widgets = [
        Analytics::class
    ];

    protected $tags = [
        Tracking::class
];

public function boot()
{
    parent::boot();

    $this->loadViewsFrom(__DIR__.'/../resources/views', 'statamic-analytics');
            $this->publishes([
            __DIR__ . '/../config/' => config_path(),
        ], 'statamic-analytics-config');
}
}
