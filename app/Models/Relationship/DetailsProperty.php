<?php

namespace App\Models\Relationship;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;
use App\Models\DetailProperty;

class DetailsProperty extends Model
{
    use HasFactory;

    // Especificar la tabla asociada con el modelo
    protected $table = 'details_property_relationship';

    // Especificar los atributos que se pueden asignar masivamente
    protected $fillable = ['property_id', 'detail_id'];

    // Habilitar las marcas de tiempo
    public $timestamps = true;

    // Definir la relación con el modelo Property
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    // Definir la relación con el modelo Detail
    public function detail()
    {
        return $this->belongsTo(DetailProperty::class);
    }
}
