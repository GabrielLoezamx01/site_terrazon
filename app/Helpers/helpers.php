<?php

if (!function_exists('json_dd')) {
    function json_dd($data)
    {
        header('Content-Type: application/json');
        die(json_encode($data, JSON_PRETTY_PRINT));
    }
}