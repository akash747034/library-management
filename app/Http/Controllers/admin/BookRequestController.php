<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BookIssue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class BookRequestController extends Controller
{
    public function index(){
      
        try{

            $book_issue_requests=BookIssue::with(['user','book'])
            ->orderByDesc('created_at');

            if(request()->ajax()){

                return DataTables::of($book_issue_requests)
                ->addIndexColumn()
                 ->make(true);
              }
    
               return view('admin.book-requests');
           
        }
        catch(\Throwable $th){
            return response()->json(['message'=>$th->getMessage()]);
        }
    }


   
}
