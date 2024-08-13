<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Http\Resources\CardResource;
class Card extends Component
{
    public $card;
    public function __construct(CardResource $card)
    {
        $this->card = $card->toArray(request());
    }

    public function render()
    {
        return view('components.card');
    }
}
