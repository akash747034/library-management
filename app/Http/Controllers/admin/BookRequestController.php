<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBookIssueRequest;
use App\Http\Requests\UpdateBookReturnRequest;
use App\Models\BookIssue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class BookRequestController extends Controller
{
    public function bookIssueRequests(){
      
        try{

            $book_issue_requests=BookIssue::with(['user','book'])
            ->where('issue_status','=','requested')
            ->orderByDesc('created_at');

            if(request()->ajax()){

                return DataTables::of($book_issue_requests)
                ->addIndexColumn()
                ->editColumn('created_at',function($user){
                    return $user->created_at->diffForHumans();
                  })
                  ->addColumn('action',function($book){
                  
                    return '<button class="btn btn-primary open-modal" 
                    data-id="' . $book->id . '" 
                    >
                      ' . ucfirst($book->issue_status) . '
                    </button>';
                })
                ->rawColumns(['action'])
                 ->make(true);
              }
    
               return view('admin.book-issue-requests');
           
        }
        catch(\Throwable $th){
            return response()->json(['message'=>$th->getMessage()]);
        }
    }



    public function bookReturnRequests(){
      
        try{

            $book_issue_requests=BookIssue::with(['user','book'])
            ->where('issue_status','=','requestedForReturn')
            ->orderByDesc('created_at');

            if(request()->ajax()){

                return DataTables::of($book_issue_requests)
                ->addIndexColumn()
                ->editColumn('created_at',function($user){
                    return $user->created_at->diffForHumans();
                  })
        
                  ->addColumn('action',function($book){
                    return view('actions.admin.return-book-request',compact('book'));
                })
                ->rawColumns(['action'])
                 ->make(true);
              }
    
               return view('admin.book-return-requests');
           
        }
        catch(\Throwable $th){
            return response()->json(['message'=>$th->getMessage()]);
        }
    }


    public function updateBookIssueRequest(UpdateBookIssueRequest $request){

        try
        {
        $book=BookIssue::find($request->book_id);
        $book->issue_status=$request->issue_status;
        $book->issue_date=now();
        $book->save();
        return redirect()->back()->with('success', 'You have successfully accepted book issue request!');
       }
         catch(\Throwable $th){
            return response()->json(['message'=>$th->getMessage()]);
        }
    }

    public function updateBookReturnRequest(UpdateBookReturnRequest $request){

        try{
        $book=BookIssue::find($request->book_id);
        $book->issue_status='returned';
        $book->return_date=now();
        $book->save();
        return redirect()->back()->with('success', 'You have successfully accepted book return request!');
        }
        catch(\Throwable $th){
            return response()->json(['message'=>$th->getMessage()]);
        }
    }

   
}
