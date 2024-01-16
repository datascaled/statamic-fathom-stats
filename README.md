# Statamic Fathom Stats

> Statamic Fathom Stats is a Statamic addon that adds widgets for the dashboard.

![Preview](https://github.com/datascaled/statamic-fathom-stats/blob/master/assets/preview.png)

## Features

This addon provides the following widgets:

- Pageviews
- Views per device
- Views per page
- Footer

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

Add the widgets to config/statamic/cp.php

``` php
[
    'type' => 'pageviews',
    'width' => 100,
],
[
    'type' => 'views_per_device',
    'width' => 50,
],
[
    'type' => 'views_per_page',
    'width' => 50,
],
[
    'type' => 'footer',
    'width' => 100,
],
```
