<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class CategoriesController extends Controller
{
    protected $client;

    public function __construct(){
        $this->client=new Client(['base_uri'=>'http://localhost:8001/api/']);
    }
    
    public function consulta(){
            $valida=$this->client->request('GET','category',[ 'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '. session()->get('token')
            ],]);
        $response=$valida->getBody();
        return $response;
    }
}
