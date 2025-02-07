<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookIssueRequest;
use App\Http\Requests\BookReturnRequest;
use App\Models\Book;
use App\Models\BookIssue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class UserBookController extends Controller

{
    public function index(){
        try
        {  
              $books=Book::with(['publisher','auther','category'])
                     ->where('quantity','>',0)
                     ->orderByDesc('created_at');
            
                     if(request()->ajax()){
                        return DataTables::of($books)
                        ->addIndexColumn()
                        ->editColumn('created_at',function($user){
                            return $user->created_at->diffForHumans();
                          })
                        ->addColumn('action',function($book){
                            return view('actions.user.books',compact('book'));
                        })
                        ->rawColumns(['action'])
                         ->make(true);
                      }
            
                       return view('user.book');

        }
        catch(\Throwable $th){
            return response()->json(['message'=>$th->getMessage()]);
        }
    }
    
    public function bookIssue(BookIssueRequest $request)
    
    {

            $book_issue=BookIssue::create(['user_id'=>Auth::id(),'book_id'=>$request->book_id,'issue_status'=>'requested']);

            return redirect()->back()->with('success', 'You have successfully requested the book!');
    }


    public function bookReturn(BookReturnRequest $request)
    {
       
       $book_issue= BookIssue::find($request->book_id);

       $book_issue->issue_status='requestedForReturn';

       $book_issue->save();

       return redirect()->back()->with('success', 'You have successfully requested the book Return!');
    }

    public function booksIssued(){
      
        try{

            $book_issued=BookIssue::with(['book.auther','book.publisher'])
            ->where('issue_status','=','issued')
            ->where('user_id',Auth::id())
            ->orderByDesc('created_at');

            if(request()->ajax()){

                return DataTables::of($book_issued)
                ->addIndexColumn()
                ->editColumn('created_at',function($user){
                    return $user->created_at->diffForHumans();
                  })
                  ->addColumn('action',function($book){
                    return view('actions.user.return-book',compact('book'));
                })
                ->rawColumns(['action'])
                 ->make(true);
              }
    
               return view('user.book-issued');
           
        }
        catch(\Throwable $th){
            return response()->json(['message'=>$th->getMessage()]);
        }
    }

    public function booksIssueRequests(){
      
        try{

           

            $book_issued=BookIssue::with(['book.auther','book.publisher'])
            ->where('issue_status','=','requested')
            ->where('user_id',Auth::id())
            ->orderByDesc('created_at');

            if(request()->ajax()){

                return DataTables::of($book_issued)
                ->addIndexColumn()
                ->editColumn('created_at',function($user){
                    return $user->created_at->diffForHumans();
                  })

                  ->editColumn('issue_status',function($book){
                    return '<button class="btn btn-warning" 
                     >
                       ' . ucfirst($book->issue_status) . '
                     </button>';
                 }) 
                 ->rawColumns(['issue_status'])
                 ->make(true);
              }
    
               return view('user.book-issue-requests');
           
        }
        catch(\Throwable $th){
            return response()->json(['message'=>$th->getMessage()]);
        }
    }

    public function booksReturnRequests(){
      
        try{

            $book_issued=BookIssue::with(['book.auther','book.publisher'])
            ->where('issue_status','=','requestedForReturn')
            ->where('user_id',Auth::id())
            ->orderByDesc('created_at');

            if(request()->ajax()){

                return DataTables::of($book_issued)
                ->addIndexColumn()
                ->editColumn('created_at',function($user){
                    return $user->created_at->diffForHumans();
                  })
                ->editColumn('issue_status',function($book){
                   return '<button class="btn btn-warning" 
                    >
                      ' . ucfirst($book->issue_status) . '
                    </button>';
                }) 
                ->rawColumns(['issue_status'])
                 ->make(true);
              }
    
               return view('user.book-return-requests');
           
        }
        catch(\Throwable $th){
            return response()->json(['message'=>$th->getMessage()]);
        }
    }

}
