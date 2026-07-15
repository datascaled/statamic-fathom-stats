# Statamic Fathom Stats

> Statamic Fathom Stats is a Statamic addon that adds widgets for the dashboard.

![Preview](https://raw.githubusercontent.com/datascaled/statamic-fathom-stats/master/assets/preview.png)

## Features

This addon provides the following widgets:

- Pageviews
- Visitors per device
- Visitors per page
- Average duration on site
- Footer

## There's more 🚀

- Fully translateable
- Each widget is optional
- Each widget allows a custom amount of days

## Requirements

- PHP 8.3 or newer
- Statamic 6 (Laravel 12 or 13)

## How to Install

You can search for this addon in the `Tools > Addons` section of the Statamic control panel and click **install**, or run the following command from your project root:

``` bash
composer require datascaled/statamic-fathom-stats
```

``` bash
php artisan vendor:publish --tag="statamic-fathom-stats-config"
```

Add the following values to your env file

``` env
FATHOM_API_TOKEN=
FATHOM_SITE_ID=
```

Add the widgets to the `widgets` array in `config/statamic/cp.php`:

``` php
'widgets' => [
    [
        'type' => 'general_statistics',
        'days' => 30,
        'width' => 'full',
    ],
    [
        'type' => 'visitors_per_device',
        'days' => 30,
        'width' => 'md',
    ],
    [
        'type' => 'visitors_per_page',
        'days' => 30,
        'width' => 'md',
    ],
    [
        'type' => 'average_duration',
        'days' => 30,
        'width' => 'full',
    ],
    [
        'type' => 'footer',
        'width' => 'full',
    ],
],
```

## Important notice

Since the API is early access and Fathom has set a throttling of 10 requests per minute, we have decided not to provide any filters.

## Sponsor

Development of this addon is sponsored by [Lua](https://lua.ch).

Made with ❤️ in Zurich by [Datascale](https://datascale.ch)
