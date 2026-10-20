<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function store(Request $request)
    {
        return Book::create($request->all());
    }

    public function show(string $id)
    {
        return Book::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        $book->update($request->all());

        return $book;
    }

    public function destroy(string $id)
    {
        Book::destroy($id);

        return response()->json([
            'message' => 'Deleted successfully'
        ]);
    }
}
