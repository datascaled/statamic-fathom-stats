<?php

namespace Datascaled\FathomStats\Widgets;

use Datascaled\FathomStats\Widgets\BaseWidget;

class VisitorsPerDevice extends BaseWidget
{
    /**
     * The HTML that should be shown in the widget.
     *
     * @return string|\Illuminate\View\View
     */
    public function html()
    {
        return view('datascaled::widgets.visitors_per_device', ['days' => $this->days]);
    }
}
