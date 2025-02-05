<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke()
    {
        try {
            request()->user()->tokens->each->revoke();
            return response()->json('You have successfully logged out');
          } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
          }
    }
}
