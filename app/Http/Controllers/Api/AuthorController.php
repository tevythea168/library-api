<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Authors retrieved successfully',
            'data' => Author::all()
        ], 200);
    }

    public function store(Request $request)
    {
        $author = Author::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Author created successfully',
            'data' => $author
        ], 201);
    }

    public function show(string $id)
    {
        $author = Author::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Author retrieved successfully',
            'data' => $author
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        $author = Author::findOrFail($id);

        $author->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Author updated successfully',
            'data' => $author
        ], 200);
    }

    public function destroy(string $id)
    {
        Author::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Author deleted successfully'
        ], 200);
    }
}
