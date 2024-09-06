<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyReferral extends Model
{
    use HasFactory;
    protected $table = 'property_referral';

    protected $fillable = [
        'property_id',
        'referral_id',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function referral()
    {
        return $this->belongsTo(Referrals::class, 'id_referral');
    }
}
