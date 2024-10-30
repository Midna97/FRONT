<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    protected $client;

    public function __construct(){
        $this->client=new Client(['base_uri'=>'http://localhost:8001/api/']);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        try{
            
        $this->client=new Client(['base_uri'=>'http://localhost:8001/api/']);
        
        if (!$this->client){
            throw new \Exception('Cliente Guzzle no inicializado.');
        }
         
        $credentials = $request->only('email', 'password');
        $response = 
        $this->client->post('login', [
            'json' => [
                'email' => $request->email,
                'password' => $request->password,
            ],
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);

        if ($response->getStatusCode()==200){
            $data=json_decode($response->getBody(),true);
            session ()->put('token',$data['token']);
            session ()->put('user',$data['user']);

            $tipo=$data['user']['role']['role'];

            return view('home',['tipo'=>$tipo]); 
        }else{

            return redirect()->back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
        
        }
    }
    catch
        (Exception $valida){
            return response()->json(['message'=>$valida],500);
        }
                

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
