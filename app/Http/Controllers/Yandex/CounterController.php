<?php

namespace App\Http\Controllers\Yandex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;


class CounterController extends Controller
{

    public function getOAUTHKey(){
        return "y0_AgAAAAAOcEs7AAqDewAAAADs_gmpEQcM7uYCRuG7PQjVjEd1T_Hsulc";
    }

    public function auth(){
        return view('counter');
    }

    public function getAuth(){
        return view('get_oauth_key');
    }

    public function getCounters(){
        $response = Http::withHeaders([
            'Authorization' => 'OAuth ' . $this->getOAUTHKey(),
        ])->get('https://api-metrika.yandex.net/management/v1/counters');
        return $response->json();
    }

    public function getCountersInfo(){
        $counters = collect();
        $response = $this->getCounters();
        foreach ($response['counters'] as $counter){
            $item = array();
            $item['name'] = $counter['name'];
            $item['create_time'] = $counter['create_time'];
            $item['site'] = $counter['site'];
            $counters->push($item);
        }
        return response()->json([
            'data' => $counters
        ]);
    }

}
