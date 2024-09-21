<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Http\Resources\CardResource;
use App\Services\FiltersService;
use Illuminate\Support\Facades\Auth;

class Card extends Component
{
    public $card;
    public $isFavorite;
    public function __construct(CardResource $card, FiltersService $filtersService)
    {
        $userId = Auth::guard('custom_users')->user()->id ?? null;
        $favorited = $filtersService->getFavorites($userId);
        $this->card = $card->toArray(request());
        $this->isFavorite = in_array($card->id, $favorited) ? 1 : 0;
    }
    public function render()
    {
        return view('components.card');
    }
}
