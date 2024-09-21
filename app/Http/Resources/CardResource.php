<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CardResource extends JsonResource
{
    public static $wrap = null; 
    public function toArray($request)
    {
        $userId = auth()->id() ?? 'NOUSER';
 
        $id          = $this->id; 
        $title       = $this->title ?? '';
        $price       = number_format($this->price ?? 0, 0, '.', ',');
        $area        = $this->m2 ?? '';
        $isFavorite  = $this->isFavorite ?? 0;
        $types_id    = $this->types[0]->id ?? '';
        $imageUrl    = isset($this->img) ? asset('storage/' . $this->img) : '';
        $description = isset($this->description) ? Str::limit($this->description, 300) : '';
        $detailsPage = '/ficha/' . $this->folio;
        $latitude    = $this->latitude ?? '';
        $longitude  = $this->longitude ?? '';
        $features = [];
        if (isset($this->features)) {
            foreach ($this->features as $kf => $vf) {
                $features[] = [
                    "icon"  => $vf['icon'],
                    "name"  => $vf['name']
                ];
            }
            $features = array_slice($features, 0, 3);
        }
        return [
            'id'          => $id,
            'user_id '    => $userId,
            'isFavorite'  => $isFavorite,
            'title'       => $title,
            'price'       => $price,
            'type_id'     => 1,
            'area'        => $area,
            'imageUrl'    => $imageUrl,
            'description' => $description,
            'features'    => $features,
            'latitude'    => $latitude,
            'longitude'   => $longitude,
            'detailsPage' => $detailsPage
        ];
    }
}
