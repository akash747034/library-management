<?php

namespace App\Http\Controllers\api\book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {  
              $books=Book::with(['publisher','auther','category'])
                     ->get();
            
                     return response()->json($books);

        }
        catch(\Throwable $th){
            return response()->json(['message'=>$th->getMessage()]);
        }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // try
        // {  
        //       $book=Book::with(['publisher','auther','category'])
        //              ->where('id',$request->book_id)
        //              ->get();
            
        //              return response()->json($book);

        // }
        // catch(\Throwable $th){
        //     return response()->json(['message'=>$th->getMessage()]);
        // }
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
