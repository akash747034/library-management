<?php

namespace App\Http\Controllers\book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BookController extends Controller
{
    public function index(){
        try
        {  
              $books=Book::with(['publisher','auther','category'])
                     ->orderByDesc('created_at');
            
                     if(request()->ajax()){
                        return DataTables::of($books)
                        ->addIndexColumn()
                         ->make(true);
                      }
            
                       return view('books.book');

        }
        catch(\Throwable $th){
            return response()->json(['message'=>$th->getMessage()]);
        }
    }
}
