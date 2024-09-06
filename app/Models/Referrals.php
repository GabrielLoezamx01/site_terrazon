<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Crypt;

class Referrals extends Authenticatable
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

    static function expiration($encryptedParam)
    {
        list($encodedEmail, $encodedToken) = explode('.', $encryptedParam);
        $email = self::decryptString($encodedEmail);
        $token = self::decryptString($encodedToken);
        return Referrals::where('email', $email)
            ->where('verication_code', $token)
            ->first();
    }

    static function decryptString($data)
    {
        return Crypt::decryptString(base64_decode($data));
    }

    public function properties()
    {
        return $this->hasMany(PropertyReferral::class, 'id_referral');
    }
}
