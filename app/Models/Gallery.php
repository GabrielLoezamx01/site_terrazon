<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'gallery';

    protected $fillable = [
        'title', 'original_image', 'thumbnail_image', 'property_id'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

}
