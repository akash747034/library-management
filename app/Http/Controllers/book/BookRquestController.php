<?php

namespace App\Http\Controllers\book;

use App\Http\Controllers\Controller;
use App\Models\BookIssue;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BookRquestController extends Controller
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
