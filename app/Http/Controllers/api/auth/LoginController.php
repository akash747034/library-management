<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserTokenResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        try{
              
       
        if (Auth::attempt(['email'=>$request->email, 'password' => $request->password])) {
          $user = Auth::user();
          $token = $user->createToken('access_token')->accessToken;
          $user->access_token = $token;
          return response()->json(new UserTokenResource($user), 200);
        }
        return response()->json(['message' => 'Invalid credentials'], 401); 

        }
        catch(\Throwable $th){
            return response()->json(['message'=>$th->getMessage()]);
        }
      
    }
}
