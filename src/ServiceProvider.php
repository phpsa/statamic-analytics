<?php

namespace Phpsa\StatamicAnalytics;

use Phpsa\StatamicAnalytics\Widgets\Analytics;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{

    protected $viewNamespace = 'phpsa-analytics';

    protected $routes = [
        'cp' => __DIR__.'/../routes/cp.php',
    ];

    protected $widgets = [
        Analytics::class
    ];
}
