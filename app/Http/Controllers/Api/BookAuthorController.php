<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BookAuthor;
use Illuminate\Http\Request;

class BookAuthorController extends Controller
{
    public function index()
    {
        return response()->json(BookAuthor::all());
    }

    public function store(Request $request)
    {
        $bookAuthor = BookAuthor::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Book author created successfully',
            'data' => $bookAuthor
        ], 201);
    }

    public function show(string $id)
    {
        $bookAuthor = BookAuthor::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Book author retrieved successfully',
            'data' => $bookAuthor
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        $bookAuthor = BookAuthor::findOrFail($id);

        $bookAuthor->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Book author updated successfully',
            'data' => $bookAuthor
        ], 200);
    }

    public function destroy(string $id)
    {
        BookAuthor::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Book author deleted successfully'
        ], 200);
    }
}
