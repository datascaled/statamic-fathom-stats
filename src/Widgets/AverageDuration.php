<?php

namespace Datascaled\FathomStats\Widgets;

use Datascaled\FathomStats\Widgets\BaseWidget;

class AverageDuration extends BaseWidget
{
    /**
     * The HTML that should be shown in the widget.
     *
     * @return string|\Illuminate\View\View
     */
    public function html()
    {
        return view('statamic-fathom-stats::widgets.average_duration', ['days' => $this->days]);
    }
}
