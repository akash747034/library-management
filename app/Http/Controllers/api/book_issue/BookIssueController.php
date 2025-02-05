<?php

namespace App\Http\Controllers\api\book_issue;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookIssueRequest;
use App\Models\BookIssue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book_issues=BookIssue::with(['book.publisher','book.auther','book.category'])
                     ->where('user_id',Auth::id())
                     ->get();

                     return response()->json($book_issues);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookIssueRequest $request)
    {
            $Book_issue=BookIssue::create(['user_id'=>Auth::id(),'book_id'=>$request->book_id,'issue_status'=>'requested']);

            return response()->json($Book_issue);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $book_issued=BookIssue::with(['book.publisher','book.auther','book.category'])
        //              ->where('id',$request->book_issue_id)

        //              ->get();

        //              return response()->json($book_issued);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
