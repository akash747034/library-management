<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
         try
         {  
             
            $user = User::create(['name' => $request->name,'email' => $request->email, 'password' => Hash::make($request->password),'role'=>$request->role]);
           
            return response()->json(new UserResource($user),200);
        }
         catch(\Throwable $th){
            return response()->json(['message'=>$th->getMessage()]);
         }
    }
}
