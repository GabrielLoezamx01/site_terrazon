<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $title;
    public $content;
    public $imageUrl;
    public $price;
    public $area;

    public function __construct($title, $content, $imageUrl, $price, $area)
    {
        $this->title = $title;
        $this->content = $content;
        $this->imageUrl = $imageUrl;
        $this->price = $price;
        $this->area = $area;
    }
    
    public function render()
    {
        return view('components.card');
    }
}
