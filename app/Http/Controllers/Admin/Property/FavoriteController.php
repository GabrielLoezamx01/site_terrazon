<?php

namespace App\Http\Controllers\Admin\Property;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Property;
use App\Http\Resources\CardResource;
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

    public function getFavorites()
    {
        $user = Auth::guard('custom_users')->user();
        $favorites = Favorite::where('custom_user_id', $user->id)->with('property')->get();
        $properties = Property::whereIn('id', $favorites->pluck('property_id'))->with('types', 'location', 'amenities', 'conditions', 'details', 'features', 'galleries')->where('available', 1)->get();
        $data = [];
        foreach ($properties as $kp => $vp) {
            $data[] = new CardResource($vp);
        }
        if (!empty($data)) {
            shuffle($data);
        }
        return view('user.admin.favorite', compact('data'));
    }
}
