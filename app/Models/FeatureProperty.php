<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureProperty extends Model
{
    use HasFactory;
    protected $table = 'features_property';
    public function properties()
    {
        return $this->belongsToMany(Property::class, 'features_property_relationship', 'features_property_id', 'property_id');
    }
}
