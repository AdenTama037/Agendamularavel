<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Client;

class LoginController extends Controller
{
    private $client;
    public function __construct()
    {
        $this->client = Client::find(2);
    }
    public function login(Request $request)
    {
        $http = new GuzzleHttpClient;
        $user = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => 2
        ];
        //$check = DB::table('users')->where('email', $request->email)->first();
        $this->isLogin(Auth::id());
        $response = $http->post('http://localhost:8000/oauth/token',[
            'form_params' =>[
                'grant_type' => 'password',
                'client_id' => $this->client->id,
                'client_secret' => $this->client->secret,
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '*',
            ],
        ]);
        return json_decode((string) $response->getBody);

    }
}
