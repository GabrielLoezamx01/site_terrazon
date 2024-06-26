<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Amenities extends Model
{
    use HasFactory;

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'amenities_property_relationship', 'amenities_id', 'property_id');
    }
}
