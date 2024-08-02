<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CardResource extends JsonResource
{
    public static $wrap = null; 
    public function toArray($request)
    {
        $title       = $this->title ?? '';
        $price       = number_format($this->price ?? 0, 2, '.', ',');
        $area        = $this->area ?? '';
        $imageUrl    = isset($this->img) ? asset('storage/' . $this->img) : '';
        $description = isset($this->description) ? Str::limit($this->description, 300) : '';
        $detailsPage = '/ficha/' . $this->folio;
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
            'title'       => $title,
            'price'       => $price,
            'area'        => $area,
            'imageUrl'    => $imageUrl,
            'description' => $description,
            'features'    => $features,
            'detailsPage' => $detailsPage
        ];
    }
}
