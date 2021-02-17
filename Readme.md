# Statamic Analytics Widgets

![Statami v3](https://img.shields.io/badge/Statamic-3.0+-FF269E)
![Packagist](https://img.shields.io/packagist/v/phpsa/statamic-analytics)

A [Laravel Analytics](https://github.com/spatie/laravel-analytics) widget collection for Statamics Control Panel.

This repository contains the code for these widgets. While the code is open-source, it's important to remember that you'll need to purchase a license before using this addon in production. Licenses cost \$5 and can be purchased from the [Statamic Marketplace](https://statamic.com/seller/products/289).

## Installation

Install via the Control Panel or via composer

```bash
composer require phpsa/statamic-analytics
```

follow the instructions from [here](https://github.com/spatie/laravel-analytics#how-to-obtain-the-credentials-to-communicate-with-google-analytics) to enable the analytics,
remember to add the `ANALYTICS_VIEW_ID` to your .env file and the json file to `storage/app/analytics/service-account-credentials.json`

## Publish Config or set env variables (optionally)

this section is only if you want to use the automated tracking code

config file contains the following settings for the default site (you can assign different values for each site)

```
            'tracking_id' => env("PHPSA_SA_TRACKING_ID", null),
            'anonymize_ip' => env('PHPSA_SA_ANONYMIZE_IP', false),
            'async' => env('PHPSA_SA_ASYNC', false),
            'display_features' => env('PHPSA_SA_DISPLAY_FEATURES', false),
            'link_id' => env('PHPSA_SA_LINK_ID', false),
            'beacon' => env('PHPSA_SA_BEACON', false),
            'track_uid' => env('PHPSA_SA_TRACK_UID', false),
            'ignore_admins' => env('PHPSA_SA_IGNORE_ADMINS', true),
            'debug' => env('PHPSA_SA_DEBUG', false),
            'trace_debugging' => env('PHPSA_SA_TRACE_DEBUGGING', false),
            'disable_sending' => env('PHPSA_SA_DISABLE_SENDING', false),
```

or

`php artisan vendor:publish --tag=statamic-analytics-config`

you can then use the `{{statamic_analytics}}` or `{{ga}}` tag in your layout to publish your analytics tracking code.

## Enable Widgets

Currently we have 4 widgets available, more will be added based on feedback / requests. To enable a widget edit the `config/statamic/cp.php` file and add your widget requirement into the widgets section:
the following are available:
| type | group | additional parameters |
| --- | --- | --- |
| analytics | totalVisitorsAndPageViews | days (default 10) |
| analytics | topReferrers | days (default 7) max_results (default 10) |
| analytics | mostVisitedPages | days (default 7) max_results (default 10) |
| analytics | topBrowsers | days (default 7) max_results (default 10)|

eg: `

```php
 [
    'type' => 'analytics',
    'group' => 'totalVisitorsAndPageViews',
    'width' => 50,
    'days' => 10
]
```

## Advanced documentation

[Laravel Analytics](https://github.com/spatie/laravel-analytics)

## Security

If you discover any security related issues, please email vxdhost@gmail.com instead of using the issue tracker.
