<ui-widget title="{{ __('statamic-fathom-stats::fathom-stats.visitors_per_page') }}">
    <div class="px-4 py-3">
        <visitors-per-page
            site-id="{{ config('statamic.fathom-stats.site_id') }}"
            locale="{{ config('app.locale') }}"
            days="{{ $days }}"
        />
    </div>
</ui-widget>
