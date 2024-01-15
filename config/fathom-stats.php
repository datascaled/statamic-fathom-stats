<?php

return [
    /**
     * A fathom api token with read permission to the selected site.
     *
     * https://app.usefathom.com/api
     */
    'api_token' => env('FATHOM_API_TOKEN'),

    /**
     * The site id used for tracking.
     *
     * https://app.usefathom.com/sites
     */
    'site_id' => env('FATHOM_SITE_ID'),

    /**
     * The api base url for fetching data.
     *
     * https://usefathom.com/api
     */
    'base_url' => env('FATHOM_API_BASE_URL', 'https://api.usefathom.com/v1/'),
];
