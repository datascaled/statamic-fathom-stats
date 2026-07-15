<ui-widget title="{{ __('statamic-fathom-stats::fathom-stats.average_duration_on_site') }}">
    <div class="px-4 py-3">
        <average-duration
            site-id="{{ config('statamic.fathom-stats.site_id') }}"
            locale="{{ config('app.locale') }}"
            days="{{ $days }}"
        />
    </div>
</ui-widget>
