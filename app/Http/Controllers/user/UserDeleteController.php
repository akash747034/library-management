<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDeleteController extends Controller
{
    public function __invoke(){
        try
        {
            Auth::user()->delete;

        }
        catch(\Throwable $th){
            return response()->json(['message'=>$th->getMessage()]);
        }

    }
 
}
