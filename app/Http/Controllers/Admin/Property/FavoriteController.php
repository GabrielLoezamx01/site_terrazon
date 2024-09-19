<?php

namespace App\Http\Controllers\Admin\Property;

use App\Http\Controllers\Controller;
use App\Models\Favorite;

use Illuminate\Support\Facades\Auth;
use App\Services\FiltersService;

class FavoriteController extends Controller
{
    protected $filtersService;
    function __construct(
        FiltersService $filtersService
    ) {
        $this->filtersService = $filtersService;
    }
    private function reloadFavorites($userId)
    {
        $this->filtersService->cleanFavorites($userId);
    }
    public function toggleFavorite($propertyId)
    {
        $user = Auth::guard('custom_users')->user();
        $userId = $user->id;
        $favorite = Favorite::where('property_id', $propertyId)
            ->where('custom_user_id', $user->id)
            ->first();

        if ($favorite) {
            $favorite->delete();
            $this->reloadFavorites($userId);
            return response()->json(['message' => 'Property removed from favorites']);
        } else {
            Favorite::create([
                'property_id' => $propertyId,
                'custom_user_id' => $user->id,
            ]);
            $this->reloadFavorites($userId);
            return response()->json(['message' => 'Property added to favorites']);
        }
    }
}
