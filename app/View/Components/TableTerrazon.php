<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableTerrazon extends Component
{
    public $data;
    public $columns;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data , $columns)
    {
        $this->data = $data;
        $this->columns = $columns;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-terrazon');
    }
}
