<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'country'
    ];
    /**
     * Get the municipalities for the state.
     */
    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }
}
