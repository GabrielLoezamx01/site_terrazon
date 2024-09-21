<?php

namespace App\Services;
 
use Illuminate\Support\Facades\Cache;


class FiltersService
{ 
    protected $favorites;
    public function __construct()
    { 
        $this->favorites =  [];
    }
    public function favorites()
    {
        return [];
    }
}
