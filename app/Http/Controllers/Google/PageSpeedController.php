<?php

namespace App\Http\Controllers\Google;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageSpeedController extends Controller
{
    public function getAPIKey(): string
    {
        return "AIzaSyBQrcaaIATG7Gyy8-pJDvenH3hW9VaG7nQ";
    }

    public function runPageSpeed(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=https://ulstu.ru&key={$this->getAPIKey()}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }
        else {
            $data = json_decode($response, true);
            return $data;
        }
    }
}
