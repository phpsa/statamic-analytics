# Statamic Blade Components

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
