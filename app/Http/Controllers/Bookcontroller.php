<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Bookcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Book::query();

        if(!empty($keyword)) {
            $query->where('book_name', 'LIKE', "%{$keyword}%")
                ->orWhere('author', 'LIKE', "%{$keyword}%")
                ->orwhere('publisher','LIKE',"%{$keyword}%");
        }

        $books = $query->get();
        return response(view('home',compact('books','keyword')))->withHeaders(['Cache-Control' => 'no-store']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('create'))->withHeaders(['Cache-Control' => 'no-store']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_name' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'edition' => 'required',
        ]);

        Book::create([
            'book_name' => $request->book_name,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'edition' => $request->edition,
        ]);

        $message = '書籍情報が登録されました';
        return view('create',compact('message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $books = Book::find($id);
        return response(view('edit',compact('books')))->withHeaders(['Cache-Control' => 'no-store']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'book_name' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'edition' => 'required',
        ]);

        $books = Book::find($id);

        $books->update([
            'book_name' => $request->book_name,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'edition' => $request->edition,
        ]);

        $complete = '書籍情報が更新されました';

        return response(view('edit',compact('books','complete')))->withHeaders(['Cache-Control' => 'no-store']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $books = Book::find($id);
        $books->delete();
        return redirect(route('home'));
    }
}
