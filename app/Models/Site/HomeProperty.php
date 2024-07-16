<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;
class HomeProperty extends Model
{
    protected $table = 'home_property';

    protected $fillable = [
        'property_id',
        'home_id',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function home()
    {
        return $this->belongsTo(Home::class);
    }
}
