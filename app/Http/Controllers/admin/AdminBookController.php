<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminBookController extends Controller
{
    public function index()
    {
        try {
            $books = Book::with(['publisher', 'auther', 'category'])
                ->whereDoesntHave('bookIssues', function ($query) {
                    $query->whereIn('issue_status', ['requested', 'issued', 'requestedForReturn']);
                })
                ->orderByDesc('created_at');

            if (request()->ajax()) {
                return DataTables::of($books)
                    ->addIndexColumn()
                    ->editColumn('created_at', function ($user) {
                        return $user->created_at->diffForHumans();
                    })
                    ->make(true);
            }

            return view('admin.book');
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }

    // public function store(){
    //     try
    //     {


    //     }
    //     catch(\Throwable $th){
          
    //         return response()->json(['message'=>$th->getMessage()]);
    //     }
    // }
}
