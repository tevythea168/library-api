<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return response()->json( Book::all());
    }

    public function store(Request $request)
    {
        $book = Book::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Book created successfully',
            'data' => $book
        ], 201);
    }

    public function show(string $id)
    {
        $book = Book::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Book retrieved successfully',
            'data' => $book
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        $book->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Book updated successfully',
            'data' => $book
        ], 200);
    }

    public function destroy(string $id)
    {
        Book::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Book deleted successfully'
        ], 200);
    }
}
