<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListSidebar extends Model
{
    use HasFactory;
    protected $table = 'list_sidebar';
    protected $fillable = ['name'];

}
