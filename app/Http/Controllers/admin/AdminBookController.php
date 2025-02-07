<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookRequest;
use App\Models\Auther;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminBookController extends Controller
{
    public function index()
    {
        try {
            $books = Book::with(['publisher', 'auther', 'category'])
                ->where('quantity','>',0)
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

    public function create(){  

         $categories=Category::all();
         $authers=Auther::all();
         $publishers=Publisher::all();
        return view('admin.book-create',compact('categories','authers','publishers'));

    }
     

    public function store(CreateBookRequest $request){
        try
        {

           Book::create( [
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'auther_id'=>$request->auther_id,
            'publisher_id'=>$request->publisher_id,
            'quantity' =>$request->quantity,
            ]);

            return redirect()->back()->with('success', 'Book Added Successfully!');
        }
        catch(\Throwable $th){
          
            return response()->json(['message'=>$th->getMessage()]);
        }
    }

    // public function delete(){

    // }
}
