<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected  $table = 'home';

    protected $fillable = ['name', 'span'];

    public function homeProperties()
    {
        return $this->hasMany(HomeProperty::class);
    }
}
