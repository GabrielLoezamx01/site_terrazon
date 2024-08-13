<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public $title;
    public $action;

    /**
     * Create a new component instance.
     *
     * @param string $title
     * @param string|null $action
     * @return void
     */
    public function __construct($title, $action = null)
    {
        $this->title = $title;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.page-header');
    }
}
