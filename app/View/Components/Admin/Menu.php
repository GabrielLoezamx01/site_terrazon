<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminMenu extends Component
{
    public $sidebarItems;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->sidebarItems = [];
        dd($this->sidebarItems);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.menu');
    }
}
