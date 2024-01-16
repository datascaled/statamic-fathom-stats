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
php please fathom-stats:install
```

Add the following values to your env file

``` env
FATHOM_API_TOKEN=
FATHOM_SITE_ID=
```
