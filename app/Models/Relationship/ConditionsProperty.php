<?php

namespace App\Models\Relationship;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConditionsProperty extends Model
{
    use HasFactory;
    protected $table = 'condition_property_relationship';
    protected $fillable = ['property_id', 'condition_id'];
    public $timestamps = true;
}
