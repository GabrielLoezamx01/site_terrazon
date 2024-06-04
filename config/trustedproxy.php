return [
    'proxies' => '*', // Puede ser una dirección IP específica o un rango
    'headers' => \Illuminate\Http\Request::HEADER_X_FORWARDED_ALL,
];