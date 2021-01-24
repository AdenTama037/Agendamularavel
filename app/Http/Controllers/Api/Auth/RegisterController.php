<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use function GuzzleHttp\Psr7\str;

class RegisterController extends Controller
{
    public function register(Request $request){
        $this->validate($request,[
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8|confirmed'
    ]);

    $user = $this->newUser($request->all());
    if(empty($user)){
        return response([
            'message'=> 'failed to create account'
        ]);
    }else{
        return response([
            'message'=>'account created,please verify your email'
        ]);
    }
    }
    private function newUser(array $data){
        return User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'passswod'=> Hash::make($data['password']),
            'role_id'=> 3,
            'activation_token'=> Str::random(20)
        ]);
    }
}