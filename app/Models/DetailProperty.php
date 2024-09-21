<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProperty extends Model
{
    use HasFactory;
    protected $table = 'details_property';
    protected $fillable = ['name','id'];
    public $timestamps = true;
    public function properties()
    {
        return $this->belongsToMany(Property::class, 'details_property_relationship', 'detail_id', 'property_id');
    }
}
