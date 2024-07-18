<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;
class Home extends Model
{
    use HasFactory;

    protected  $table = 'home';

    protected $fillable = ['name', 'span'];


    public function properties()
    {
        return $this->belongsToMany(Property::class, 'home_property', 'home_id', 'property_id');
    }
}
