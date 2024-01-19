<?php

namespace Datascaled\FathomStats\Widgets;

use Datascaled\FathomStats\Widgets\BaseWidget;

class VisitorsPerPage extends BaseWidget
{
    /**
     * The HTML that should be shown in the widget.
     *
     * @return string|\Illuminate\View\View
     */
    public function html()
    {
        return view('datascaled::widgets.visitors_per_page', ['days' => $this->days]);
    }
}
