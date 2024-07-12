<?php

namespace App\Models\Relationship;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureProperty extends Model
{
    use HasFactory;
    protected $table = 'features_property_relationship';
    protected $fillable = ['property_id', 'features_property_id'];
    public $timestamps = true;
}
