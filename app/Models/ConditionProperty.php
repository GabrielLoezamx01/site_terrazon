<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConditionProperty extends Model
{
    use HasFactory;
    protected  $table = 'condition_property';
    public function properties()
    {
        return $this->belongsToMany(Property::class, 'condition_property_relationship', 'condition_id', 'property_id');
    }
}
