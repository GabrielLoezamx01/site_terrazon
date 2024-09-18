<?php

namespace App\Http\Controllers\Admin\Property;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Property;

use Illuminate\Support\Facades\Auth;
class FavoriteController extends Controller
{
    public function toggleFavorite($propertyId)
    {
        $user = Auth::guard('custom_users')->user();

        $favorite = Favorite::where('property_id', $propertyId)
            ->where('custom_user_id', $user->id)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['message' => 'Property removed from favorites']);
        } else {
            Favorite::create([
                'property_id' => $propertyId,
                'custom_user_id' => $user->id,
            ]);
            return response()->json(['message' => 'Property added to favorites']);
        }
    }
}
