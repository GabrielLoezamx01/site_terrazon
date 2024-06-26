<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;

class Municipality extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'state_id'
    ];

    /**
     * Get the properties for the municipality.
     */
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
    /**
     * Get the state that owns the municipality.
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
