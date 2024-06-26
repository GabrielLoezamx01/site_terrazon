<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProperty extends Model
{
    use HasFactory;
    protected $table = 'types_property';
    public function properties()
    {
        return $this->belongsToMany(Property::class, 'types_property_relationship', 'types_id', 'property_id');
    }
}
