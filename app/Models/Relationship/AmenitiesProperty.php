<?php

namespace App\Models\Relationship;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmenitiesProperty extends Model
{
    use HasFactory;
    protected $table = 'amenities_property_relationship';
    protected $fillable = ['property_id', 'amenities_id'];
    public $timestamps = true;
}
