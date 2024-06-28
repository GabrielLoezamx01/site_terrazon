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
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'email', 'password', 'verication_code', 'verication_code_expiration', 'status'];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($referral) {
            $referral->password = bcrypt($referral->password);
        });
    }
}
