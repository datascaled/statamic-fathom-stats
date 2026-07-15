<ui-widget title="{{ __('statamic-fathom-stats::fathom-stats.page_visits') }}">
    <div class="px-4 py-3">
        <general-statistics
            site-id="{{ config('statamic.fathom-stats.site_id') }}"
            locale="{{ config('app.locale') }}"
            days="{{ $days }}"
        />
    </div>
</ui-widget>
