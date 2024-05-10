<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Referrals extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'referrals';
    protected $primaryKey = 'id_referral';

    protected $fillable = [
        'password',
        'registration_user_id',
        'email',
        'time_check',
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'registration_user_id');
    }
}
