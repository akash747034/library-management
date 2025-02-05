<?php

namespace App\Http\Controllers\book;

use App\Http\Controllers\Controller;
use App\Models\BookIssue;
use Illuminate\Http\Request;

class BookRquestController extends Controller
{
    public function index(){
        try{

            $book_issue_requests=BookIssue::orderByDesc('created_at')->get();
            return response()->json($book_issue_requests);
        }
        catch(\Throwable $th){
            return response()->json(['message'=>$th->getMessage()]);
        }
    }
}
