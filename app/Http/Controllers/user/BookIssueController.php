<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookIssueController extends Controller
{
    public function store(BookIssueRequest $request)
    {
            $Book_issue=BookIssue::create(['user_id'=>Auth::id(),'book_id'=>$request->book_id,'issue_status'=>'requested']);

            return response()->json($Book_issue);
    }
}
