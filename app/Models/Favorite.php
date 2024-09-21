<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['property_id', 'custom_user_id'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function customUser()
    {
        return $this->belongsTo(CustomUser::class);
    }
}
