<?php

namespace Phpsa\StatamicAnalytics;

use Statamic\Statamic;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;
use Phpsa\StatamicAnalytics\Actions\PageGraph;
use Phpsa\StatamicAnalytics\Subscriber;
use Phpsa\StatamicAnalytics\Tags\Tracking;
use Statamic\Providers\AddonServiceProvider;
use Phpsa\StatamicAnalytics\Widgets\Analytics;
use Phpsa\StatamicAnalytics\FieldType\GaPageStatsFieldType;

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

    protected $fieldtypes = [
        GaPageStatsFieldType::class
    ];



    public function boot()
    {
        parent::boot();

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'statamic-analytics');
        $this->publishes([
            __DIR__ . '/../config/' => config_path(),
        ], 'statamic-analytics-config');

        Event::subscribe(Subscriber::class);

        Statamic::booted(function () {

            $this->registerActionRoutes(function () {
                Route::get('page-data/', [PageGraph::class, 'getPageGraph']);
            });
        });
    }
}
