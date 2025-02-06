<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserListController extends Controller
{
    public function __invoke()
    {
        try
        {
           $users=User::where('role','!=','admin')
           ->orderByDesc('created_at');

           if(request()->ajax()){

            return DataTables::of($users)
            ->addIndexColumn()
             ->editColumn('created_at',function($user){
               return $user->created_at->diffForHumans();
             })
             ->make(true);
          }

           return view('admin.users');
        }
        catch(\Throwable $th){
            return response()->json(['message'=>$th->getMessage()]);
        }
    }
}
