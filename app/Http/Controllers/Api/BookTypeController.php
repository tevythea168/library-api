<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BookType;
use Illuminate\Http\Request;

class BookTypeController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Book types retrieved successfully',
            'data' => BookType::all()
        ], 200);
    }

    public function store(Request $request)
    {
        $bookType = BookType::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Book type created successfully',
            'data' => $bookType
        ], 201);
    }

    public function show(string $id)
    {
        $bookType = BookType::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Book type retrieved successfully',
            'data' => $bookType
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        $bookType = BookType::findOrFail($id);

        $bookType->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Book type updated successfully',
            'data' => $bookType
        ], 200);
    }

    public function destroy(string $id)
    {
        BookType::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Book type deleted successfully'
        ], 200);
    }
}
