<?php

namespace App\Models\Relationship;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesProperty extends Model
{
    use HasFactory;
    protected $table = 'types_property_relationship';
    protected $fillable = ['property_id', 'types_id'];
    public $timestamps = true;
}
