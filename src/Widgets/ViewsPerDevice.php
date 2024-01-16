<?php

namespace Datascaled\FathomStats\Widgets;

use Statamic\Widgets\Widget;

class ViewsPerDevice extends Widget
{
    /**
     * The HTML that should be shown in the widget.
     *
     * @return string|\Illuminate\View\View
     */
    public function html()
    {
        return view('datascaled::widgets.views_per_device');
    }
}
