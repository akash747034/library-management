<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteUserController extends Controller
{
    public function __invoke()
    {
        try {
            Auth::user()->delete();
            return response()->json('Account deleted');
          } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
          }
    }
}
