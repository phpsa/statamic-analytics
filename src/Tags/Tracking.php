<?php

namespace Phpsa\StatamicAnalytics\Tags;

use Statamic\Tags\Tags;
use Statamic\Facades\Config;
use Statamic\Facades\Site;
use Statamic\View\View;

Class Tracking extends Tags
{

    protected static $handle = 'ga';
    protected static $aliases = ['statamic-analytics'];

    public function index()
    {
        $tracking_id = str_replace(' ', '', $this->getConfig('tracking_id', ''));
        if(empty($tracking_id)){
             return '<!-- Google Analytics Tracking code is not setup yet! -->';
        }

       return View::make(
        'statamic-analytics::tracking-code'
        )->with( [
          'tracking_id' => $tracking_id,
          'anonymize_ip' => $this->getConfig('anonymize_ip', false),
          'async' => $this->getConfig('async', false),
          'display_features' => $this->getConfig('display_features', false),
          'link_id' => $this->getConfig('link_id', false),
          'beacon' => $this->getConfig('beacon', false),
          'track_uid' => $this->getConfig('track_uid', false),
          'ignore_admins' => $this->getConfig('ignore_admins', false),
          'user' => $this->getConfig('track_uid', false) ? User::getCurrent() : false,
          'debug' => $this->getConfig('debug', false),
          'trace_debugging' => $this->getConfig('trace_debugging', false),
          'disable_sending' => $this->getConfig('disable_sending', false),
        ])->render();


    }


    private function getConfig($key, $default = null)
    {
        $config = collect(Config::get('statamic-analytics.sites'));
        $site = Site::current()->handle();

        $conf = $config->get($site);
        $main = $config->get('default');

        if(isset($conf[$key])){
            return $conf[$key];
        }

        if(isset($main[$key])){
            return $main[$key];
        }

        return $default;
    }
}
