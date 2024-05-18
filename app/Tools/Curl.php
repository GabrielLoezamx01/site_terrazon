<?php
namespace App\Tools;

class Curl {

    static public function  post(string $url, array $headers = [], array $data = [],)
    {
        try {
            $curl = curl_init();
            $options =  array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => http_build_query($data),
                CURLOPT_HTTPHEADER => $headers,
            );
            curl_setopt_array($curl, $options);
            $response = curl_exec($curl);
            curl_close($curl);
            return $response;
        } catch (\Exception $e) {
            error_log('Error in HTTP request: ' . $e->getMessage());
            return null;
        }
    }

}
