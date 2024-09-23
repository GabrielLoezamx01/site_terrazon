<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Site\Home;

class Property extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'latitude',
        'longitude',
        'm2',
        'address',
        'rooms',
        'bathrooms',
        'parking',
        'img',
        'available',
        'municipality_id',
        'map'
    ];
    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function types()
    {
        return $this->belongsToMany(TypeProperty::class, 'types_property_relationship', 'property_id', 'types_id');
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenities::class, 'amenities_property_relationship', 'property_id', 'amenities_id');
    }

    public function conditions()
    {
        return $this->belongsToMany(ConditionProperty::class, 'condition_property_relationship', 'property_id', 'condition_id');
    }

    public function details()
    {
        return $this->belongsToMany(DetailProperty::class, 'details_property_relationship', 'property_id', 'detail_id');
    }

    public function features()
    {
        return $this->belongsToMany(FeatureProperty::class, 'features_property_relationship', 'property_id', 'features_property_id');
    }

    public function homes()
    {
        return $this->belongsToMany(Home::class, 'home_property', 'property_id', 'home_id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'property_id');
    }

    public function distributions()
    {
        return $this->hasMany(Distribution::class);
    }

    public function referrals()
    {
        return $this->belongsToMany(Referrals::class, 'property_referral');
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function isFavoritedBy($user)
    {
        if($user){
            return $this->favorites()->where('custom_user_id', $user->id)->exists();
        }else{
            return false;
        }
    }
    public function scopeWithFavoriteStatus($query, $userId)
    {
        return $query->addSelect(['isFavorite' => function ($query) use ($userId) {
            $query->selectRaw('COUNT(*) > 0')
                ->from('favorites')
                ->whereColumn('favorites.property_id', 'properties.id')
                ->where('favorites.custom_user_id', $userId);
        }]);
    }
    public function isFavorited()
    {
        return $this->isFavorite;
    }
}
