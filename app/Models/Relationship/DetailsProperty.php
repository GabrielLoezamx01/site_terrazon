<?php

namespace App\Models\Relationship;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsProperty extends Model
{
    use HasFactory;
    protected $table = 'details_property_relationship';
    protected $fillable = ['property_id', 'detail_id'];
    public $timestamps = true;
}
