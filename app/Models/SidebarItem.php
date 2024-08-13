<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SidebarItem extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'svg', 'link', 'parent_id'];

    // Relación con los ítems hijos
    public function children()
    {
        return $this->hasMany(SidebarItem::class, 'parent_id');
    }

    // Relación con el ítem padre
    public function parent()
    {
        return $this->belongsTo(SidebarItem::class, 'parent_id');
    }
}
