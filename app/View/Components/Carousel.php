<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Carousel extends Component
{
    public $cards;
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cards,$id)
    {
        $this->cards = $cards;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.carousel');
    }
}
